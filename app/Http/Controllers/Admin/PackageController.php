<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Package;
use App\PackageImage;
use Illuminate\Support\Facades\Input;
use File;
use Config;
use Session;
use App\BookPackage;
use Mail;
use App\User;
use App\WishPackage;

class PackageController extends Controller
{
    /**
     * Show the application login.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['packages'] = Package::orderBy('id','DESC')->get();
        $data['packages_count'] = Package::count();

        return view('admin/Package/index',$data);
    }

    public function create()
    {
        return view('admin.Package.create_package');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'no_of_days' => 'required|numeric',
            'price' => 'required|numeric',
            'information' => 'required',
            'city' => 'required',
            'image' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]); 

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $file = Input::file('image');               
        $destinationPath = public_path() .'/Packages';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(40) . '.' . 'jpg';
        $upload_success = $file->move($destinationPath, $fileName); 

        Package::create([
                    'name' => $request->name,
                    'no_of_days' => $request->no_of_days,
                    'price' => $request->price,
                    'information' => $request->information,
                    'city' => $request->city,
                    'image' => $fileName,
                    'from' => $request->from,
                    'to' => $request->to,
                    'rank' => $request->rank
                ]);

        $package = Package::where(['name' => $request->name,
                                    'no_of_days' => $request->no_of_days,
                                    'price' => $request->price,
                                    'information' => $request->information,
                                    'city' => $request->city,
                                    'image' => $fileName,
                                    'from' => $request->from,
                                    'to' => $request->to,
                                    'rank' => $request->rank
                                  ])
                                ->first();

        $path = public_path() .'/Packages/'.$package->id;  

        if(!File::exists($path))
        { 
            File::makeDirectory($path);
        } 

        foreach ($request->package_images as $photo)
        {
            $destinationPath = public_path() .'/Packages/'.$package->id.'/';
            $extension = pathinfo($photo, PATHINFO_EXTENSION); 
            $fileName = str_random(40) . '.' . $extension;
            $upload_success = $photo->move($destinationPath, $fileName);

            PackageImage::create(['package_id' => $package->id , 'image' => $fileName]);
        }

        Session::flash('success_msg', 'package added Successfully..!');
        return redirect('admin/packages/list');

    }


    public function edit($package_id)
    {
        $data['package'] = Package::where('id',$package_id)->first();

        return view('admin/Package/edit_package',$data);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'no_of_days' => 'required|numeric',
            'price' => 'required|numeric',
            'information' => 'required',
            'city' => 'required'
        ]); 

        if($validator->fails()){

            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = [
                'name' => $request->name,
                'no_of_days' => $request->no_of_days,
                'price' => $request->price,
                'information' => $request->information,
                'city' => $request->city,
                'rank' => $request->rank
        ];

        if($request->image){
            $file = Input::file('image');               
            $destinationPath = public_path() .'/Packages';
            $extension = pathinfo($file, PATHINFO_EXTENSION); 
            $fileName = str_random(40) . '.' . $extension;
            $upload_success = $file->move($destinationPath, $fileName); 

            $image = ['image' => $fileName];
            $data = array_merge($data,$image);
        }

        Package::where('rank',$request->rank)->update(['rank' => 0]);

        Package::where('id',$request->id)->update($data);

        Session::flash('success_msg', 'Package updates Successfully..!');
        return redirect('admin/packages/list');
    }


    public function delete(Request $request)
    {
        Package::where('id',$request->package_delete_id)->delete();

        Session::flash('success_msg', 'Package deleted Successfully..!');
        return redirect('admin/packages/list');
    }


    public function bookPackageList()
    {
        $data['packages'] = BookPackage::join('users','book_packages.user_id','users.id')
                                        ->select('book_packages.*','users.name')
                                        ->orderBy('book_packages.id','DESC')
                                        ->with('package')->where('book_packages.is_confirm',0)
                                        ->where('status',2)
                                        ->where('payment_status',1)
                                        ->paginate(Config::get('admin_side.list_items'));

        $data['book_packages_count'] = BookPackage::where('is_confirm',0)->where('status',2)->where('payment_status',1)->count();

        return view('admin.BookPackage.index',$data);
    }


    public function confirmPackage($package_id)
    {
        $data['book_package'] = BookPackage::where('id',$package_id)->first();
        $data['user'] = User::where('id',$data['book_package']->user_id)->first();

        Mail::send('emails.confirm_package', ['book_package' => $data['book_package'],'user' => $data['user']], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'), config('site_name.name'));

            $m->to($data['user']->email)

            ->subject('Confirm Package');
        });    

        BookPackage::where('id',$package_id)->update(['is_confirm' => 1]);

        Session::flash('success_msg','Confirm package mail has been sent.');
        return back();

    }


    public function cancelPackage($package_id)
    {
        $data['book_package'] = BookPackage::where('id',$package_id)->first();
        $data['user'] = User::where('id',$data['book_package']->user_id)->first();

        Mail::send('emails.cancel_package', ['book_package' => $data['book_package'],'user' => $data['user']], function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME'), config('site_name.name'));

            $m->to($data['user']->email)

            ->subject('Cancel Package');
        });    

        BookPackage::where('id',$package_id)->update(['is_confirm' => 0]);

        Session::flash('success_msg','Cancel package mail has been sent.');
        return back();

    }


    public function deleteBookPackage(Request $request)
    {
        $package_id = $request->package_delete_id;

        BookPackage::where('id',$package_id)->delete();

        Session::flash('success_msg','Successfully deleted');
        return back();
    }



    public function wishPackageList()
    {
        $data['wish_packages'] = WishPackage::orderBy('id','DESC')->paginate(Config::get('admin_side.list_items'));
        $data['count_wish_packages'] = WishPackage::count();

        return view('admin.WishPackage.index',$data);
    }


    public function wishPackageShow($wish_package_id)
    {
        $data['wish_package'] = WishPackage::where('id',$wish_package_id)->first();

        return view('admin.WishPackage.show_wish_package',$data);
    }


    public function editPackageImages($package_id)
    {
        $data['package_images'] = PackageImage::where('package_id',$package_id)->get();
        $data['count_package_images'] = PackageImage::where('package_id',$package_id)->count();
        $data['package_id'] = $package_id;

        return view('admin.Package.edit_package_images',$data);

    }

    public function addPackageImages(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'package_id' => 'required',
        ]); 

        if($validator->fails()){

            Session::flash('success_msg','Something went wrong');
            return redirect()->back()
                    ->withInput();
        }

        $path = public_path() .'/Packages/'.$request->package_id;  

        if(!File::exists($path))
        { 
            File::makeDirectory($path);
        } 

        foreach ($request->package_images as $photo)
        {
            $destinationPath = public_path() .'/Packages/'.$request->package_id.'/';
            $extension = pathinfo($photo, PATHINFO_EXTENSION); 
            $fileName = str_random(40) . '.' . $extension;
            $upload_success = $photo->move($destinationPath, $fileName);

            PackageImage::create(['package_id' => $request->package_id , 'image' => $fileName]);
        }

        Session::flash('success_msg','Image successfully inserted.');
        return redirect()->back();

    }


    public function deletePackageImage($package_image_id)
    {
        $package_image = PackageImage::where('id',$package_image_id)->first();

        unlink(public_path().'/Packages/'.$package_image->package_id.'/'.$package_image->image);

        PackageImage::where('id',$package_image_id)->delete();

        Session::flash('success_msg','Image successfully deleted');
        return back();
    }


}
