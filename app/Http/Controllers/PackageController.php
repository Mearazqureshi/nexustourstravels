<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\PackageImage;
use App\User;
use Auth;
use Validator;
use App\BookPackage;
use Session;
use PDF;
use Mail;
use Config;
use App\WishPackage;
use App\Rating;


class PackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showSearchPackagePage()
    {
        return view('package.search_package');
    }


    public function index(Request $request)
    {
        $data['packages'] = Package::where('from',$request->from)->where('to',$request->to)->orderBy('rate','DESC')->paginate(Config::get('user_side.package_list'));;
        $data['packages_count'] = Package::where('from',$request->from)->where('to',$request->to)->count();
        $data['from'] = $request->from;
        $data['to'] = $request->to;

        return view('package.index',$data);
    }


    public function showPackage($package_id)
    {
        $data['package'] = Package::where('id',$package_id)->first();
        $data['package_images'] = PackageImage::where('package_id',$package_id)->get();

        return view('package.show_package',$data);
    }


    public function packageConfirmationPage(Request $request)
    {
        $user_id = Auth::user()->id;

        if($request->rating){ 

            if(Rating::where('user_id',$user_id)->first())
            {   
                Rating::where('user_id',$user_id)->update(['user_id' => $user_id,'package_id' => $request->package_id , 'rate' => $request->rating]);
            }   
            else{
                Rating::create(['user_id' => $user_id,'package_id' => $request->package_id , 'rate' => $request->rating]);    
            }

            $rating = Rating::where('package_id',$request->package_id)->avg('rate');;

            Package::where('id',$request->package_id)->update(['rate' => number_format($rating,1)]);

        }

        $data['user'] = User::where('id',$user_id)->first();
        $data['package_id'] = $request->package_id;
        $data['package'] = Package::where('id',$request->package_id)->first();

        return view('package.show_package_confirmation',$data);
    }


    public function bookPackage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contact_no' => 'numeric|required',
            'no_of_person' => 'numeric|required',
            'source_city' => 'required',
            'departure_city' => 'required',
            'journey_date' => 'required'
        ]);  

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } 

        $package = Package::where('id',$request->package_id)->first();

        $total = $request->no_of_person * $package->price; 

        BookPackage::create(['package_id' => $request->package_id,
                             'no_of_person' => $request->no_of_person,
                             'user_id' => Auth::user()->id,
                             'journey_date' => $request->journey_date,
                             'source_city' => $request->source_city,
                             'departure_city' => $request->departure_city,
                             'contact_no' => $request->contact_no,
                             'total' => $total
                            ]);

        Session::flash('flash_success','Your request has been sent. we will response you by email');
        return redirect()->back();

    }


    public function showAllPackages()
    {
        $data['packages'] = Package::orderBy('rate','DESC')->paginate(Config::get('user_side.package_list'));
        $data['packages_count'] = Package::count();
        
        return view('package.all_packages',$data);
    }


    public function downloadPackage($package_id)
    {
        $data['package'] = Package::where('id',$package_id)->first();

        $pdf = PDF::loadView('package.download_package', $data);
        return $pdf->stream();

    }


    public function send()
    {

        $user = User::where('id',Auth::user()->id)->first();

        Mail::send('emails.forget_password', ['user' => $user], function ($m) use ($user) {
            $m->from(env('MAIL_USERNAME'),'Safar tours & travels');

            $m->to('rizwanqureshi15@gmail.com')

            ->subject('Your Reminder!');
        });
     dd('sent');   
    }


    public function showWishPackagePage()
    {
        return view('package.wish_package');
    }


    public function wishPackage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'numeric|required',
            'no_of_person' => 'numeric|required',
            'source' => 'required',
            'destination' => 'required',
            'journey_date' => 'required',
            'estimate_amount' => 'required'
        ]);  

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } 

        WishPackage::create(['name' => $request->name,
                             'email' => $request->email,
                             'contact_no' => $request->contact_no,
                             'no_of_person' => $request->no_of_person,
                             'source' => $request->source,
                             'destination' => $request->destination,
                             'journey_date' => $request->journey_date,
                             'estimate_amount' => $request->estimate_amount]
                            );

        Session::flash('flash_success','Your request has been sent. We will response you.');
        return redirect()->back();    

    }


    public function sortAllPackages(Request $request)
    {
        $data['packages'] = Package::orderBy('price',$request->sort_by)->orderBy('rate','DESC')->paginate(Config::get('user_side.package_list'));

        return $data['packages'];
    }


    public function sortPackages(Request $request)
    {
        $data['packages'] = Package::where('from',$request->from)->where('to',$request->to)->orderBy('price',$request->sort_by)->orderBy('rate','DESC')->paginate(Config::get('user_side.package_list'));

        return $data['packages'];
    }

}
