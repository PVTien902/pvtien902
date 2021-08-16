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
                    <form role="form" action="{{url('sua-san-pham')}}" method="post">
                        {{ csrf_field() }}
                        @if(Session::has('thanhcong'))
                        <div>{{Session::get('thanhcong')}}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Id</label>
                            <input type="text" class="form-control" name="id" value="{{$sp->id}}"
                                placeholder="" readonly>
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$sp->name}}"
                                placeholder="Tên danh mục">
                            <label for="exampleInputEmail1">Id type</label>
                            <select name="type" class="form-control input-sm m-bot15">
                                <option value="1">Bánh mặn</option>
                                <option value="2">Bánh ngọt</option>
                                <option value="3">Bánh trái cây</option>
                                <option value="4">Bánh kem</option>
                                <option value="5">Bánh crepe</option>
                                <option value="6">Bánh pizza</option>
                                <option value="6">Bánh su kem</option>
                            </select>
                                <label for="exampleInputEmail1">Unit_price</label>
                            <input type="number" class="form-control" value="{{$sp->unit_price}}" name="unit_price"
                                placeholder="Tên danh mục">
                            <label for="exampleInputEmail1">Promotion_price</label>
                            <input type="number"  class="form-control" value="{{$sp->promotion_price}}" name="promotion_price"
                                placeholder="Mô tả sản phẩm"></input>
                            <label for="exampleInputEmail1">Src image</label>
                            <input type="text" class="form-control" value="{{$sp->image}}" name="image" 
                                placeholder="Đường dẫn ảnh sản phẩm">

                                <label for="exampleInputEmail1">Unit</label></label>
                            <input type="text" class="form-control" value="{{$sp->unit}}" name="unit"
                                placeholder="Tên danh mục">
                            <label for="exampleInputEmail1">New</label>
                            <select name="new" class="form-control input-sm m-bot15">
                                <option value="1">New</option>
                                <option value="0">Old</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection