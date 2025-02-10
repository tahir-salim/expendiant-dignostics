<?php

use App\Models\Hospital;
use App\Models\OccupiedSlot;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('hospital_details')) {
    function hospital_details()
    {
        // dd(Auth::user()->id);
        $hospital = Hospital::where('user_id', Auth::user()->id)->first();
        return $hospital;
    }
}
function currency($currency = "$")
{
    $setting = Setting::where('setting_name', 'currency')->first();
    return $setting->setting_value;
}
function openingTiming()
{
    $setting = Setting::where('setting_name', 'open_timing')->first();
    return $setting->setting_value;

}
function closeTiming()
{
    $setting = Setting::where('setting_name', 'close_timing')->first();
    return $setting->setting_value;
}

function timingGap()
{
    $setting = Setting::where('setting_name', 'timing_gap')->first();
    return $setting->setting_value;
}

function checkTimeAvailability($date = "")
{

    $date = empty($date) ? date('Y-m-d') : $date;
    // the opening and close timing come from helper
    $currentTime = time();
    $currentDate = date('Y-m-d');
    $openingTiming = openingTiming();
    $closeTiming = closeTiming();
    $timingGap = timingGap();

    $convertedopeningTiming = strtotime($openingTiming);
    $convertedcloseTiming = strtotime($closeTiming);

    if ($currentDate == $date && $currentTime > $convertedcloseTiming) {
        $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
    }

    // get the date from cooupied slot to check which is the lastest slot occupied
    $occupied_slot = OccupiedSlot::where('date', $date)->orderBy('id', 'desc')->first();
    /*
    if the $occupiedSlot is empty on the given date
    1. check the timing if the current time is greater then the closingTiming then next date & opening timing
    2. If the current time is less then the closing time then the current time is occupied slot

    if the $occupiedSlot is not empty then the nextTime is the occupied slot

     */
    if (empty($occupied_slot)) {
        $dateDay = date('l', strtotime($date));
        // dd($dateDay);
        // check the selected date is current date or not
        if ($currentDate < $date) {
            // check if the date is sunday or not

            if ($dateDay != "Sunday") {
                $occupiedTiming = $convertedopeningTiming;
                $occupiedDate = $date;

            } else {
                // if sunday then add one more day
                $nextDayDate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
                // the availability of the updated date
                $checkoccupied_slot = OccupiedSlot::where('date', $nextDayDate)->orderBy('id', 'desc')->first();
                // if the occupied slot is not empty
                if (!empty($checkoccupied_slot)) {
                    // 15 min further from inputed date
                    $occupiedTiming = strtotime($timingGap . " minutes", strtotime($checkoccupied_slot->time));
                } else {
                    // else the opening time
                    $occupiedTiming = $convertedopeningTiming;
                }

                $occupiedDate = $nextDayDate;
            }

        } elseif ($currentDate == $date) {if ($dateDay != "Sunday") {
            if ($currentTime > $convertedcloseTiming) {
                $nextDayDate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
                $occupiedTiming = $convertedopeningTiming;
                $occupiedDate = $nextDayDate;
            } elseif ($currentTime < $convertedcloseTiming) {
                $occupiedTiming = strtotime($timingGap . " minutes", $currentTime);
                $occupiedDate = $date;
            }
        } else {
            // if sunday then add one more day
            $nextDayDate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            // the availability of the updated date
            $checkoccupied_slot = OccupiedSlot::where('date', $nextDayDate)->orderBy('id', 'desc')->first();
            // if the occupied slot is not empty
            if (!empty($checkoccupied_slot)) {
                // 15 min further from inputed date
                $occupiedTiming = strtotime($timingGap . " minutes", strtotime($checkoccupied_slot->time));
            } else {
                // else the opening time
                $occupiedTiming = $convertedopeningTiming;
            }
            $occupiedDate = $nextDayDate;
        }

        }
    } else {
        $occupiedDate = $occupied_slot->date;
        $occupiedTiming = $occupied_slot->time;
        $advanceTiming = strtotime($timingGap . " minutes", strtotime($occupiedTiming));
        if ($advanceTiming > $convertedcloseTiming) {
            $nextDayDate = date('Y-m-d', strtotime('+1 day', strtotime($occupiedDate)));
            $occupiedTiming = $convertedopeningTiming;
            $occupiedDate = $nextDayDate;
        } elseif ($advanceTiming < $convertedcloseTiming) {
            $occupiedTiming = strtotime($timingGap . " minutes", strtotime($occupiedTiming));
            $occupiedDate = $date;
        }
    }

    $data = array("occupiedTiming" => date('H:i', $occupiedTiming), "occupiedDate" => $occupiedDate, 'readableDate' => date("M,d Y", strtotime($occupiedDate)), 'readableTime' => date('h:i a', $occupiedTiming), 'currentTime' => date('h:i a', $currentTime));
    return $data;
}

function uniqueTransactionId()
{
    $id = time() . uniqid(mt_rand(), true);
    return $id;
}

function stripePayment($request)
{
    $card_number = $request['card_number'];
    $month = $request['expiry_month'];
    $year = $request['expiry_year'];
    $cvc = $request['cvv'];
    $paymentAmount = $request['test_total_amount'];
    $stripeToken = $request['stripeToken'];
    $userid = $request['userId'];
    $email = $request['email'];
    $address = $request['address'];
    $appointment_id = $request['appointment_id'];
    $current_timestamp = Carbon::now()->timestamp;

    // stripe customer id
    $customer_id = "";
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    // dd(Stripe\Customer::all());
    try {

        $customer = Stripe\Customer::all();
        $customer = $customer['data'];
        foreach ($customer as $thiscustomer) {
            if ($thiscustomer['email'] == $email) {
                $customer_id = $thiscustomer['id'];
                break;
            } else {
            }
        }
        if ($customer_id == '') {
            $customer = Stripe\Customer::create(array('email' => $email, 'card' => $stripeToken));
            $customer_id = $customer->id;
        }

        $charge = Stripe\Charge::create(array(
            'customer' => $customer_id,
            "amount" => $paymentAmount * 100,
            "currency" => "USD",
            'statement_descriptor' => 'patient Payment',
            "description" => 'Patient Payment')
        );
        $result = "success";
    } catch (Stripe_CardError $e) {
        $error = $e->getMessage();
        $result = "declined0";
    } catch (Stripe_InvalidRequestError $e) {
        $result = "declined1";
    } catch (Stripe_AuthenticationError $e) {
        $result = "declined2";
    } catch (Stripe_ApiConnectionError $e) {
        $result = "declined3";
    } catch (Stripe_Error $e) {
        $result = "declined4";
    } catch (Exception $e) {
        if ($e->getMessage() == "cvc_check_invalid") {
            $result = "cvc_check_invalid";
        } else {
            $result = $e;
        }
    }

    if ($result == 'success') {
        //$token = $charge['id'].'_'.$charge['balance_transaction'];
        $token = uniqueTransactionId();
        $response = array('status' => 'success', 'data' => $token);
        return $response;
    } else {
        $response = array('status' => 'error', 'data' => $result);
        return $response;
    }
}
