@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$title->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{Route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                    @foreach($loai as $l)
                        <li><a href="{{Route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($loai_sp)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($loai_sp as $lsp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($lsp->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Khuyến mãi</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{Route('chitietsanpham',$lsp->id)}}">
                                        <img src="source/image/product/{{$lsp->image}}"alt=""height="250px" >
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$lsp->name}}</p>
                                        <p class="single-item-price">
                                        @if($lsp->promotion_price==0)
                                        <span class="flash-sale">{{number_format($lsp->unit_price)}}VNĐ</span>
                                        @else
                                        <span class="flash-del">{{$lsp->unit_price}}</span>
                                        <span class="flash-sale">{{number_format($lsp->unit_price)}}VNĐ</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{Route('themgiohang',$lsp->id)}}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{Route('chitietsanpham',$lsp->id)}}">Chi tiết <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sp_khac as $spk)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($spk->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{Route('chitietsanpham',$spk->id)}}">
                                        <img src="source/image/product/{{$spk->image}}"alt=""height="250px" >
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spk->name}}</p>
                                        <p class="single-item-price">
                                        @if($spk->promotion_price==0)
                                        <span class="flash-sale">{{number_format($spk->unit_price)}}VNĐ</span>
                                        @else
                                        <span class="flash-del">{{$spk->unit_price}}</span>
                                        <span class="flash-sale">{{number_format($spk->unit_price)}}VNĐ</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{Route('chitietsanpham',$spk->id)}}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{Route('chitietsanpham',$spk->id)}}">Chi tiết <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection