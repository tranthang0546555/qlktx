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
        <form class="form-horizontal form-material" action="{{route('admin.phongoc.postthemgiuong')}}" method="post">
        	{{ csrf_field()}}
                
            <input name="makhu" type="hidden" value='{{$makhu ?? ""}}'>
            <input name="maphong" type="hidden" value='{{$maphong ?? ""}}'>

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
                <label class="col-md-12">Số giường</label>
                <div class="col-md-12">
                    <input name="sogiuong" type="text" placeholder="1"
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
            {{Session::get('sogiuong')}}
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