@extends('admin/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
  <link rel="stylesheet" href="{{asset('admin/css/thongbao.css')}}">
</head>
<body>

<div id="content">
    <h3>Tin nhắn</h3>
    <a onclick="javascript:window.history.back(-1);return false;">
        <button class="btn btn-info">
            <i class="fa fa-reply"></i>
            Trở về
        </button>
    </a>
	<div class="white-box">
        <form class="form-horizontal form-material" action="{{route('admin.tinnhan.traloi')}}" method="post">
            {{ csrf_field()}}
            @foreach($data as $dt)
            <div class="form-group">
                <div class="col-md-12">
                <label class="col-md-12">Tên người gửi:</label>
                    <input name="ten" type="text" value="{{$dt->ten}}" class="form-control form-control-line">
                </div>
            </div>   
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-12">Địa chỉ Email:</label> 
                    <input name="mail" type="text" value="{{$dt->mail}}" class="form-control form-control-line"> 
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <br>
                    <label class="col-md-12">Tiêu đề:</label>
                    <input name="tieude" type="text" value="{{$dt->tieude}}" class="form-control form-control-line">
                </div>
            </div>
                {{-- <input name="noidung1" type="text" value="{{
                    'Nội dung tin nhắn: '.$dt->noidung
                }}" class="form-control form-control-line">   --}}
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-12">Nội dung tin nhắn:</label>
                    <textarea name="noidung1" type="text"  class="form-control form-control-line" style="height: 120px">
                    {{$dt->noidung}} 
                </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Trả lời:</label>
                <br>
                <div class="col-md-12">
                    <textarea name="noidung2" type="text"  class="form-control form-control-line" style="height: 120px"> 
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">
                        Gửi tin nhắn
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </div>
            @endforeach
            <label class="col-md-12">
                {!! session()->get('tinnhan') !!}
            </label>

        </form>
    </div>
</div>

</body>
</html>
@endsection