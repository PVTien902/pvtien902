@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">

		<form action="xu-li-don-dat-hang" method="POST" class="beta-form-checkout">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" name="address" placeholder="Địa chỉ" required>
					</div>


					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" required>
					</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head">
							<h5>Đơn hàng của bạn</h5>
						</div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
									@foreach($product_cart as $product_c)
									<div class="media">
										<img width="25%" src="source/image/product/{{$product_c['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$product_c['item']['name']}}</p>
											<span class="color-gray your-order-info">Size: M</span>
											<span class="color-gray your-order-info">Qty: {{$product_c['qty']}}</span>
										</div>
									</div>
									@endforeach
									@endif
									<!-- end one item -->
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left">
									<p class="your-order-f18">Tổng tiền:</p>
								</div>
								<div class="pull-right">
									<h5 class="color-black">@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}} VNĐ@endif</h5>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head">
							<h5>Hình thức thanh toán</h5>
						</div>


						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng.
									</div>
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">

									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 0398429685
										<br>- Chủ TK: Pham Viet Tien
										<br>- Ngân hàng TP, Chi nhánh Đà Nẵng
									</div>
								</li>
								<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
								<script>
									$(function() {
										$('input[type="radio"]').click(function() {
											var retVal = confirm("Hãy lựa chọ giới tính phù hợp. Và Nếu thanh toán bằng ATM thì chuyển đúng tiền vào STK bên dưới nhân viên sẽ giao hàng khi nhận tiền.");
										});
									});
								</script>
							</ul>
						</div>

						<div class="text-center"><button id="btn" class="beta-btn primary" type="submit">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
							@if(Session::has('thanhcong'))
								<div>Đặt hàng thành công</div>
							@endif
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection