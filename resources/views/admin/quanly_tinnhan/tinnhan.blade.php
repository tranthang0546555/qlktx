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
    <h3>Danh sách tin nhắn </h3>

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
          <th data-sortable="true">ID</th>
          <th>Tên</th>
          <th>Email</th>
          <th>Tiêu đề</th>
          <th data-sortable="true" >Ngày nhận</th>
          <th>Xem</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
          <?php 
    				foreach($data as $data){
    			?> 
        <tr class="">
          <td>{{$data->id}}</td>
          <td>{{$data->ten}}</td>
          <td>{{$data->mail}}</td>
          <td>{{$data->tieude}}</td>
          <td>{{$data->created_at}}</td>
            
          <td>
              <button class="btn-sm btn-success" onclick="javascript:window.location=window.location.href+'/'+{{$data->id}}">Y</button>   
          </td>
          <td>
            <form action="" method="post">
              {{ csrf_field()}}
              <button class="btn-sm btn-danger" name="id" type="submit" value="">X</button>
            </form>
          </td>       
        </tr>
            <?php 
    				}
    			   ?>
              </tbody>
      </table>
</div>

</body>
</html>
@endsection