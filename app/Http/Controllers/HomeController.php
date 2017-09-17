<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Vehicle;
use Validator;
use Mail;
use Session;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vehicles'] = Vehicle::whereIn('rank',[1,2,3,4,5,6,7,8,9,10])->get();
        $data['reviews'] = Review::join('users', 'reviews.user_id', '=', 'users.id')->orderBy('reviews.id','DESC')->with('user')->paginate(2);
        $data['rate'] = Review::whereNotIn('rate',[0])->pluck('rate')->avg();
        $data['rate'] = number_format($data['rate'],1);
        return view('home',$data);
    }


    public function showContactusPage()
    {
        return view('contact');
    }
    

    public function showAboutUsPage()
    {
        return view('about');
    }

    public function showTernsAndConditionPage()
    {
        return view('termsandcondition');
    }


    public function emailContact(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',    
        ]); 

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['content'] = $request->message;

        Mail::send('emails.contact_us', $data, function ($m){
            $m->from(env('MAIL_USERNAME'), config('site_name.name'));

            $m->to(env('MAIL_USERNAME'))->subject('Contact us');

            
        });

        Session::flash('success_msg','Your message has been sent to our team.');
        return back();

    }

}
