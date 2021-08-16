<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\ProductType;
use App\User;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use PhpParser\Builder\Use_;

class AdminController extends Controller
{
    public function getIndex(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $pr = Product::all();
        $us = User::all();
        $b = Bill::all();
        $ms = Bill::where('payment',"ATM"); 
        
        return view('admin.dashboard',compact('pr','us','b','ms'));
    }
    public function dashboard(Request $rq){
        $admin_email = $rq->admin_email;
        $admin_password = $rq->admin_password;
        $result = DB::table('admin')->where('email',$admin_email)->where('password',$admin_password)->first();
        // dd($result);
        // exit();

        if($result)
        {
            Session::put('name',$result->name);
            return view('admin.dashboard');
        }
        else{
            
            Session::put('message','Sai tên tài khoản hoặc mật khẩu');
            return redirect()->back();

        }
    }
    public function logout()
    {
        // Session::put('name',null);
        // Session::put('messge',null);
        Session::flush();
        return redirect('admin-login');
    }
    //add,edit,delete
    public function getSearch(Request $rq){
        $search = Product::where('name','like','%'.$rq->key.'%')
                            ->orWhere('unit_price',$rq->key)->get();
        return view('admin.search-product',compact('search'));
    }

    public function add_p(){
        return view('admin.add-product');
    }
    public function postAdd_p(Request $rq){
        $product = new Product();
        $product->name =$rq->name;
        $product->id_type =$rq->type;
        $product->description = $rq->description;
        $product->unit_price =$rq->unit_price;
        $product->promotion_price =$rq->promotion_price;
        $product->image = $rq->image;
        $product->unit =$rq->unit;
        $product->new =$rq->new;
        $product->save();
        return redirect()->back()->with('thanhcong','Thêm hàng thành công');
    }

    public function all_p(){
        $all_product = DB::table('products')->paginate(20);
        return view('admin.all-product',compact('all_product'));
    }
    public function edit_p(Request $rq){
        $sp = Product::where('id',$rq->id)->first();
        return view('admin.edit-product',compact('sp'));
    }
    public function postEdit_p(Request $rq){
        $sp = Product::where('id',$rq->id)->update([
                    'name' => $rq->name,
                    'id_type'=> $rq->type,
                    'unit_price' => $rq->unit_price,
                    'promotion_price' => $rq->promotion_price,
                    'image' => $rq->image,
                    'unit' => $rq->unit,
                    'new' => $rq->new
        ]);
        return redirect()->back()->with('thanhcong','Sửa sản phẩm thành công.');
    }
    public function delete_p(Request $rq){
        // $a=Product::find($rq->id);
        // $a->delete();
        DB::table('products')->where('id',$rq->id)->delete();
        return redirect()->back()->with('thanhcong','Xoá sản phẩm thành công');
    }


///////////////////////
    public function add_u(){
        return view('admin.add-user');
    }
    public function postAdd_u(Request $rq){
        $user = new User();
        $user->full_name = $rq->full_name;
        $user->email = $rq->email;
        $user->password = md5($rq->password);
        $user->phone = $rq->phone;
        $user->address = $rq->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Thêm người dùng thành công');
    }
    public function all_u(){
        $all_user = User::where('id','>',1)->paginate(10);
        return view('admin.all-user',compact('all_user'));
    }
    public function edit_u(Request $rq){
        //chưa sửa được
        $u = User::where('id',$rq->id)->first();
        return view('admin.edit-user',compact('u'));
    }
    public function postEdit_u(Request $rq){
        $sp = User::where('id',$rq->id)->update([
            'full_name' => $rq->full_name,
            'email'=> $rq->email,
            'password' => md5($rq->password),
            'phone' => $rq->phone,
            'address' => $rq->address
        ]);
        return redirect()->back()->with('thanhcong','Sửa người dùng thành công.');

    }
    public function delete_u(Request $rq){
        // $a=Product::find($rq->id);
        // $a->delete();
        DB::table('users')->where('id',$rq->id)->delete();
        return redirect()->back()->with('thanhcong','Xoá người dùng thành công');
    }

//////////////////
    public function add_b(){
        return view('admin.add-bill');
    }
    public function all_b(){
        $all =Bill::all();
        return view('admin.all-bill',compact('all'));
    }
    public function edit_b(Request $rq){
        $b = Bill::where('id',$rq->id)->first();
        return view('admin.edit-bill',compact('b'));
    }
    public function postEdit_b(Request $rq){
        $b = Bill::where('id',$rq->id)->update([
            'id_customer' => $rq->id_customer,
            'total'=>$rq->total,
            'payment' => $rq->payment,
            'note' => $rq->note,
        ]);
        return redirect()->back()->with('thanhcong','Sửa người dùng thành công.');
    }
    public function delete_b(Request $rq){
        // $a=Product::find($rq->id);
        // $a->delete();
        DB::table('bills')->where('id',$rq->id)->delete();
        DB::table('bill_detail')->where('id_bill',$rq->id)->delete();
        return redirect()->back()->with('thanhcong','Xoá đơn hàng thành công');
    }

    
}
