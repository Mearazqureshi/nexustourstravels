<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\User;
use Auth;
use Validator;
use App\BookVehicle;
use Session;

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

        $total = $vehicle->basic_rent + ($vehicle->rent_per_km * $request->km);

        BookVehicle::create(['vehicle_id' => $request->vehicle_id,
                             'no_of_days' => $request->no_of_days,
                             'user_id' => Auth::user()->id,
                             'hire_date' => $request->hire_date,
                             'from' => $request->from,
                             'to' => $request->to,
                             'km' => $request->km,
                             'contact_no' => $request->contact_no,
                             'total' => $total
                            ]);

        Session::flash('flash_success','Your request has been sent to our team. we will response you by email');
        return back();

    }


    public function searchPackage(Request $request)
    {
        $data['vehicles'] = Vehicle::where('name',$request->vehicle_name)->get();
        $data['vehicles_count'] = Vehicle::where('name',$request->vehicle_name)->count();
        

        return view('vehicle.index',$data);
    }


}
