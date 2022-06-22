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

  <a href="{{route('admin.hopdong.chamdut')}}" class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
    Chấm dứt hợp đồng
  </a>
  <a href="{{route('admin.hopdong.giahan')}}" class="btn btn-success pull-right m-l-20 waves-effect waves-light">
    Gia hạn hợp đồng
  </a>

 
  {{-- target="_blank" ----> mở page mới --}}

<a href="{{route('view.tacvu.dangki')}}"  class="btn btn-warning pull-right m-l-20 waves-effect waves-light">
    Thêm hợp đồng mới
  </a>
  <h3>Danh sách hợp đồng</h3>
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
          <th data-sortable="true">MaSV</th>
          <th data-sortable="true">Mã phòng</th>
          <th data-sortable="true">Số giường</th>
          <th data-sortable="true">Ngày lập</th>
          <th data-sortable="true">Thời hạn</th>
          <th data-sortable="true">Trạng thái</th>
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
			<td>
				{{$dt->id}}
			</td>
			<td>
                {{$dt->masv}}
            </td>
            <td>
                {{$dt->maphong}}
            </td>
            <td>
                {{$dt->sogiuong}}
            </td>
            <td>
                {{$dt->ngaylap}}
            </td>
            <td>
                6 tháng
            </td>
            <td>
                @php
                    $today = date('Y-m-d');
                    $ngaylap = $dt->ngaylap;
                    $thoihan = strtotime(date("Y-m-d", strtotime($ngaylap)) . " +6 month");
                    $thoihan = strftime("%Y-%m-%d", $thoihan);
                    if($thoihan > $today){ 
                        echo "<b style='color: blue'>Còn thời hạn</b>";
                    }else  echo "<b style='color: red'>Hết thời hạn</b>";
                    
                @endphp
            </td>
            {{-- <td>
                <a href="" target="_blank" class="btn btn-success pull-right m-l-20 waves-effect waves-light">
                    Xem
                </a>
            </td> --}}
        </tr>

        @endforeach
      </tbody>
    </table>
</div>



</body>
</html>
@endsection