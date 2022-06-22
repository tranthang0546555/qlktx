@extends('user/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@php
    $ql = Auth::guard('SinhVien')->user();
    $src = 'images/anhthe/'.$ql['anhthe'];
    // echo $src;
@endphp
</head>
<body>
    {{-- <a onclick="javascript:window.history.back(-1);return false;">
        <button class="btn btn-info">
            <i class="fa fa-reply"></i>
            Trở về
        </button>
    </a> --}}
	<div class="white-box" >
        <div class="form-horizontal form-material">
            @foreach ($data as $dt)

            <div class="form-group col-md-12">
                <label class="col-md-12">Mã sinh viên</label>
                <div class="col-md-12">
                    <input name="masv" disabled type="text" class="form-control form-control-line" value="{{$dt->masv ?? ''}}">
                </div>
            </div>
        <div class="form-group col-md-8">
            <div class="form-group col-md-6">
                <label class="col-md-12">Họ và tên</label>
                <div class="col-md-12">
                    <input name="hoten" disabled type="text" class="form-control form-control-line" value="{{$dt->hoten ?? ''}}">
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <label class="col-md-12">Ngày sinh</label>
                <div class="col-md-12">
                    <input name="ngaysinh" type="text" id="ngaysinh" disabled class="form-control form-control-line" value="{{$dt->ngaysinh}}" />
                    {{-- <script>
                        $('#ngaysinh').datepicker({
                            uiLibrary: 'bootstrap4'
                        });
                    </script> --}}
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-md-12">Giới tính</label>
                <div class="col-md-12">
                    @php
                        if($dt->gioitinh == 1) $gioitinh = 'Nam';
                        else $gioitinh = 'Nữ';
                    @endphp
                    
                    <input type="radio" name="gioitinh" checked value="{{$dt->gioitinh}}"> {{$gioitinh}}
                    {{-- <input type="radio" name="gioitinh" checked value=""> --}}
                   
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-md-12">Số điện thoại</label>
                <div class="col-md-12">
                    <input name="sdt" disabled type="text" class="form-control form-control-line" value="{{$dt->sdt ?? ''}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-md-12">Địa chỉ</label>
                <div class="col-md-12">
                    <input name="diachi" disabled type="text" class="form-control form-control-line" value="{{$dt->diachi ?? ''}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-md-12">Email</label>
                <div class="col-md-12">
                    <input name="email" disabled type="text" class="form-control form-control-line" value="{{$dt->email ?? ''}}">
                </div>
            </div>
        
            <div class="form-group col-md-6">
                <label class="col-md-12">CMND</label>
                <div class="col-md-12">
                    <input name="cmnd" disabled type="text" class="form-control form-control-line" value="{{$dt->cmnd ?? ''}}">
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="col-md-12">Trường học</label>
                <div class="col-md-12">
                    <input name="truonghoc" disabled type="text" class="form-control form-control-line" value="{{$dt->truonghoc ?? ''}}">
                </div>
            </div>
        </div>
            <div class="form-group col-md-4 h-50">
                <label class="col-md-12">Ảnh thẻ</label>
                <div class="col-md-12">
                    <div style="height: 200px; width: 200px">
                    <img src="{{asset($src ?? '')}}" alt="user-img" style="width:200px;height:200px" class="img-circle">
                    {{-- <img src="{{ asset($src ?? '' ?? '' ?? '') }}" alt="Ảnh thẻ"> --}}
                    </div>
                    {{-- <input name="anhthe" disabled type="file" class="form-control form-control-line" value="{{$dt->cmnd ?? ''}}"> --}}
                </div>
            </div>
            @endforeach
           
            <div class="form-group col-md-4">
                <a href="{{route('user.chinhsua')}}" class="col-sm-12 btn btn-success">
                        Chỉnh sửa
                        <i class="fa fa-check"></i>
                </a>
            </div>
           
        </div>
    </div>
</body>
</html>
@endsection