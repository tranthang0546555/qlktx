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
        <form class="form-horizontal form-material" action="{{route('admin.phongoc.postthemphong')}}" method="post">
        	{{ csrf_field()}}
                
            <input name="makhu" type="hidden" value='{{$makhu ?? ""}}'>
            <div class="form-group">
                <label class="col-md-12">Mã khu</label>
                <div class="col-md-12">
                <input type="text" disabled value="{{$makhu ?? ""}}"
                        class="form-control form-control-line"></div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Mã phòng</label>
                <div class="col-md-12">
                    <input name="maphong" type="text" placeholder="A408"
                        class="form-control form-control-line"></div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Giá phòng</label>
                <div class="col-md-12">
                    <input name="giaphong" type="text" placeholder="100 000"
                        class="form-control form-control-line"> </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">
                        Thêm
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </div>
            <label class="col-md-12">
            @if ($errors->has('maphong') || $errors->has('giaphong'))
                {{ $errors->first('maphong') }} <br>
                {{ $errors->first('giaphong') }}
            @endif
            {!! session()->get('maphong') !!}
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