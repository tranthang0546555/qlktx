@extends('view/home')
@section('thongbao')
<head>
	<style>
		.tieude_thongbao{
			white-space: nowrap; 
			width: auto; 
			overflow: hidden;
			text-overflow: ellipsis; 
		}
	</style>
</head>
<h3 style="color: #E09722; text-align: center;"><u>Thông báo chung</u></h3>

<br>
<div class="single-menu-list row justify-content-between align-items-center">
	<div class="col-lg-7">
		<h4 style="color: #00223D">Tiêu đề</h4>
	</div>	
	<div class="col-lg-5 flex-row d-flex price-size">
		<div class="s-price col">
			<h4 style="color: #00223D">Ngày đăng</h4>
		</div>
		<div class="s-price col">
			<span style="color: #00223D">Cập nhật</span>
		</div>
																			
	</div>
</div>
<hr style="border: 1px solid #888888">

@foreach ($data as $da)
<div class="single-menu-list row justify-content-between align-items-center">
	<div class="col-lg-7">
		<a href="{{route('view.thongbao',[$da->id])}}">
			<h6 class="tieude_thongbao">
				{{$da->tieude ?? ""}}
			</h6>
		</a>

	</div>
	<div class="col-lg-5 flex-row d-flex price-size">
		<div class="s-price col">
			<i>
				{{$da->created_at ?? ""}}
			</i>
			
		</div>
		<div class="s-price col">
			<i>
		
				{{$da->updated_at ?? ""}}
	
			</i>
		</div>
																			
	</div>
</div>	
<br>
@endforeach
<div style="float: button">
	{{ $data->links() ?? "" }}
</div>

@endsection