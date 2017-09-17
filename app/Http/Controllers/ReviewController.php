<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Validator;
use Mail;
use Session;
use App\Review;
use Auth;

class ReviewController extends Controller
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
    public function showReviewPage(){

        $data['reviews'] = Review::join('users', 'reviews.user_id', '=', 'users.id')->orderBy('reviews.id','DESC')->with('user')->paginate(10);
        $data['rate'] = Review::whereNotIn('rate',[0])->pluck('rate')->avg();
        $data['rate'] = number_format($data['rate'],1);

        return view('review',$data);
    }

    public function store(Request $request)
    {
        if(Auth::guest()){
            return redirect('login');
        }

        $validator = Validator::make($request->all(),[
            'review' => 'required',
        ]);  

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } 

        $data = ['user_id' => Auth::user()->id,'review'=>$request->review];
        if($request->rating){
            $data1 = ['rate' => $request->rating];
            $data = array_merge($data,$data1);
        }

        Review::create($data);

        Session::flash('flash_success','Review added successfully.');
        return redirect()->back();
    }
   
}