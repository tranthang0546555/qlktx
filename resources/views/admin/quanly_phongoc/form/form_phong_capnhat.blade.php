@extends('admin/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
  {{-- <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script> --}}

</script>
</head>
<body>
    <a onclick="javascript:window.history.back(-1);return false;">
        <button class="btn btn-info">
            <i class="fa fa-reply"></i>
            Trở về
        </button>
    </a>
	<div class="white-box">
        <form class="form-horizontal form-material" action="{{route('admin.phongoc.postcapnhatphong')}}" method="post">
            {{ csrf_field()}}
        <input type="hidden" name="makhu" value="{{$makhu ?? ""}}">
        <input type="hidden" name="maphong" value="{{$maphong ?? ""}}">
        
        <div class="form-group">
            <label class="col-md-12">Mã khu</label>
            <div class="col-md-12">
            <input type="text" disabled value="{{$makhu ?? ""}}"
                    class="form-control form-control-line"></div>
        </div>
            <div class="form-group">
                <label class="col-md-12">Mã phòng</label>
                <div class="col-md-12">
                <input type="text" disabled value="{{$maphong ?? ""}}"
                        class="form-control form-control-line"></div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Giá phòng</label>
                <div class="col-md-12">
                    <input name="giaphong" type="text" value="{{$giaphong ?? ""}}"
                        class="form-control form-control-line"> </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">
                        Cập nhật
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </div>
            <label class="col-md-12">
                {!! session()->get('giaphong') !!}
            </label>
        </form>
    </div>

<script type="text/javascript">
	
   $smg = '{{Session::get('status')}}';
  var exist = '{{Session::has('status')}}';
  if(exist){  
    document.getElementById('status').style.display = 'block';
    document.getElementById('status').innerHTML = $smg;
  }

</script>
</body>
</html>
@endsection