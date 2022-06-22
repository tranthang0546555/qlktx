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
  <h3>Danh sách đăng kí nội trú</h3>
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
              <th data-sortable="true">MASV</th>
              <th data-sortable="true">Mã phòng</th>
              
              <th>Số giường</th>
              <th data-sortable="true">Ngày lập</th>
              <th data-sortable="true">Tình trạng</th>
              <th data-sortable="true">Xác nhận</th>
              <th data-sortable="true">Hủy</th>
            </tr>
          </thead>
          <tbody>
          	<?php 
				foreach($data as $data){
			?> 
            <tr class="">
              <td>{{$data->masv}}</td>
              <td>{{$data->maphong}}</td>
            
              <td>{{$data->sogiuong}}</td>
              <td>{{$data->ngaylap}}</td>
              <td>{{$data->trangthai}}</td>

              <td>
                <form action="{{ route('admin.dangki.dongy') }}" method="post">
                 {{ csrf_field()}}
                 <input type="hidden" name="masv" value="{{$data->masv}}">
                 <input type="hidden" name="id" value="{{$data->id}}">
                 <button class="btn btn-info" type="submit">Y</button>
                </form>
              </td>

              <td>
                <form action="{{ route('admin.dangki.huy') }}" method="post">
                 {{ csrf_field()}}
                 <input type="hidden" name="masv" value="{{$data->masv}}">
                 <input type="hidden" name="id" value="{{$data->id}}">
                 <button class="btn btn-danger"type="submit">X</button>
                </form>
              </td>
              
              
            </tr>
        <?php 
				}
			   ?>
        </tbody>
    </table>

  </div>
<script>
  $msg = '{{Session::get('status')}}';
  var exist = '{{Session::has('status')}}';
  if(exist){
    // alert('Đã gửi đi !');  
    document.getElementById('status').style.display = 'block';
    document.getElementById('status').innerHTML = $msg;
  }
</script>
</body>
</html>
@endsection