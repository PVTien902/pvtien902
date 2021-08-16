@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                 <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm kiếm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($search)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($search as $new_pd)
                             <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new_pd->promotion_price!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale" font-size:13px>Khuyến mãi</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{Route('chitietsanpham',$new_pd->id)}}"><img src="source/image/product/{{$new_pd-> image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new_pd->name}}</p>
                                        <p class="single-item-price">
                                            @if($new_pd->promotion_price==0)
                                            <span class="flash-sale">{{number_format($new_pd->unit_price)}}VNĐ</span>
                                            @else
                                            <span class="flash-del">{{number_format($new_pd->unit_price)}}VNĐ</span>
                                            <span class="flash-sale">{{number_format($new_pd->promotion_price)}}VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{Route('themgiohang',$new_pd->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        </div>
                            @endforeach
                    </div>
            </div> <!-- .beta-products-list -->

        </div>
    </div> <!-- end section with sidebar and main content -->
</div>
@endsection