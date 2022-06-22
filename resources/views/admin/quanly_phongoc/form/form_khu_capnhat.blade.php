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
        <form class="form-horizontal form-material" action="{{route('admin.phongoc.postcapnhatkhu')}}" method="post">
            {{ csrf_field()}}
        <input type="hidden" name="makhu" value="{{$makhu ?? ""}}">
            <div class="form-group">
                <label class="col-md-12">Mã khu</label>
                <div class="col-md-12">
                    <input type="text" disabled
                        class="form-control form-control-line" value="{{$makhu ?? ''}}"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Tên khu</label>
                <div class="col-md-12">
                    <input name="tenkhu" type="text" placeholder="Khu A"
                        class="form-control form-control-line" value="{{$tenkhu ?? ''}}"> </div>
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
                @if ($errors->has('tenkhu'))
                    {{ $errors->first('tenkhu') }}
                @endif
                {!! session()->get('makhu') !!}
            </label>
        </form>
    </div>

<script type="text/javascript">


</script>
</body>
</html>
@endsection