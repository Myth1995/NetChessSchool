<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends MyController
{
    public function index(){

        return view("client.login");
    }


    public function register(Request $request){

        $email = $request->input('email');
        $userName = $request->input('userName');
        $password = $request->input('password');

        $age = $request->input('age');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $birthday = $request->input('birthday');
        $phoneNumber = $request->input('phoneNumber');
        $country = $request->input('country');
        


        if($email == null || $userName == null || $password == null || $age == null || $firstName == null || $lastName == null || $birthday == null || $phoneNumber == null || $country == null){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $data = array(
            'email' => $email,
            'user_name' => $userName,
            'password' => Hash::make($password),
            'remember_token' => $request->input('_token'),
            'age' => $age,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birthday' => $birthday,
            'phone_number' => $phoneNumber,
            'country' => $country
        );

        $check_row = User::where("user_name", $userName)->first();
        if(isset($check_row->id)){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_REGISTER_USER_EXIST_ERROR);
            return;
        }

        User::create($data);

        $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS);
    }

    public function login(Request $request)
    {

        $request->validate([
            // 'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->input('identity');
        $password = $request->input('password');
        if(Auth::attempt([filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name' => $email,
            'password' => $password
        ])){
            User::where('email', $email)->orWhere('user_name', $email)->update(
                array(
                    'last_login' => date('Y-m-d H:i:s')
                )
            );
            return redirect('/');
        }else {
            session()->flash('password_incorrect', 'Password or Email is not correct.');
            return redirect()->back()->withInput();
        }

    }

    public function emailCheck(Request $request){
        $age = $request->input('age');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $birthDay = $request->input('birthday');
        $phoneNumber = $request->input('phoneNumber');
        $country = $request->input('country');
        $email = $request->input('email');

        if($age == null || $firstName == null || $birthDay == null || $phoneNumber == null || $country == null || $email == null){
            $this->ajax_response($this->STATUS_ERROR, $this->STATUS_CODE_PARAM_ERROR);
            return;
        }

        $data = array(
            'age' => $age,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'birthday' => $birthDay,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'country' => $country,
        );

        $check_row = User::where("email", $email)->where("status",1)->first();
        if(!isset($check_row->id)){
            User::create($data);
        }
        
        $this->ajax_response($this->STATUS_SUCCESS, $this->STATUS_CODE_SUCCESS);
        
        // $this->sendEmail($email, $firstName . " " . $lastName);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}