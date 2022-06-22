@extends('view/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<style>
		.bt{
			border: 1px solid #999999;
		}
		.gender{
			margin-left: 10px;
		}
		.nen{
			background-color: red;
			color: #FFFFFF;
		}
	</style>
</head>
<body>

<section class="about-video-area section-gap">
	<div class="container">
		<form id="form" method="POST" action="{{route('view.dangki.postDangki')}}">
		{{ csrf_field() }}
		{{-- {!! Form::open() !!} --}}
		<div class="row">
			<div class="col-lg-7 col-md-7">
				<h3 class="mb-30">ĐIỀN ĐẦY ĐỦ THÔNG TIN</h3>

					<div class="input-group-icon mt-10">
						<div class="icon"><i class="fa fa-id-card" aria-hidden="true"></i></div>
						<input id="masv" type="text" name="masv" placeholder="Mã sinh viên" class="single-input bt">
					</div>
				
					<div class="input-group-icon mt-10">
						<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
						<input type="text" name="hoten" placeholder="Họ tên" class="single-input bt">
					</div>

					<div class="mt-15">
						Giới tính:
							<input class="gender" type="radio" name="gender" value="1" checked="checked"> Nam
							<input class="gender" type="radio" name="gender" value="0"> Nữ
					</div>

					<div class="mt-10">
						<p></p>Ngày sinh:
						<input name="ngaysinh" id="ngaysinh" width="276" />
					    <script>
					        $('#ngaysinh').datepicker({
					            uiLibrary: 'bootstrap4'
					        });
					    </script>
					</div>
					
					<div class="input-group-icon mt-20">
						<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<input type="text" name="sdt" placeholder="Số điện thoại" class="single-input bt">
					</div>

					<div class="input-group-icon mt-10">
						<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
						<input type="email" name="email" placeholder="Địa chỉ Email" class="single-input bt">
					</div>
					<div class="input-group-icon mt-10">
						<div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
						<input type="text" name="diachi" placeholder="Địa chỉ" class="single-input bt">
					</div>

					<div class="input-group-icon mt-10">
						<input type="submit" class="single-input bt nen"">
					</div>
					
					
					
				
			</div>


			<div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
				
				<div class="single-element-widget">
					<h3 class="mb-30">CHỌN PHÒNG</h3>
					<div class="input-group-icon mt-10 bt">
						<div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
						<div class="form-select" id="default-select">
	
							{!! Form::select('makhu',[null=>'--- Chọn Khu---']+$data,null,['id'=>'makhu'],['class'=>'bt']) !!}
			
							{{-- <select name="makhu" id="makhu">
								<option>---</option>
								@foreach($data as $data)
                    			<option value="{{ $data->value }}">{{ $data->tenkhu }}</option>
                				@endforeach
							</select> --}}
						</div>

					</div>
					
					<div class="mt-10" style="background-color: ">
					
						<div id="dsphong" class="">
							
						</div>
				
					</div>	
					<br>
					<div class="mt-10" style="background-color: ">
					
						<div id="dsgiuong" class="">
							
						</div>
				
					</div>
					<div class="mt-10" style="background-color: ">
					
						<h3 id="status" style="color: red">
						
						</h3>
				
					</div>
					
				</div>
		</div>
		</div>
	{{-- {!! Form::close() !!} --}}

	</form>
	</div>
</section>	

<script type="text/javascript">
	
$(document).ready(function(){

	// $("select[name='makhu']").change(function(){
	$("#makhu").change(function(){

		var makhu = $("select[name='makhu']").val();
		var url = window.location.href + '/khu';
		var token = $("input[name='_token']").val();

		$.ajax({
			url: url,
			method: 'POST',
			data: {
				makhu:makhu,
				_token:token,
			},
			success: function(data){	
				// alert('')
				$("#dsgiuong").empty();
				$("#dsphong").empty();
				$("#dsphong").append(data.options);

			},
		});
	});
	
});

function chonPhong(maphong){

			var maphong = maphong;
			var url = window.location.href + '/phong';
			var token = $("input[name='_token']").val();

			$.ajax({
		        url: url,
		        method: 'POST',
		        data: {
		        	maphong:maphong,
		        	_token:token,
		        },
				success: function(data){	
					// alert(data.options);
					$("#dsgiuong").empty();
					$("#dsgiuong").append(data.options);

			    },
      		});

		
	};


  $msg = '{{Session::get('status')}}';
  var exist = '{{Session::has('status')}}';
  if(exist){
    // alert('Đã gửi đi !');  
    document.getElementById('status').style.display = 'block';
    document.getElementById('status').innerHTML = $msg;
  }

</script>
</body>
</html>
@endsection