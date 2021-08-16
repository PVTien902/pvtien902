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
                    <form role="form" action="{{Route('postadd_p')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                        @if(Session::has('thanhcong'))
						<div>{{Session::get('thanhcong')}}</div>
					    @endif
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Tên danh mục">
                            <label for="exampleInputEmail1">Id_type</label>
                            <select name="type" class="form-control input-sm m-bot15">
                                <option value="1">Bánh mặn</option>
                                <option value="2">Bánh ngọt</option>
                                <option value="3">Bánh trái cây</option>
                                <option value="4">Bánh kem</option>
                                <option value="5">Bánh crepe</option>
                                <option value="6">Bánh pizza</option>
                                <option value="6">Bánh su kem</option>
                            </select>
                            <label for="exampleInputEmail1">Description</label>
                            <textarea type="text" style="resize:none;" rows="8" class="form-control" name="description"
                                placeholder="Mô tả sản phẩm"></textarea>
                            
                                
                                <label for="exampleInputEmail1">Unit_price</label>
                            <input type="number" class="form-control" name="unit_price"
                                placeholder="Tên danh mục">
                            <label for="exampleInputEmail1">Promotion_price</label>
                            <input type="number"  class="form-control" name="promotion_price"
                                placeholder="Mô tả sản phẩm"></input>
                            <label for="exampleInputEmail1">Src image</label>
                            <input type="text" class="form-control" name="image" 
                                placeholder="Đường dẫn ảnh sản phẩm">

                                <label for="exampleInputEmail1">Unit</label></label>
                            <input type="text" class="form-control" name="unit"
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