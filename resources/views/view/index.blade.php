<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>KTX CĐCN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!------ Include the above in your HEAD tag ---------->
	<base href="{{asset('')}}">
	<link rel="icon" href="{{asset('view/img/logo - Copy.png')}}" type="image/x-icon" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>	
	@extends('index')
	@section('Page')
		@include('view/header')
		<div class="">
			@yield('Noidung')
		</div>
		@include('view/footer')
	@endsection
</body>
</html>