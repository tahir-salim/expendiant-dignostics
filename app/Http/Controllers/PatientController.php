`<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use App\Models\OccupiedSlot;
use App\Models\User;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Appointment;
use App\Models\AppointmentTestReport;
use App\Models\Faq;
use App\Enums\AppointmentPaymentStatus;
use Auth;
use Illuminate\Http\Request;
use PDF;

class PatientController extends Controller
{
    public function index()
    {
        $categories = Category::with('tests')->isActive()->get();

        return view('patient.index', compact('categories'));
    }

    public function testAppointment()
    {
        return view('patient.test-appointment');
    }



    public function selectedTests(Request $request)
    {
        $RequestData = json_decode($request->categoriesTests);
        $data = [];
        foreach ($RequestData as $cat) {
            $category = $cat->category;
            $tests = json_decode($cat->tests);
            foreach ($tests as $test) {

                $data[$category][] = $test;

            }
        }
        $user = Auth::user();
        return view('patient.test-appointment', compact('data','user'));

    }
    public function patientSearch(Request $request)
    {
        $search = $request->search;
        $categories = Category::where('name', 'LIKE', "%{$search}%")->isActive()->get();

        return view('patient.index', compact('categories'));
    }

    public function checkTimeAvailability(Request $request){

        $date = $request->date;
        $data = checkTimeAvailability($date);
        return json_encode($data);
    }

    public function addAppointment(Request $request){
        $address1  = $request->address1;
        $address2  = $request->address2;
        $age  = $request->age;
        $gender  = $request->gender;
        $app_date  = $request->app_date;
        $app_time  = $request->app_time;
        $test_id  = $request->test_id;
        $test_amount  = $request->test_amount;
        $test_total_amount  = $request->test_total_amount;
        $payment_opt  = $request->payment_opt;
        $total_tax  = 0;
        $sub_amount  = 0;
        $user_id = Auth::user()->id;

        // update the current login user

        $user = User::find($user_id);
        $user->address = $address1;
        $user->address2 = $address2;
        $user->age = $age;
        $user->gender = $gender;
        $user->save();

        // insert the appointment master and appointment detail

        $appointmentMaster = New Appointment();
        $appointmentMaster->user_id = $user_id;
        $appointmentMaster->payment_type_id = $payment_opt;
        $appointmentMaster->status = 'booked';
        $appointmentMaster->date = $app_date;
        $appointmentMaster->time = $app_time;
        $appointmentMaster->sub_total = $sub_amount;
        $appointmentMaster->total_tax = $total_tax;
        $appointmentMaster->grand_total = $test_total_amount;
        $appointmentMaster->payment_status = AppointmentPaymentStatus::UNPAID;

        if($appointmentMaster->save())
        {
            $appointment_id = $appointmentMaster->id;
            $submitDetails = false;
            // insert in occupiedSlot
            $occupiedData  = New OccupiedSlot();
            $occupiedData->date = $app_date;
            $occupiedData->time = $app_time;
            $occupiedData->status = 'booked';
            $occupiedData->save();

            // appointment detail insert
            foreach($test_id as $key=>$test)
            {
                $appointmentDetail = New AppointmentTestReport();
                $appointmentDetail->test_id = $test;
                $appointmentDetail->appointment_id = $appointment_id;
                $appointmentDetail->amount = $test_amount[$key];

                if($appointmentDetail->save())
                {
                    $submitDetails = true;
                }
                else
                {
                    $submitDetails = false;
                }

            }
            if($submitDetails)
            {
                if($payment_opt == 1)
                {
                    $paymentData = array(
                        'card_number'=>$request->card_number,
                        'expiry_month'=>$request->expiry_month,
                        'expiry_year'=>$request->expiry_year,
                        'cvv'=>$request->cvv,
                        'test_total_amount'=>$request->test_total_amount,
                        'stripeToken'=>$request->stripeToken,
                        'userId'=>$user_id,
                        'email'=>$request->email,
                        'address'=>$request->address1,
                        'appointment_id'=>$appointment_id
                    );
                    $payment = stripePayment($paymentData);
                    if($payment['status']=="success")
                    {
                        $paymentInsert = New Payment();
                        $paymentInsert->transaction_id = $payment['data'];
                        $paymentInsert->appointment_id = $appointment_id;
                        $paymentInsert->status = 'paid';
                        if($paymentInsert->save())
                        {
                            $updateAppointment = Appointment::find($appointment_id);
                            $updateAppointment->payment_status = 'paid';

                            if($updateAppointment->save())
                            {
                                return redirect(url('patient/appointmentdetails/'.$appointment_id))->with('success','Appoint Submit and payment submitted');
                            }

                        }
                        else
                        {
                            return redirect()->back()->with('error','Appoint Submit but payment not submitted');
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('error',$payment['data']);
                    }
                }
                else
                {
                    $paymentInsert = New Payment();
                    $paymentInsert->transaction_id = uniqueTransactionId();
                    $paymentInsert->appointment_id = $appointment_id;
                    $paymentInsert->status = 'pending';
                    if($paymentInsert->save())
                    {
                        return redirect(url('patient/appointmentdetails/'.$appointment_id))->with('success','Appoint Submit and payment submitted');
                    }
                    else
                    {
                        return redirect()->back()->with('error','Appoint Submit but payment not submitted');
                    }
                }
            }
            else
            {
                return redirect()->back()->with('error','Appoint not Submitted please try again');
            }

        }
        else
        {
            return redirect()->back()->with('error','Appoint not Submitted please try again');
        }

    }

    function appointmentDetails($id)
    {
        $appointment = Appointment::with('appointmentTestReports','appointmentTestReports.tests','user')->where('id',$id)->first();
        return view('patient.test-appointment-detail',compact('appointment'));
    }

    function appointmentGeneratePdf($id)
    {
        $appointment = Appointment::with('appointmentTestReports','appointmentTestReports.tests','user')->where('id',$id)->first();
        //return view('patient.test-appointment-genratepdf',compact('appointment'));
        $pdf = PDF::loadView('patient.test-appointment-genratepdf',compact('appointment'));
        return $pdf->download('appointment-'.$appointment->id.'.pdf');
    }

    function appointmentList()
    {
        $appointmentLists = Appointment::with('appointmentTestReports','appointmentTestReports.tests','user','paymentType')->where('date', '>=', date('Y-m-d'))->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('patient.test-appointment-list',compact('appointmentLists'));
    }

    public function testReport()
    {
        $reports = Report::with(['appointment'=>function($query){
            $query->where('user_id',Auth::user()->id);
        },'appointmentTestReport'])->orderBy('id','desc')->get();
        return view('patient.test-reports',compact('reports'));
    }

    public function helpCenter()
    {
        $faq = Faq::where('is_active',1)->get();
        return view('patient.help-center',get_defined_vars());
    }
}
