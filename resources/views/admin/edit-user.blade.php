@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Sửa người dùng
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{url('sua-nguoi-dung')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                        @if(Session::has('thanhcong'))
						<div>{{Session::get('thanhcong')}}</div>
					    @endif
                            <label for="exampleInputEmail1">Full name</label>
                            <input type="text" class="form-control" name="full_name"
                                value="{{$u->full_name}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email"
                                value="{{$u->email}}">
                                <label for="exampleInputEmail1">Password</label>
                            <input type="number" class="form-control" name="password"
                                value="password">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number"  class="form-control" name="phone"
                                value="{{$u->phone}}"></inp>
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="address" 
                                value="{{$u->address}}">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection