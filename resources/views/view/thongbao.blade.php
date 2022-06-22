@extends('view/home')
@section('thongbao')

	<head>
		{{-- <link rel="stylesheet" href="{{asset('admin/ckeditor/samples/css/samples.css')}}"> --}}
	</head>


@if(isset($data))
@foreach($data as $data)
	<h2 style="color: #00223D">{{$data->tieude}}</h2>
	<hr>
	<h6>{!!$data->noidung!!}</h6>
	
@endforeach
@endif 
</body>
</html>



@endsection