

						
					
@if(!empty($phong))
<div class="button-group-area">
@foreach($phong as $key => $value)
	{{-- <a id="{{$key}}" onclick="chonphong(id)" class="genric-btn primary col-lg-5">{{$key}}</a> --}}
	<div style="float: left; width: 33%">
	<input id="{{$value}}" class="phong ml-4" type="radio" name="phong" value="{{$value}}" checked="checked" onclick="chonPhong(id)"> {{$value}}
	</div>

@endforeach
</div>
<br>
<br>
@endif
