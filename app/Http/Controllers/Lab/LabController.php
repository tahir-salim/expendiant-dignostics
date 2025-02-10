<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Hospital;
use App\Models\HospitalTest;
use App\Models\HospitalTestDetail;
use App\Models\HospitalTestMaster;
use App\Models\Test;
use App\Models\AppointmentTestReport;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class LabController extends Controller
{
    public function index()
    {
        $categories = Category::with('tests')->where('is_active', true)->get();
        return view('lab.test-menu', compact('categories'));
    }
    public function deleteTest()
    {
        $testId = $_GET['id'];

        Test::where('id', $testId)->delete();
        return response()->json('success');
    }

    public function schedule()
    {
        // dd(url('').'/lab/patient-detials');
        $appointmentLists = Appointment::with(['appointmentTestReports', 'appointmentTestReports.tests', 'user', 'paymentType'])->get();

        return view('lab.schedule', compact('appointmentLists'));
    }

    public function patientList()
    {
        $patientLists = Appointment::with('appointmentTestReports', 'user', 'appointmentTestReports.tests', 'paymentType')->paginate(15);
        // dd($patientLists);
        return view('lab.patient-list', compact('patientLists'));
    }

    public function patientListPdf()
    {
        $patientLists = Appointment::with('appointmentTestReports', 'user', 'appointmentTestReports.tests', 'paymentType')->paginate(15);
        $pdf = PDF::loadView('lab.patient-list-pdf', compact('patientLists'));

        return $pdf->download('patient-statistics.pdf');
    }

    public function patientDetails()
    {
        try {

            $id = $_GET['id'];
            $appointment_details = Appointment::with('appointmentTestReports', 'user', 'appointmentTestReports.tests', 'paymentType')->where('id', $id)->first();
            if ($appointment_details == null) {
                return redirect('/lab/patient-list')->with('error', 'Something went wrong.');
            }
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong ' . $ex);
        }
        return view('lab.lab-patient-detail', get_defined_vars());
    }

    public function hospitalList()
    {
        $hospitalLists = HospitalTestMaster::with('hospital')->get();

        return view('lab.hospital-list', compact('hospitalLists'));
    }

    public function hospitalListPdf()
    {
        $hospitalLists = HospitalTestMaster::with('hospital')->orderBy('hospital_id', 'desc')->get();
        $pdf = PDF::loadView('lab.hospital-list-pdf', compact('hospitalLists'));

        return $pdf->download('hospital-statistics.pdf');
    }

    public function labHistory()
    {
        $hospitalHistories = HospitalTestMaster::with('hospitalTests')->orderBy('hospital_id', 'desc')->get();

        return view('lab.lab-history', compact('hospitalHistories'));
    }

    public function labHistoryPdf()
    {
        $hospitalHistories = HospitalTestMaster::with('hospitalTests')->orderBy('hospital_id', 'desc')->get();
        $pdf = PDF::loadView('lab.lab-history-pdf', compact('hospitalHistories'));

        return $pdf->download('lab-history.pdf');
    }

    public function testMenu()
    {
        $categories = Category::with('tests')->isActive()->get();
        return view('lab.test-menu', compact('categories'));
    }

    public function helpCenter()
    {
        $faqs = Faq::where('is_active', true)->get();
        return view('lab.help-center', compact('faqs'));
    }

    public function labSearch(Request $request)
    {
        $search = $request->search;

        if (url()->previous() == url('') . '/lab/patient-list') {

            $patientLists = Appointment::with([
                'appointmentTestReports',
                'user',
                'appointmentTestReports.tests',
                'paymentType',
            ])->whereRelation('user', 'name', 'LIKE', "%{$search}%")->paginate(15);
            if ($patientLists->count() != 0) {
                return view('lab.patient-list', compact('patientLists'));
            } else {
                return back()->with('message', 'No Data Found!');
            }

        } elseif (url()->previous() == url('') . '/lab/hospital-list') {

            $hospitalLists = HospitalTestMaster::with('hospital')->whereRelation('hospital', 'name', 'LIKE', "%{$search}%")->get();
            if ($hospitalLists->count() != 0) {
                return view('lab.hospital-list', compact('hospitalLists'));
            } else {
                return back()->with('message', 'No Data Found!');
            }

        } elseif (url()->previous() == url('') . '/lab/lab-history') {

            $hospitalHistories = HospitalTestMaster::with(['hospitalTests' => function ($query) use ($search) {
                $query->where('patient_fullname', 'LIKE', "%{$search}%");
            }])->get();

            if ($hospitalHistories->count() != 0) {
                return view('lab.lab-history', compact('hospitalHistories'));
            } else {
                return back()->with('message', 'No Data Found!');
            }

        } elseif (url()->previous() == url('') . '/lab/lab-test-menu') {

            $categories = Category::with('tests')->where('name', 'LIKE', "%{$search}%")->get();
            if ($categories->count() != 0) {
                return view('lab.test-menu', compact('categories'));
            } else {
                return back()->with('message', 'No Data Found!');
            }

        } elseif (url()->previous() == url('') . '/lab/help-center') {

            $faqs = Faq::where('question', 'LIKE', "%{$search}%")->get();
            if ($faqs->count() != 0) {
                return view('lab.help-center', compact('faqs'));
            } else {
                return back()->with('message', 'No Data Found!');
            }
        }
    }

    public function hospitalDetail($hospital_id)
    {
        $hospitalDetail = HospitalTestMaster::with('hospitalTests', 'hospital.users')->where('id', decrypt($hospital_id))->first();
        // dd($hospitalDetail);
        return view('lab.lab-hospital-detail', compact('hospitalDetail'));
    }

    public function updateHospitalDetail(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'master_time' => 'required',
            'email' => 'required',
            'sample_delivery_type' => 'required',
            'date' => 'required',
        ]);
        $hospital = User::where('hospital_id',decrypt($id))->first();
        // $hospital->name = $request->name;
        $hospital->phone = $request->phone;
        $hospital->email = $request->email;
        $hospital->save();

        $hospitalMaster = HospitalTestMaster::where('hospital_id', decrypt($id))->first();
        $hospitalMaster->master_time = $request->master_time;
        $hospitalMaster->sample_delivery_type = $request->sample_delivery_type;
        $hospitalMaster->date = $request->date;
        $hospitalMaster->save();

        $hospitalName = Hospital::find(decrypt($id));
        $hospitalName->name = $request->name;

        if ($hospitalName->save()) {
            return redirect('lab/hospital-detail/' . $id)->with('success', 'Data Successfully Updated');

        } else {
            return back()->with('error', 'Data Not Successfully Updated ');
        }
    }

    public function deleteHospitalDetail($id)
    {
        $hospital = Hospital::find(decrypt($id));
        $hospital->delete();

        HospitalTestMaster::where('hospital_id', decrypt($id))->delete();

        User::where('hospital_id', decrypt($id))->delete();

        return redirect('lab/hospital-list');
    }

    public function hospitalPatientListPdf($id)
    {
        $hospitalPatientLists = HospitalTest::with('hospitalTestMaster')->where('hospital_id', decrypt($id))->get();
        $pdf = PDF::loadView('lab.hospital-patient-list-pdf', compact('hospitalPatientLists'));

        return $pdf->download('hospital-patient-list.pdf');
    }

    public function labHospitalPatientDetail($hospital_test_id)
    {
        $hospitalPatientDetail = HospitalTest::with([
            'payment',
            'hospitalTestDetails',
            'hospitalTestDetails.test',
            'hospitalTestDetails.report',
            'hospitalTestMaster'
        ])->where('id', decrypt($hospital_test_id))
            ->first();
            // dd($hospitalPatientDetail);
        return view('lab.lab-hospital-patient-detail', get_defined_vars());
    }

    public function hospial_list_sorting(Request $request)
    {
        // dd(Carbon::now()->format('Y'));
        if ($request->sort_by == "Year") {
            $hospital = HospitalTestMaster::with(['hospitalTests', 'hospital' => function ($query) {
                $query->with('users');
            }])
                ->whereYear('created_at', Carbon::now()->format('Y'))
                ->get();
        }
        if ($request->sort_by == "Monthly") {
            $hospital = HospitalTestMaster::with(['hospitalTests', 'hospital' => function ($query) {
                $query->with('users');
            }])
                ->whereMonth('created_at', Carbon::now()->format('m'))
                ->get();
        }
        if ($request->sort_by == "Weekly") {
            $hospital = HospitalTestMaster::with(['hospitalTests', 'hospital' => function ($query) {
                $query->with('users');
            }])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->get();
        }
        $response = '';
        foreach ($hospital as $hospitalList) {
            $response .= '<tr><td><p><span>' . $hospitalList->hospital->name . '</span></p></td><td><p>' . ucwords($hospitalList->sample_delivery_type) . '</p></td><td><p>' . $hospitalList->date->format('d.m.Y') . '</p></td><td><a href="' . url('/lab/hospital-detail/' . encrypt($hospitalList->hospital_id)) . '" class="vwdtl">View Details</a></td></tr>';

        }
        return response()->json($response);
    }

    public function addtest(Request $request)
    {
        // dd($request->all());
        $test = new Test;
        $test->name = $request->new_test_name;
        $test->amount = $request->test_amount;
        $test->category_id = $request->testId;
        $test->save();
        return response('success');
    }

    public function create_category(Request $request)
    {
        // dd($request->all());

        if ($request->hasFile('icon')) {
            $attechment = $request->file('icon');
            $img_2 = time() . $attechment->getClientOriginalName();
            $attechment->move(public_path('assets/images/'), $img_2);
        }
        $url = 'assets/images/' . $img_2;

        $check_already_exist = Category::where('name', $request->name)->first();
        if ($check_already_exist == null) {
            $Category = new Category;
            $Category->name = $request->name;
            $Category->icon = $url;
            $Category->save();
        } else {
            $Category = $check_already_exist->id;
        }
        // dd($Category);
        session(['category_id' => $Category->id]);
        if ($request->test_name != null) {
            // If there is no arry insert only single one.
            if(is_array($request->test_name)){
                $count = 0;
            foreach ($request->test_name as $test_names) {

                $test = new Test;
                $test->name = $test_names;
                $test->amount = $request->test_amount[$count + 1];
                $test->category_id = session('category_id');
                $test->save();

            }
            }else{
                $test = new Test;
                $test->name = $request->test_name;
                $test->amount = $request->test_amount;
                $test->category_id = session('category_id');
                $test->save();
            }
            
        }
        session()->forget('category_id');
        return redirect()->back()->with('Success', 'Created & other Details Created Successfully!');
    }

    public function dltTestofPatient(Request $request)
    {
        // dd($request->all());
        AppointmentTestReport::where('id', $request->testId)->delete();
        return response()->json('success');
    }

    public function update_patient_details(Request $request)
    {
         
        // $hospita_test_details = HospitalTestDetail::where('hospital_test_id', $request->hospitalTestId)->first();

        // HospitalTest::where('id', $request->hospitalTestId)->update(array(
        //     'patient_fullname' => $request->patient_fullname,
        //     'patient_phone' => $request->patient_phone,
        //     'patient_email' => $request->patient_email,
        // ));
        // HospitalTestMaster::where('id', $request->hospitalTesMastertId)->update(array(
        //     'date' => $request->date,
        //     'master_time' => $request->time,
        // ));
  

        Appointment::where('id',$request->appointment_id)->update(array(
            'date' => $request->date,
            'time' => $request->time
        ));

            if ($request->test != null) {
            foreach ($request->test as $test) {
                $test_details = Test::where('id', $test)->first();
                // if ($hospita_test_details->test_id != $test) {
                    $Test = new AppointmentTestReport;
                    $Test->appointment_id = $request->appointment_id;
                    $Test->test_id = $test;
                    $Test->amount = $test_details->amount;
                    $Test->save();
                // }
            }
        }

        return redirect()->back()->with('Success', 'Updated & other Details Created Successfully!');
    }
}
