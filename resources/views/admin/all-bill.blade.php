@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tất cả đơn hàng
        </div>
        @if(Session::has('thanhcong'))
			<div>{{Session::get('thanhcong')}}</div>
		 @endif
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
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
                        <th>Id người dùng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($all as $all)
                        <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$all->id_customer}}</td>
                        <td><span class="text-ellipsis">{{$all->date_order}}</span></td>
                        <td><span class="text-ellipsis"> {{$all->total}}</span></td>
                        <td><span class="text-ellipsis"> {{$all->payment}}</span></td>
                        <td><span class="text-ellipsis">{{$all->note}}</span></td>
                        <td>
                            <div>
                                <a href="{{url('sua-don-hang-',$all->id)}}"><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a href="{{url('tat-ca-don-hang',$all->id)}}"><i class="fa fa-times text-danger text"></i></a>
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
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection