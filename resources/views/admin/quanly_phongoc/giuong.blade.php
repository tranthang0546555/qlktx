@extends('admin/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
  {{-- <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script> --}}
</script>

</head>
<body>
  
<div id="content">
  <h3>Danh sách giường phòng {{$maphong}}</h3>
  <a onclick="javascript:window.history.back(-1);return false;">
    <button class="btn btn-info">
        <i class="fa fa-reply"></i>
        Trở về
    </button>
</a>
  <a href="{{route('admin.phongoc.themgiuong',[$makhu,$maphong])}}"{{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
    Thêm giường
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
          <th data-sortable="true">Giường số</th>
          <th data-sortable="true">Tình trạng</th>
          <th>Tác Vụ</th>
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
          <td>
            {{$dt->sogiuong ?? ""}}
          </td>
          <td>
            {{$dt->tinhtrang ?? ""}}
          </td>
          <td>
            <a onclick="xoagiuong('{{$dt->maphong}}','{{$dt->sogiuong}}')"  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
              Xóa
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
<script>
  function xoagiuong($maphong, $sogiuong){
    
    $result = confirm("Bạn chắc chắn muốn xóa giường số: "+$sogiuong+" \nKhi xóa sẽ không thể phục hồi!");
    if($result==1){
      var url = window.location.href + '/' + $sogiuong + '/xoa-giuong';
      window.location = url;
    }
  }
</script>
</body>
</html>
@endsection