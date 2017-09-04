<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Vehicle;
use Illuminate\Support\Facades\Input;
use File;
use Session;
use App\BookVehicle;
use Config;
use App\User;
use Mail;

class VehicleController extends Controller
{
    /**
     * Show the application login.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['vehicles'] = Vehicle::orderBy('id','DESC')->get();
        $data['vehicles_count'] = Vehicle::count();

        return view('admin/Vehicle/index',$data);
    }

    public function create()
    {
        return view('admin.Vehicle.create_vehicle');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'no_of_seats' => 'required|numeric',
            'basic_rent' => 'required|numeric',
            'rent_per_km' => 'required|numeric',
            'category' => 'required',
            'image' => 'required',
        ]); 

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $file = Input::file('image');               
        $destinationPath = public_path() .'/Vehicles';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(40) . '.' . $extension;
        $upload_success = $file->move($destinationPath, $fileName); 

        Vehicle::create([
                    'name' => $request->name,
                    'type' => $request->type,
                    'no_of_seats' => $request->no_of_seats,
                    'basic_rent' => $request->basic_rent,
                    'rent_per_km' => $request->rent_per_km,
                    'category' => $request->category,
                    'image' => $fileName,
                    'facilities' => $request->facilities
                ]);

        Session::flash('success_msg', 'Vehicle added Successfully..!');
        return redirect('admin/vehicles/list');

    }


    public function edit($vehicle_id)
    {
        $data['vehicle'] = Vehicle::where('id',$vehicle_id)->first();

        return view('admin/Vehicle/edit_vehicle',$data);
    }


    public function update(Request $request,$vehicle_id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'no_of_seats' => 'required|numeric',
            'basic_rent' => 'required|numeric',
            'rent_per_km' => 'required',
            'category' => 'required'
        ]); 

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = [
            'name' => $request->name,
            'type' => $request->type,
            'no_of_seats' => $request->no_of_seats,
            'basic_rent' => $request->basic_rent,
            'rent_per_km' => $request->rent_per_km,
            'category' => $request->category,
            'facilities' => $request->facilities
        ];

        if($request->image){
            $file = Input::file('image');               
            $destinationPath = public_path() .'/Vehicles';
            $extension = $file->getClientOriginalExtension();
            $fileName = str_random(40) . '.' . $extension;
            $upload_success = $file->move($destinationPath, $fileName); 
            
            $image = ['image' => $fileName];
            $data = array_merge($data,$image);
        }
        
        Vehicle::where('id',$vehicle_id)->update($data);

        Session::flash('success_msg', 'Vehicle updates Successfully..!');
        return redirect('admin/vehicles/list');
    }


    public function delete(Request $request)
    {
        Vehicle::where('id',$request->vehicle_delete_id)->delete();

        Session::flash('success_msg', 'Vehicle deleted Successfully..!');
        return redirect('admin/vehicles/list');
    }


    public function bookVehicleList()
    {
        $data['vehicles'] = BookVehicle::join('users','book_vehicles.user_id','users.id')->orderBy('book_vehicles.id','DESC')->with('vehicle')->where('book_vehicles.is_confirm',0)->paginate(Config::get('admin_side.list_items'));
        $data['book_vehicles_count'] = BookVehicle::where('is_confirm',0)->count();

        return view('admin.BookVehicle.index',$data);
    }


    public function confirmVehicle($vehicle_id)
    {
        $data['book_vehicle'] = BookVehicle::where('id',$vehicle_id)->first();
        $data['user'] = User::where('id',$data['book_vehicle']->user_id)->first();

        Mail::send('emails.confirm_vehicle', ['book_vehicle' => $data['book_vehicle'],'user' => $data['user']], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'), config('site_name.name'));

            $m->to($data['user']->email)

            ->subject('Confirm Vehicle');
        });    

        BookVehicle::where('id',$vehicle_id)->update(['is_confirm' => 1]);

        Session::flash('success_msg','Confirm vehicle mail has been sent.');
        return back();

    }


    public function cancelVehicle($vehicle_id)
    {
        $data['book_vehicle'] = BookVehicle::where('id',$vehicle_id)->first();
        $data['user'] = User::where('id',$data['book_vehicle']->user_id)->first();

        Mail::send('emails.cancel_vehicle', ['book_vehicle' => $data['book_vehicle'],'user' => $data['user']], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'), config('site_name.name'));

            $m->to($data['user']->email)

            ->subject('Cancel Vehicle');
        });    

        BookVehicle::where('id',$vehicle_id)->update(['is_confirm' => 0]);

        Session::flash('success_msg','Cancel vehicle mail has been sent.');
        return back();

    }


    public function deleteBookVehicle(Request $request)
    {
        $vehicle_id = $request->vehicle_delete_id;

        BookVehicle::where('id',$vehicle_id)->delete();

        Session::flash('success_msg','Successfully deleted');
        return back();
    }

}
