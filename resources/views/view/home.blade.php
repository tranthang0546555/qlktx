@extends('view/index')
@section('Noidung')

	<section class="post-content-area">
		<div class="container ">
			<br>
			<br>
			<div class="row ">
				
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						@include('view.sidebar')
					</div>

				</div>
				<div class="col-lg-8">
					<div class="widget-wrap" style="padding: 15px 15px 15px 15px;">
						@yield('thongbao')
					</div>
				</div>
			</div>
		</div>	
	</section>
<br>
<br>
@endsection