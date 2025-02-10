<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Hospital;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
 
    protected function create(array $data)
    {
        $role = Role::where('role',$data['acc_type'])->first();

        if($role->name == "Patient"){
            return User::create([
                'name' => $data['name'] .' '. $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role_id' => $role->id,
                'password' => Hash::make($data['password']),
            ]);
        }else{
             $user = User::create([
                'name' => $data['name'] .' '. $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role_id' => $role->id,
                'password' => Hash::make($data['password']),
            ]);

            $hospital_details = new Hospital;
            $hospital_details->user_id = $user->id;
            $hospital_details->name = $data['hospital_name'];
            $hospital_details->phone = $data['phone'];
            $hospital_details->address = $data['address'];
            $hospital_details->save();
    
            return $user;
        }
        
    }
}
