<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

use App\Models\HospitalTestMaster;
use App\Models\HospitalTestDetail;
use App\Models\Test;
use App\Models\HospitalTest;
use App\Models\Hospital;
use App\Models\Faq;
use App\Models\Payment;
use Stripe;
class HospitalController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['tests'=>function($query){
            $query->where('is_active',1);
        }])->where('is_active',1)->get();
        return view('hospital.index',get_defined_vars());
    }

    public function post_test_details(Request $request){
        // dd(count($request->test));

        if($request->test == null){
            return redirect()->back()->with('error','Please Select atleast 1 Test before submitting form.');
        }

        $check_if_test_master_exist = HospitalTestMaster::where('date',date('Y-m-d'))
        ->where('hospital_id', Auth::user()->id)
        ->first();

        $test_master_total = 0;
        $test_price_sum = 0;
        $total_tests = 0;


        if($check_if_test_master_exist != null){
            foreach($request->test as $test_id){
                $test_details = Test::find($test_id);
                $test_price_sum = $test_price_sum += $test_details->amount;
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create ([
                "amount" => $test_price_sum * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from xpedient hospital." 
            ]);
            // dd($charge);

            if($charge->status == "succeeded"){
                $payment_status = 1;
            }else{
                $payment_status = 0;
            }
            // dd($test_price_sum,$request->all());
            $hospital_test = new HospitalTest;
            $hospital_test->hospital_test_master_id = $check_if_test_master_exist->id;
            $hospital_test->hospital_id =  Auth::user()->id;
            $hospital_test->patient_id = $request->patient_id;
            $hospital_test->patient_fullname = $request->full_name;
            $hospital_test->patient_phone = $request->phone;
            $hospital_test->patient_email = $request->patient_email;
            $hospital_test->patient_age = $request->age;
            $hospital_test->patient_gender = $request->gender;
            $hospital_test->sample_delivery = $request->sample_delivery;
            $hospital_test->sub_total = $test_price_sum;
            $hospital_test->grand_total = $test_price_sum;
            $hospital_test->address_1 = $request->address_1;
            $hospital_test->address_2 = $request->address_2;
            $hospital_test->payment_status = $payment_status;
            $hospital_test->save();
            session(['hospital_test_id' => $hospital_test->id]);

            if($charge->status == "succeeded"){
                $payement = new Payment;
                $payement->transaction_id = uniqueTransactionId();
                // $payement->appointment_id = 
                $payement->hospital_test_id = $hospital_test->id;
                $payement->status = "paid";
                $payement->save();
            }
            
            foreach($request->test as $test_id){
                $test_details = Test::find($test_id);
                $hospital_test = new HospitalTestDetail;
                $hospital_test->hospital_test_id = session('hospital_test_id');
                $hospital_test->test_id = $test_details->id;
                $hospital_test->amount = $test_details->amount;
                $hospital_test->save();
            }
            session()->forget('hospital_test_id');
            $test_master_total = $test_price_sum += $check_if_test_master_exist->grand_total;
            $total_patients = $check_if_test_master_exist->no_of_patients +=1;
            $total_test = $check_if_test_master_exist->no_of_test += count($request->test);


            HospitalTestMaster::where('id',$check_if_test_master_exist->id)->update(array(
                'date' => date('Y-m-d'),
                'master_time' => strtotime(date("h:i:a")),
                'grand_total' => $test_master_total,
                'no_of_patients' => $total_patients,
                'no_of_test' => $total_test,
                'sample_delivery_type' => 'pick_up',
            ));

        }else{
            foreach($request->test as $test_id){
                $test_details = Test::find($test_id);
                $test_price_sum = $test_price_sum += $test_details->amount;
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create ([
                    "amount" => $test_price_sum * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from xpedient hospital." 
            ]);

            if($charge->status == "succeeded"){
                $payment_status = 1;
            }else{
                $payment_status = 0;
            }
      
            $HospitalTestMaster = new HospitalTestMaster;
            $HospitalTestMaster->hospital_id = Auth::user()->id;
            $HospitalTestMaster->date = date('Y-m-d');
            $HospitalTestMaster->master_time = strtotime(date("h:i:a"));
            $HospitalTestMaster->grand_total = $test_price_sum;
            $HospitalTestMaster->no_of_patients = 1;
            $HospitalTestMaster->no_of_test = count($request->test);
            $HospitalTestMaster->sample_delivery_type = 'pick_up';
            // dd($hospital_test);
            $HospitalTestMaster->save();


            $hospital_test = new HospitalTest;
            $hospital_test->hospital_test_master_id = $HospitalTestMaster->id;
            $hospital_test->hospital_id =  Auth::user()->id;
            $hospital_test->patient_id = $request->patient_id;
            $hospital_test->patient_fullname = $request->full_name;
            $hospital_test->patient_phone = $request->phone;
            $hospital_test->patient_email = $request->patient_email;
            $hospital_test->patient_age = $request->age;
            $hospital_test->patient_gender = $request->gender;
            $hospital_test->sample_delivery = $request->sample_delivery;
            $hospital_test->sub_total = $test_price_sum;
            $hospital_test->grand_total = $test_price_sum;
            $hospital_test->address_1 = $request->address_1;
            $hospital_test->address_2 = $request->address_2;
            $hospital_test->payment_status = $payment_status;
            
            $hospital_test->save();

            if($charge->status == "succeeded"){
                $payement = new Payment;
                $payement->transaction_id = uniqueTransactionId();
                // $payement->appointment_id = 
                $payement->hospital_test_id = $hospital_test->id;
                $payement->status = "paid";
                $payement->save();
            }

            session(['hospital_test_id' => $hospital_test->id]);
            
            
            if($hospital_test){
            foreach($request->test as $test_id){
                $test_details = Test::find($test_id);
                $hospital_test = new HospitalTestDetail;
                $hospital_test->hospital_test_id = session('hospital_test_id');
                $hospital_test->test_id = $test_details->id;
                $hospital_test->amount = $test_details->amount;
                $hospital_test->save();
            }
        }
            session()->forget('hospital_test_id');
        }

        return redirect()->back()->with('Success','Patient Details Created Successfully!');
    }

    public function all_test_appointments(){

        $all_test_appointment = HospitalTest::where('hospital_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('hospital.test-appointment',get_defined_vars());
    }


    public function test_report(){
        try{
            $id =  $_GET['id'];
            $appointment_details = HospitalTest::with(['hospitalTestDetails'=>function($query)use($id){
                $query->where('hospital_test_id',$id)
                ->with('test');
            }])->findorfail($id);

            // dd($appointment_details);
 
         }catch(Exception $ex){
            return redirect()->back()->with('error','Something went wrong...');
        }

        return view('hospital.test-reports',get_defined_vars());
       
    }

    public function help_center(){
        $faq = Faq::where('is_active',1)->get();
        return view('hospital.help-center',get_defined_vars());
    }
}
