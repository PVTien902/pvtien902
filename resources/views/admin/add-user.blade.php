@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm người dùng
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{url('them-nguoi-dung')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                        @if(Session::has('thanhcong'))
						<div>{{Session::get('thanhcong')}}</div>
					    @endif
                            <label for="exampleInputEmail1">Full name</label>
                            <input type="text" class="form-control" value="" name="full_name"
                                placeholder="Họ và tên">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email"
                                placeholder="Địa chỉ Email">
                                <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" name="password"
                                placeholder="Mật khẩu">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text"  class="form-control" name="phone"
                                placeholder="Số điện thoại"></inp>
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="address" 
                                placeholder="Địa chỉ">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection