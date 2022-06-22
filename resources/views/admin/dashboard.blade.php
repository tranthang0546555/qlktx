@extends('admin/index')
@section('Noidung')
<div id="content">


    <a href="{{url('ad/thong-bao')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Thông báo</a>


    <a href="{{url('ad/ql-sinh-vien')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Quản lý sinh viên</a>


    <a href="{{route('admin.phongoc')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Quản lý phòng</a>


    <a href="{{route('admin.dangki')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-th-large fa-fw" aria-hidden="true"></i>Đăng ký nội trú</a>


    <a href="{{route('admin.hopdong')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-building-o fa-fw" aria-hidden="true"></i>Quản lý hợp đồng</a>


    <a href="{{route('admin.diennuoc')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-fire fa-fw" aria-hidden="true"></i>Quản lý điện nước</a>


    <a href="{{route('admin.tinnhan')}}" class="btn-lg btn-success  waves-effect"><i class="fa fa-wechat fa-fw" aria-hidden="true"></i>Tin nhắn</a>


@endsection