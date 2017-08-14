<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;
use Config;

class AdminController extends Controller
{
    /**
     * Show the application login.
     *
     * @return \Illuminate\Http\Response
     */

    public function showLoginPage()
    {
        return view('admin.login');
    }


    public function showAdminDashboardPage()
    {
        return view('admin.admin_dashboard');
    }


    public function logout()
    {
        Auth::logout();

        Session::flash('flash_success','Successfully logout');
        return redirect('admin');
    }


    public function userList()
    {
        $data['users'] = User::orderBy('id','DESC')->paginate(Config::get('admin_side.list_items'));
        $data['users_count'] = User::count();

        return view('admin.User.index',$data);
    }

}
