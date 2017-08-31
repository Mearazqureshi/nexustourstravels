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
        $booked_vehicle = BookVehicle::where('vehicle_id',$vehicle_id)->pluck('hire_date');

        foreach ($booked_vehicle as $key => $value) {
            $data['booked_vehicle'][] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
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

        $total = $vehicle->basic_rent + ($vehicle->rent_per_km * $request->km);

        BookVehicle::create(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => $user->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total
                            ]);

        $book_vehicle = BookVehicle::where(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => $user->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total
                        ])->first();

        $order_for = 'vehicle';

        $data['order_data'] = [
            'key' => 'rjQUPktU ',
            'txnid' => $book_vehicle->id,
            'amount' => $total,
            'productinfo' => 'Book Vehicle',
            'firstname' => $user->name,
            'email' => $user->email,
            'phone' => $request->contact_no,
            'surl' => url('vehicle_orders'),
            'furl' => url('vehicle_fail_orders'),
            'service_provider' => 'payu_paisa',
            'hash' => hash("sha512",'rjQUPktU|'.$book_vehicle->id.'|'.$total.'|payu_paisa|'.$request->name.'|'.$user->email.'|||||||||||e5iIg1jwi8')
        ];

        return view('payment.payment',$data);

    }


    public function searchVehicle(Request $request)
    {
        $data['vehicles'] = Vehicle::where('name',$request->vehicle_name)->get();
        $data['vehicles_count'] = Vehicle::where('name',$request->vehicle_name)->count();
        

        return view('vehicle.index',$data);
    }


}
