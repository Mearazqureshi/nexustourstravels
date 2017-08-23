<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'AuthController@login');

Route::get('/contact', 'HomeController@showContactusPage');

Route::post('/contact', 'HomeController@emailContact');

Route::get('/about','HomeController@showAboutUsPage');

Route::get('/termsandcondition','HomeController@showTernsAndConditionPage');

Route::get('/search-package','PackageController@showSearchPackagePage');

Route::post('/search-package','PackageController@index');

Route::get('/show-package/{package_id}','PackageController@showPackage');

Route::post('/package-confirm','PackageController@packageConfirmationPage')->middleware('auth');

Route::get('/vehicle-list','VehicleController@index');

Route::get('/book-vehicle/{vehicle_id}','VehicleController@showBookingVehiclePage')->middleware('auth');

Route::get('/admin','Admin\AdminController@showLoginPage');

Route::get('/admin_dashboard','Admin\AdminController@showAdminDashboardPage')->middleware('is_admin');

Route::get('admin/package/create','Admin\PackageController@create')->middleware('is_admin');

Route::post('admin/package/create','Admin\PackageController@store')->middleware('is_admin');

Route::get('admin/logout','Admin\AdminController@logout')->middleware('is_admin');

Route::get('admin/packages/list','Admin\PackageController@index')->middleware('is_admin');

Route::get('admin/package/edit/{package_id}','Admin\PackageController@edit')->middleware('is_admin');

Route::post('admin/package/update','Admin\PackageController@update')->middleware('is_admin');

Route::post('admin/package/delete','Admin\PackageController@delete')->middleware('is_admin');

Route::get('admin/users/list','Admin\AdminController@userList')->middleware('is_admin');

Route::get('admin/vehicles/list','Admin\VehicleController@index')->middleware('is_admin');

Route::get('admin/vehicles/create','Admin\VehicleController@create')->middleware('is_admin');

Route::post('admin/vehicles/create','Admin\VehicleController@store')->middleware('is_admin');

Route::get('admin/vehicle/edit/{vehicle_id}','Admin\VehicleController@edit')->middleware('is_admin');

Route::post('admin/vehicle/update/{vehicle_id}','Admin\VehicleController@update')->middleware('is_admin');

Route::post('admin/vehicle/delete','Admin\VehicleController@delete')->middleware('is_admin');

Route::post('book-vehicle','VehicleController@bookVehicle')->middleware('auth');

Route::get('admin/book_vehicles/list','Admin\VehicleController@bookVehicleList')->middleware('is_admin');

Route::get('admin/book_packages/list','Admin\PackageController@bookPackageList')->middleware('is_admin');

Route::post('search-vehicle','VehicleController@searchPackage');

Route::post('book-package','PackageController@bookPackage')->middleware('auth');

Route::get('orders/packages/list','Admin\OrderController@showConfirmPackagesList');

Route::get('orders/vehicles/list','Admin\OrderController@showConfirmVehiclesList');

Route::get('all-packages','PackageController@showAllPackages');

Route::get('change-profile','AuthController@showChangeProfilePage');

Route::post('change-profile','AuthController@changeProfile');

Route::get('change-password','AuthController@showChangePasswordPage');

Route::post('change-password','AuthController@changePassword');

Route::get('package-download/{package_id}','PackageController@downloadPackage');

Route::get('wish-package','PackageController@showWishPackagePage');

Route::post('wish-package','PackageController@wishPackage');


// Route::get('send','PackageController@send');

Route::get('forget-password','Auth\ForgotPasswordController@showForgetPasswordPage');

Route::get('admin/confirm-package/{package_id}','Admin\PackageController@confirmPackage')->middleware('is_admin');

Route::get('admin/confirm-vehicle/{vehicle_id}','Admin\VehicleController@confirmVehicle')->middleware('is_admin');

Route::get('admin/cancel-vehicle/{vehicle_id}','Admin\VehicleController@cancelVehicle')->middleware('is_admin');

Route::get('admin/cancel-package/{package_id}','Admin\PackageController@cancelPackage')->middleware('is_admin');

Route::post('admin/book-vehicle/delete','Admin\VehicleController@deleteBookVehicle')->middleware('is_admin');

Route::post('admin/book-package/delete','Admin\PackageController@deleteBookPackage')->middleware('is_admin');

Route::get('admin/wish_packages/list','Admin\PackageController@wishPackageList')->middleware('is_admin');

Route::get('admin/show-wish-package/{wish_package_id}','Admin\PackageController@wishPackageShow')->middleware('is_admin');

Route::get('admin/edit-package-images/{package_id}','Admin\PackageController@editPackageImages')->middleware('is_admin');

Route::get('admin/package-image-delete/{package_image_id}','Admin\PackageController@deletePackageImage')->middleware('is_admin');

Route::post('admin/add-package-images','Admin\PackageController@addPackageImages')->middleware('is_admin');

Route::get('review','ReviewController@showReviewPage');

Route::post('add-review','ReviewController@store');

Route::post('sort_all_packages','PackageController@sortAllPackages');

Route::post('sort_packages','PackageController@sortPackages');

Route::get('show-book-package-page','PackageController@showBookPackagePage')->name('show-book-package-page');;

