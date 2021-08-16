@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{url('sua-don-hang')}}" method="post">
                        {{ csrf_field() }}
                        @if(Session::has('thanhcong'))
                        <div>{{Session::get('thanhcong')}}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Id</label>
                            <input type="text" class="form-control" name="id" value="{{$b->id}}" readonly>
                            <label for="exampleInputEmail1">Id customer</label>
                            <input type="text" class="form-control" name="id_customer" value="{{$b->id_customer}}">
                            <label for="exampleInputEmail1">Total</label>
                            <input type="text" class="form-control" name="total" value="{{number_format($b->total)}}">
                            <label for="exampleInputEmail1">Payment</label>
                            <input type="text" class="form-control" name="payment" value="{{$b->payment}}">
                            <label for="exampleInputEmail1">Note</label>
                            <textarea type="text" class="form-control"  style="resize: none;" rows="5"  name="note" value="{{$b->note}}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection