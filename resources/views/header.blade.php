<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{Route('gioithieu')}}"><i class="fa fa-home"></i> Quận Ngũ Hành Sơn, TP Đà Nẵng</a></li>
                    <li><a href="{{Route('lienhe')}}"><i class="fa fa-phone"></i> 0398429685</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Session::has('name'))
                    <li><a href="#"><i class="fa fa-user"></i>{{Session::get('name')}}</a></li>
                    <li><a href="{{ url('dang-xuat')}}">Đăng xuất</a></li>
                    @else
                    <li><a href="{{Route('signup')}}">Đăng kí</a></li>
                    <li><a href="{{url('dang-nhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px"
                        alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{url('tim-kiem')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@endif) <i
                                class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                             
                             @foreach($product_cart as $product_c)
                            <div class="cart-item">
                                    <a class="cart-item-edit" href="{{Route('xoagiohang',$product_c['item']['id'])}}"><i class="fa fa-pencil"></i></a>
									<a class="cart-item-delete" href="{{Route('xoagiohangall',$product_c['item']['id'])}}"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                    <img src="source/image/product/{{$product_c['item']['image']}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product_c['item']['name']}}</span>
                                        <span class="cart-item-amount">Đơn giá: {{number_format($product_c['item']['unit_price'])}}VNĐ</span>
                                        <span>Số lượng {{$product_c['qty']}}  </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: 
                                <!-- error loading -->
                                <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}VNĐ</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    @if(Session::has('name'))
                                    <a href="{{url('dat-hang')}}" class="beta-btn primary text-center">Đặt hàng <i
                                            class="fa fa-chevron-right"></i></a>
                                    @else
                                    <a href="{{url('dang-nhap')}}" class="beta-btn primary text-center">Đặt hàng <i
                                            class="fa fa-chevron-right"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{Route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sanpham as $loai_sp)
                            <li><a href="{{Route('loaisanpham',$loai_sp->id)}}">{{$loai_sp->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{Route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{Route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->