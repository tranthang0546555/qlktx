@extends('admin/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
  {{-- <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script> --}}

</script>
<style>
  body{
    background-color: #FFFFFF;
  }
</style>
</head>
<body>
  
<div id="content">
  <h3>Danh sách phòng khu {{$makhu ?? ""}}</h3>
  <a onclick="javascript:window.history.back(-1);return false;">
    <button class="btn btn-info">
        <i class="fa fa-reply"></i>
        Trở về
    </button>
</a>
  <a href="{{route('admin.phongoc.themphong',[$makhu])}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
    Thêm phòng mới
  </a>
  <table
    id="table"
    data-height="auto"
    data-toggle="table"
    data-search="true"
    data-pagination="true"
    data-search-on-enter-key="true"

    >
      <thead class="thead-dark">
        <tr>
          <th data-sortable="true">Mã phòng</th>
          <th data-sortable="true">Giá phòng</th>
          <th>Tác Vụ</th>
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
			<td>
				<a href="{{route('admin.phongoc.phong',[$makhu,$dt->maphong])}}">
					{{$dt->maphong}}
				</a>
			</td>
			<td>
				{{$dt->giaphong}}
			</td>
			<td>
				<a href="{{route('admin.phongoc.postxoaphong',[$makhu,$dt->maphong])}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
         Xóa
        </a>
				<a href="{{route('admin.phongoc.capnhatphong',[$makhu,$dt->maphong])}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
         Chỉnh sửa
        </a>
			</td>
        </tr>

        @endforeach
      </tbody>
    </table>
</div>



</body>
</html>
@endsection