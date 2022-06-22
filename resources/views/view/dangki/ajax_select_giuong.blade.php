

						
					
@if(!empty($giuong))
<div class="button-group-area">
	Danh sách giường trống <br><br>

@foreach($giuong as $key => $value)
	{{-- <a id="{{$key}}" onclick="chonphong(id)" class="genric-btn primary col-lg-5">{{$key}}</a> --}}
	<div style="float: left; width: 49%">
		<input class="giuong ml-3" type="radio" name="giuong" value="{{$value}}" checked="checked"> Giường số {{$value}}
	</div>
@endforeach
</div>
@endif
<?php	if (count($giuong) == 0 ) {
	echo "Phòng không còn giường trống nào";
}
 ?>
