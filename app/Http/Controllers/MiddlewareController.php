<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class MiddlewareController extends Controller
{

    public function check_user_role(){
        
        if(Auth::user()->role_id == 3){

            return redirect('/patient/dashboard');

        }elseif(Auth::user()->role_id == 2){

            return redirect('/hospital/dashboard');

        }elseif(Auth::user()->role_id == 1){

            return redirect('/lab/dashboard');

        }else{
            Auth::logout();
            return redirect('/login')->with('error','Access Denied');
        }
    }
}
