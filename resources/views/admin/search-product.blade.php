@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
           Sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-4">
                Tìm thấy {{count($search)}} sản phẩm
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name item</th>
                        <th>Description</th>
                        <th>unit_price</th>
                        <th>promotion_price</th>
                        <th>Src image</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($search as $all)
                        <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$all->id}}</td>
                        <td><img src="source/image/product/{{$all->image}}" alt=""height="100px" width="100px"></td>
                        <td>{{$all->name}}</td>
                        <td><span class="text-ellipsis">{{$all->description}}</span></td>
                        <td><span class="text-ellipsis"> {{number_format($all->unit_price)}}</span></td>
                        <td><span class="text-ellipsis"> {{number_format($all->promotion_price)}}</span></td>
                        <td><span class="text-ellipsis">{{$all->image}}</span></td>
                        <td>
                            <div>
                                <a href="{{url('sua-san-pham-',$all->id)}}"><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a href="{{url('tat-ca-san-pham-',$all->id)}}"><i class="fa fa-times text-danger text"></i></a>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection