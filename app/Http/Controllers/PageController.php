<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Slide;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Customer;
use Illuminate\Support\Facades\Redirect;
use App\Bill;
use App\BillDetail;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(8);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(4);
        return view('page.trangchu', compact('slide', 'new_product','sale_product'));
    }
    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
    }
    public function getLoaiSanPham($type){
        $loai_sp = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $title = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('loai_sp','sp_khac','loai','title'));
    }
    public function getChiTietSanPham(Request $request){
        
        $sanpham = Product::where('id',$request->id)->orderBy('id','desc')->first();
        $sanpham_tt = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sanpham_banchay = Product::where('new',0)->paginate(8);
        $sanpham_moi = Product::where('new',1)->paginate(8);
        $description = ProductType::where('id',$sanpham->id_type)->first();
        return view('page.chitiet_sanpham',compact('sanpham','sanpham_tt','sanpham_banchay','sanpham_moi','description'));
    }
    public function getAddtoCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart-> add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    //delete allItem
    public function getDeleteItemCart(Request $request,$id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');    
        }
        return redirect()->back();
    }
    //delete oneItem
    public function getreduceByOne_Cart(Request $request,$id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');    
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dathang');
    }
    public function postCheckout(Request $rq){
        $cart = Session::get('cart');
        //dd($cart);
        $customer = new Customer();
        $customer->name = $rq->name;
        $customer->gender = $rq->gender;
        $customer->email = $rq->email;
        $customer->address = $rq->address;
        $customer->phone_number = $rq->phone;
        $customer->note = $rq->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = $cart->totalPrice;
        $bill->payment = $rq->payment;
        $bill->note = $rq->note;
        $bill->save();
            foreach($cart->items as $key =>$value){
                $bill_detail = new BillDetail();
                $bill_detail ->id_bill = $bill->id;
                $bill_detail ->id_product = $key;
                $bill_detail ->quantity = $value['qty'];
                $bill_detail ->unit_price = ($value['price']/$value['qty']);
                $bill_detail->status="Đang chuẩn bị giao hàng";
                $bill_detail->save();
            }
            Session::put('cart',null);
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.dangnhap');
        
    }
    public function getLogout() {
        Session::forget('name');
        Session::forget('messge');
        return redirect()->to('dang-nhap');
    }
    public function postLogin(Request $rq){
        $this->validate($rq,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Định dạng email không hợp lệ',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu nhiều nhất 20 kí tự'
        ]
        );
            $password = md5($rq->password);
            $result = DB::table('users')->where('email','=',$rq->email)->where('password','=',$password)
            ->first();
            if($result)
            {
                Session::put('name',$result->full_name);
                return redirect()->to('index');
            }
            else{
                Session::put('message','Sai tên tài khoản hoặc mật khẩu');
                return redirect()->back();
               
                

            }   
            //error Auth
            // $credentials = array('email'=>$rq->email,'password'=>$rq->password);
            // if(Auth::attempt(['email'=>$rq->email,'password'=>$rq->password])){
            //      return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            // }
            // else{
            //     return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            // }
    }

    public function getSignup(){
        return view('page.dangki');
    }
    public function postSignup(Request $rq){
        $this->validate($rq,
                [
                    'email'=>'required|email|unique:users,email',
                    'password'=>'required|min:6|max:20',
                    'fullname'=>'required',
                    're_password'=>'required|same:password'

                ],
                [
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Vui lòng nhập đúng định dạng',
                    'email.unique'=>'Email đã được sử dụng',
                    're_password.same'=>'Mật khẩu không trung khớp',
                    'password.min'=>'Mật khẩu it nhất phải 6 kí tự'

                ]); 
    
        $user = new User();
        $user->full_name = $rq->fullname;
        $user->email = $rq ->email;
        $user->password = md5($rq->password);
        $user->phone = $rq->phone;
        $user->address = $rq->address;
        $user->save();
        
        return view('page.dangnhap')->with('thanhcong','Tạo tài khoảng thành công. Đăng nhập ngay!');
    }
    public function  getSearch(Request $rq){
        $search = Product::where('name','like','%'.$rq->key.'%')
                            ->orWhere('unit_price',$rq->key)->get();
        return view('page.search',compact('search'));
    }

}