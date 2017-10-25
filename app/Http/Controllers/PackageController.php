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
use Redirect;


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

        $booked_packages = BookPackage::join('packages', 'packages.id', '=', 'book_packages.package_id')
                                        ->select('book_packages.journey_date','packages.no_of_days')
                                        ->where('package_id',$request->package_id)
                                        ->whereNotIn('status',[1])
                                        ->get();
        $data['booked_packages'] = array();
        
        foreach ($booked_packages as $key => $booked_package) {
            $data['booked_packages'][] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booked_package->journey_date)->format('Y-m-d');
            for($i=0; $i <$booked_package->no_of_days ; $i++) {
                $data['booked_packages'][] =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booked_package->journey_date)->addDay($i)->format('Y-m-d');
            }
        }
       
        $data['booked_packages'] = json_encode($data['booked_packages']);

        return view('package.show_package_confirmation',$data);

        //return Redirect::route('show-book-package-page')->with(['package_id' => $request->package_id]);
    }


    public function showBookPackagePage()
    {
        $user_id = Auth::user()->id;
        $package_id = Session::get('package_id');

        $data['user'] = User::where('id',$user_id)->first();
        $data['package_id'] = $package_id;
        $data['package'] = Package::where('id',$package_id)->first();

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

        $user = Auth::user();
        $package = Package::where('id',$request->package_id)->first();
        if($request->payment_method == 'half_payment'){
            $total = $request->no_of_person * $package->price/2;
        }
        else{
            $total = $request->no_of_person * $package->price;
        } 

        if($request->payment_method == 'offline_payment')
        {
            BookPackage::create(['package_id' => $request->package_id,
                                 'no_of_person' => $request->no_of_person,
                                 'user_id' => Auth::user()->id,
                                 'journey_date' => $request->journey_date,
                                 'source_city' => $request->source_city,
                                 'departure_city' => $request->departure_city,
                                 'contact_no' => $request->contact_no,
                                 'total' => $total,
                                 'status' => 2,
                                 'payment_status' => 1
                                ]);

            Session::flash('flash_success','Your request has been sent. we will response you by email');
            return redirect('all-packages');
        }
        else{

            BookPackage::create(['package_id' => $request->package_id,
                                 'no_of_person' => $request->no_of_person,
                                 'user_id' => Auth::user()->id,
                                 'journey_date' => $request->journey_date,
                                 'source_city' => $request->source_city,
                                 'departure_city' => $request->departure_city,
                                 'contact_no' => $request->contact_no,
                                 'total' => $total,
                                 'status' => 1
                                ]);

            $book_package = BookPackage::where(['package_id' => $request->package_id,
                                 'no_of_person' => $request->no_of_person,
                                 'user_id' => Auth::user()->id,
                                 'journey_date' => $request->journey_date,
                                 'source_city' => $request->source_city,
                                 'departure_city' => $request->departure_city,
                                 'contact_no' => $request->contact_no,
                                 'total' => $total,
                                 'status' => 1
                            ])->first();

            $random_number = rand(0,9999);
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10|salt";
            $hash_string = 'paH7DXml|'.$random_number.'|'.$total.'|Book Package|'.$user->name.'|'.$user->email.'|'.$request->payment_method.'|'.$book_package->id.'|||||||||QIGpBU4K5K';

            $hash = strtolower(hash('sha512', $hash_string));

            $data['order_data'] = [
                'key' => 'paH7DXml',
                'txnid' => $random_number,
                'amount' => $total,
                'productinfo' => 'Book Package',
                'firstname' => $user->name,
                'email' => $user->email,
                'phone' => $request->contact_no,
                'surl' => url('package_orders'),
                'furl' => url('fail_orders'),
                'service_provider' => 'payu_paisa',
                'hash' => $hash,
                'udf1' => $request->payment_method,
                'udf2' => $book_package->id
            ];

            return view('payment.payment',$data);
        }
        // Session::flash('flash_success','Your request has been sent. we will response you by email');
        // return redirect('all-packages');

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


    public function showOrderPackages(Request $request){

        if($request->udf1 == 'half_payment')
        {
            $payment_status = 2;
        }
        else if($request->udf1 == 'full_payment')
        {
            $payment_status = 3;
        }

        BookPackage::where('id',$request->udf2)->update(['payment_status' => $payment_status,'status' => 2,'is_confirm' => 1]);
        $book_package = BookPackage::where('id',$request->udf2)->first();

        $data = ['amount' => $request->amount,'firstname' => $request->firstname ,'email' => $request->email];

        Mail::send('emails.payment_package', ['book_package' => $book_package,'data' => $data], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'),'Nexus tours travels');

            $m->to($data['email'])

            ->subject('Payment');
        });
        
        Session::flash('flash_success','Package successfully booked.');
        return back();
    }

}
