<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use Auth;
use Validator;
use App\BookVehicle;
use Session;
use Config;
use Mail;

class VehicleController extends Controller
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

    public function index(Request $request)
    {
        $data['vehicles'] = Vehicle::all();
        $data['vehicles_count'] = Vehicle::count();
       
        return view('vehicle.index',$data);
    }


    public function showBookingVehiclePage($vehicle_id)
    {
        $data['user'] = User::where('id',Auth::user()->id)->first();
        $data['vehicle_id'] = $vehicle_id;
        $data['vehicle'] = Vehicle::where('id',$vehicle_id)->first();
        $booked_vehicle = BookVehicle::select('hire_date','no_of_days')->where('vehicle_id',$data['vehicle_id'])->whereNotIn('status',[1])->get();
        $data['booked_vehicle'] = array();
        
        foreach ($booked_vehicle as $key => $value) {
            $data['booked_vehicle'][] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->hire_date)->format('Y-m-d');
            for($i=0; $i <$value->no_of_days ; $i++) {
                $data['booked_vehicle'][] =  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->hire_date)->addDay($i)->format('Y-m-d');
            }
        }
       
        $data['booked_vehicle'] = json_encode($data['booked_vehicle']);

        return view('vehicle.book_vehicle',$data);
    }


    public function bookVehicle(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'contact_no' => 'numeric|required',
            'no_of_days' => 'numeric|required',
            'from' => 'required',
            'to' => 'required',
            'km' => 'required',
            'hire_date' => 'required'
        ]);  

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } 

        $vehicle = Vehicle::where('id',$request->vehicle_id)->first();

        $user = Auth::user();

        $total = $vehicle->rent_per_km*300;
        
        if($request->payment_method == 'half_payment')
        {
            if($request->km>300){
                $total = ($vehicle->rent_per_km * $request->km)/2;
            }
            else{
                $total = ($vehicle->rent_per_km*300)/2;
            }
        }
        else{
            if($request->km>300){
                $total = $vehicle->rent_per_km * $request->km;
            }
        }

        if($request->payment_method == 'offline_payment')
        {
            BookVehicle::create(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => $user->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total,
                             'status' => 2,
                             'payment_status' => 1
                            ]);

            Session::flash('flash_success','Your booking vehicle request is being sent. we will contact you by email');
            return back();
        }
        else{

            BookVehicle::create(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => $user->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total,
                             'status' => 1
                            ]);

            $book_vehicle = BookVehicle::where(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => $user->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total,
                             'status' => 1
                            ])->first();

            $random_number = rand(0,9999);
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10|salt";
            $hash_string = 'rjQUPktU|'.$random_number.'|'.$total.'|Book Vehicle|'.$user->name.'|'.$user->email.'|'.$request->payment_method.'|'.$book_vehicle->id.'|||||||||e5iIg1jwi8';

            $hash = strtolower(hash('sha512', $hash_string));

            $data['order_data'] = [
                'key' => 'rjQUPktU',
                'txnid' => $random_number,
                'amount' => $total,
                'productinfo' => 'Book Vehicle',
                'firstname' => $user->name,
                'email' => $user->email,
                'phone' => $request->contact_no,
                'surl' => url('vehicle_orders'),
                'furl' => url('vehicle_fail_orders'),
                'service_provider' => 'payu_paisa',
                'hash' => $hash,
                'udf1' => $request->payment_method,
                'udf2' => $book_vehicle->id,
            ];

            return view('payment.payment',$data);
        }

    }


    public function searchVehicle(Request $request)
    {
        $data['vehicles'] = Vehicle::where('name','like',$request->vehicle_name.'%')->get(); 
        $data['vehicles_count'] = Vehicle::where('name','like',$request->vehicle_name.'%')->count();
        
        return view('vehicle.index',$data);
    }


    public function showOrderVehicles(Request $request){

        if($request->udf1 == 'half_payment')
        {
            $payment_status = 2;
        }
        else if($request->udf1 == 'full_payment')
        {
            $payment_status = 3;
        }

        BookVehicle::where('id',$request->udf2)->update(['payment_status' => $payment_status,'status' => 2,'is_confirm' => 1]);
        $book_vehicle = BookVehicle::where('id',$request->udf2)->first();

        $data = ['amount' => $request->amount,'firstname' => $request->firstname ,'email' => $request->email];

        Mail::send('emails.payment', ['book_vehicle' => $book_vehicle,'data' => $data], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'),'Nexus tours travels');

            $m->to($data['email'])

            ->subject('Payment');
        });
        
        Session::flash('flash_success','Successfully booked vehicle');
        return back();
    }

}
