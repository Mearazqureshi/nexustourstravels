<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $v=$validator= Validator::make(
        [
            'email' => $request->email,
            'password' => $request->password
        ],
        [
            'email' => 'required|email',
            'password' => 'required'
        ]
        );

        $email=$request->email;
        $password=$request->password;

        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
       
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {  
            Session::flash('flash_message','Successfully Login');
            if(Auth::user()->is_admin == 1){
                return redirect('admin_dashboard');
            }            
            else{
                return redirect('home');
            }
        }
        else
        {
            Session::flash('flash_message','Wrong Email or Password..');
            return redirect()->back();   
        }
    }


    public function showChangeProfilePage(){

        $data['user'] = User::where('id',Auth::user()->id)->first();

        return view('auth.change_profile',$data);
    }


    public function changeProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contact_no' => 'numeric|required'
        ]);  

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } 

        User::where('id',Auth::user()->id)->update(['name' => $request->name, 'contact_no' => $request->contact_no]);

        Session::flash('success_msg','Successfully updated..');
        return redirect()->back();

    }


    public function showChangePasswordPage()
    {
        return view('auth.change_password');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required'
        ]);

        if($validator->fails()){
            
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $password = bcrypt($request->password);

        User::where('id',Auth::user()->id)->update(['password' => $password]);

        Session::flash('success_msg','Successfully updated..');
        return redirect()->back();

    }


}
