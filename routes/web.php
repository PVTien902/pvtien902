<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index', ['as' => 'trangchu', 'uses' => 'PageController@getIndex']);

Route::get('tim-kiem',[PageController::class ,'getSearch']);

Route::get('loai-san-pham/{type}', ['as' => 'loaisanpham', 'uses' => 'PageController@getLoaiSanPham']);
Route::get('chi-tiet-san-pham/{id}', ['as' => 'chitietsanpham', 'uses' => 'PageController@getChiTietSanPham']);
Route::get('lien-he', ['as' => 'lienhe', 'uses' => 'PageController@getLienHe']);
Route::get('gioi-thieu', ['as' => 'gioithieu', 'uses' => 'PageController@getGioiThieu']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddtoCart']);

Route::get('edit-to-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getreduceByOne_Cart']);
Route::get('delete-to-cart/{id}',['as'=>'xoagiohangall','uses'=>'PageController@getDeleteItemCart']);
// Route::get('dat-hang',['as'=>'dathang','uses'=>'PageController@postCheckout']);

Route::post('xu-li-don-dat-hang', [PageController::class, 'postCheckout']);

Route::get('dat-hang', [PageController::class, 'getCheckout']);

Route::get('dang-nhap',[PageController::class, 'getLogin']);
Route::post('xu-ly-dang-nhap',[PageController::class, 'postLogin']);
Route::get('dang-xuat',[PageController::class ,'getLogout']);

Route::get('dang-ki',['as'=>'signup','uses'=>'PageController@getSignup']);
// Route::post('dang-ki',['as'=>'signup','uses'=>'PageController@postSignup']);
Route::post('dangki_tk', [PageController::class, 'postSignup']);

Route::get('/home', 'HomeController@index')->name('home');
//in-out admin
Route::get('admin-login',['as'=>'adminlogin','uses'=>'AdminController@getIndex']);

Route::get('dashboard',['as'=>'dashboard','uses'=>'AdminController@show_dashboard']);
Route::post('dashboard',['as'=>'admindashboard','uses'=>'AdminController@dashboard']);

Route::get('logout',['as'=>'logout','uses'=>'AdminController@logout']);
//edit-dlete-all
Route::get('tim-kiem-san-pham',[AdminController::class ,'getSearch']);

Route::get('tat-ca-san-pham',[AdminController::class ,'all_p']);
Route::get('tat-ca-san-pham-/{id}',[AdminController::class ,'delete_p']);//xoa_sp 

Route::get('them-san-pham',['as'=>'add_p','uses'=>'AdminController@add_p']);
Route::post('them-san-pham',['as'=>'postadd_p','uses'=>'AdminController@postAdd_p']);

Route::get('sua-san-pham-/{id}',[AdminController::class ,'edit_p']);
Route::post('sua-san-pham',[AdminController::class ,'postEdit_p']);
//////
//////
Route::get('tat-ca-don-hang',[AdminController::class,'all_b']);
Route::get('tat-ca-don-hang/{id}',[AdminController::class,'delete_b']);//xoa

Route::get('them-don-hang',[AdminController::class,'add_b']);

Route::get('sua-don-hang-/{id}',[AdminController::class ,'edit_b']);
Route::post('sua-don-hang',[AdminController::class ,'postEdit_b']);

//////
/////
Route::get('tat-ca-nguoi-dung',[AdminController::class,'all_u']);
Route::get('tat-ca-nguoi-dung-/{id}',[AdminController::class ,'delete_u']);//xoa

Route::get('sua-nguoi-dung-/{id}',[AdminController::class ,'edit_u']);
Route::post('sua-nguoi-dung',[AdminController::class ,'postEdit_u']);

Route::get('them-nguoi-dung-',[AdminController::class ,'add_u']);
Route::post('them-nguoi-dung',[AdminController::class ,'postAdd_u']);
//////
/////






//                   Thống kê nữa




