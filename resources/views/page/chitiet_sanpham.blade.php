@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{Route('trangchu')}}">Trang chủ</a> / <span>Chỉ tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                    <img src="source/image/product/{{$sanpham->image}}" alt=""height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$sanpham->name}}</p>
                            <p class="single-item-price">
                            @if($sanpham->promotion_price==0)
                                <span class="flash-sale">{{number_format($sanpham->unit_price)}}VNĐ</span>
                            @else
                                <span class="flash-del">{{number_format($sanpham->promotion_price)}}VNĐ</span>
                                <span class="flash-sale">{{number_format($sanpham->unit_price)}}VNĐ</span>                                        @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>Kích thước:</p>
                            <p>{{$sanpham->size}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-options">
                            
                            <a class="add-to-cart" href="{{Route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$description->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                <div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
                            @foreach($sanpham_tt as $sptt)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{Route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="250px></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$sptt->name}}</p>
                                            <p class="single-item-price">
                                                @if($sanpham->promotion_price==0)
                                                    <span class="flash-sale">{{number_format($sptt->unit_price)}}VNĐ</span>
                                                @else
                                                    <span class="flash-del">{{number_format($sptt->unit_price)}}</span>
                                                    <span class="flash-sale">{{number_format($sptt->unit_price)}}VNĐ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{Route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{Route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
						</div>
                        <div class="row">{{$sanpham_tt->links()}}</div>    
					</div>
                    
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title" >Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">

                            @foreach($sanpham_banchay as $sp_banchay)
                            
                            <a href="{{Route('chitietsanpham',$sp_banchay->id)}}">
                                <div class="media beta-sales-item">
                                    <p class="pull-left" >
                                        <img src="source/image/product/{{$sp_banchay->image}}" alt="" height="60px"></p>
                                        <div class="media-body">
                                        {{$sp_banchay->name}}
                                        <p>
                                            @if($sp_banchay->promotion_price==0)
                                                <span class="flash-sale">{{number_format($sp_banchay->unit_price)}}VNĐ</span>
                                                @else
                                                <span class="flash-sale">{{number_format($sp_banchay->promotion_price)}}VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($sanpham_moi as $spm)
                            <a class="pull-left" href="{{Route('chitietsanpham',$spm->id)}}">
                                <div class="media beta-sales-item">
                                    <p class="pull-left" >
                                    <img src="source/image/product/{{$spm->image}}" alt="">
                                    <div class="media-body">
                                        {{$spm->name}}
                                            @if($spm->promotion_price==0)
                                                <span class="flash-sale">{{number_format($spm->unit_price)}}VNĐ</span>
                                                @else
                                                <span class="flash-sale">{{number_format($spm->promotion_price)}}VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection