<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;
use App\BookPackage;
use App\BookVehicle;
use Config;

class OrderController extends Controller
{
    /**
     * Show the application login.
     *
     * @return \Illuminate\Http\Response
     */

    public function showConfirmPackagesList()
    {
        $data['packages'] = BookPackage::join('users','book_packages.user_id','users.id')->orderBy('book_packages.id','DESC')->with('package')->where('book_packages.is_confirm','1')->paginate(Config::get('admin_side.list_items'));
        $data['book_packages_count'] = BookPackage::where('is_confirm','1')->count();

        return view('admin.Confirm.confirm_packages',$data);
    }


    public function showConfirmVehiclesList()
    {
        $data['vehicles'] = BookVehicle::join('users','book_vehicles.user_id','users.id')->select('users.name','book_vehicles.*')->orderBy('book_vehicles.id','DESC')->with('vehicle')->where('book_vehicles.is_confirm','1')->paginate(Config::get('admin_side.list_items'));
        $data['book_vehicles_count'] = BookVehicle::where('is_confirm','1')->count();

        return view('admin.Confirm.confirm_vehicles',$data);
    }

}
