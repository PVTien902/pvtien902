@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tất cả người dùng
        </div>
        @if(Session::has('thanhcong'))
			<div>{{Session::get('thanhcong')}}</div>
		 @endif
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
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
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Number phone</th>
                        <th>Address</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($all_user as $all)
                        <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$all->full_name}}</td>
                        <td><span class="text-ellipsis">{{$all->email}}</span></td>
                        <td><span class="text-ellipsis"> {{$all->password}}</span></td>
                        <td><span class="text-ellipsis"> {{$all->phone}}</span></td>
                        <td><span class="text-ellipsis">{{$all->address}}</span></td>
                        <td>
                            <div>
                                <a href="{{url('sua-nguoi-dung-',$all->id)}}"><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a href="{{url('tat-ca-nguoi-dung-',$all->id)}}"><i class="fa fa-times text-danger text"></i></a>
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
                        {{$all_user->links()}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection