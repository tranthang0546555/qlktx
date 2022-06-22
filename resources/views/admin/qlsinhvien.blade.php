@extends('admin/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="{{asset('admin/css/thongbao.css')}}">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">


</head>
<body>

<div id="content">
  <h3>Danh sách sinh viên kí túc</h3>
  <table
    id="table"
    data-height="450"
    data-toggle="table"
    data-search="true"
    data-pagination="true"
    data-search-on-enter-key="true"

    >
      <thead class="thead-dark">
        <tr>
          <th data-sortable="true">MaSV</th>
          <th data-sortable="true">Họ Tên</th>
          <th data-sortable="true">Ngày Sinh</th>
          <th>Tác Vụ</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $dt)
        <tr>
          <td>{{$dt->masv}}</td>
          <td>{{$dt->hoten}}</td>
          <td>{{$dt->ngaysinh}}</td>
          <td><button class="btn btn-success fa fa-edit">Chỉnh Sửa</button></td>
        </tr>

        @endforeach
      </tbody>
    </table>
</div>

</body>
</html>
@endsection