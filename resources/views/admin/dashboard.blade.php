@extends('admin_layout')
@section('admin_content')

<section id="main-content-1">
	<section class="wrapper-1">
		<!-- //market-->
		<div class="market-updates">
			<a href="{{url('tat-ca-san-pham')}}">
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-2">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-eye"> </i>
						</div>
						<div class="col-md-8 market-update-left">
							<h4>Sản phẩm</h4>
							<h3>{{count($pr)}}</h3>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> 
			</a>
			<a href="{{url('tat-ca-don-hang')}}">
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-1">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-users"></i>
						</div>
						<div class="col-md-8 market-update-left">
							<h4>Người dùng</h4>
							<h3>{{count($us)}}</h3>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</a>
			<a href="{{url('tat-ca-nguoi-dung')}}">
				<div class="col-md-3 market-update-gd">
					<div class="market-update-block clr-block-4">
						<div class="col-md-4 market-update-right">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</div>
						<div class="col-md-8 market-update-left">
							<h4>Đơn hàng</h4>
							<h3>{{count($b)}}</h3>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</a>
			
			<div class="clearfix"> </div>
		</div>
		<!-- //market-->
		<div class="agile-last-grids">
			<div class="col-md-14 agile-last-left">
				<div class="agile-last-grid">
					<div class="area-grids-heading">
						<h3></h3>
					</div>
					<script>
						$(document).ready(function() {
							showGraph();
						});

						function showGraph() {

							$.post("data.php",
								function(data) {
									console.log(data);
									var formStatusVar = [];
									var total = [];

									for (var i in data) {
										formStatusVar.push(data[i].status);
										total.push(data[i].size_status);
									}

									var options = {
										legend: {
											display: false
										},
										scales: {
											xAxes: [{
												display: true
											}],
											yAxes: [{
												ticks: {
													beginAtZero: true
												}
											}]
										}
									};

									var myChart = {
										labels: formStatusVar,
										datasets: [{
											label: 'Tổng số',
											backgroundColor: '#17cbd1',
											borderColor: '#46d5f1',
											hoverBackgroundColor: '#0ec2b6',
											hoverBorderColor: '#42f5ef',
											data: total
										}]
									};

									var bar = $("#graph");
									var barGraph = new Chart(bar, {
										type: 'bar',
										data: myChart,
										options: options
									});
								});
						}
					</script>
					<!-- <div id="chart-container">
						<canvas id="graph"></canvas>
					</div> -->


				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</section>
</section>
@endsection