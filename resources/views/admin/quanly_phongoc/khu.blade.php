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
  <h3>Danh sách khu nhà KTX</h3>

  <a href="{{route('admin.phongoc.themkhu')}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
    Thêm khu nhà mới
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
          <th data-sortable="true">Khu</th>
          <th style="min-width:50px">Tác Vụ</th>
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
			<td>
				<a href="{{route('admin.phongoc.khu',[$dt->makhu])}}">
					{{$dt->tenkhu}}
				</a>
			</td>
			<td>

        <a onclick="xoakhu('{{$dt->makhu}}')" class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
         Xóa
        </a>

				<a href="{{route('admin.phongoc.capnhatkhu',[$dt->makhu])}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
         Chỉnh sửa
        </a>
				
			</td>
        </tr>

        @endforeach
      </tbody>
    </table>
</div>
<script>
  function xoakhu($makhu){
    $result = confirm("Bạn chắc chắn muốn xóa khu: "+$makhu+" \nKhi xóa sẽ mất hết dữ liệu phòng, giường!");
    if($result==1){
      var url = window.location.href +'/' + $makhu + '/xoa-khu';
      window.location = url;
    }
  }
</script>
</body>
</html>
@endsection