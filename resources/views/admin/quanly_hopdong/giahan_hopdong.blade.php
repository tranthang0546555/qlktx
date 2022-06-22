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

<a href="{{route('admin.hopdong.them')}}"  class="btn btn-warning pull-right m-l-20 waves-effect waves-light">
    Thêm hợp đồng mới
  </a>
  <h3>Gia hạn hợp đồng</h3>
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
          <th data-sortable="true">Trạng thái</th>
          <th data-sortable="true">Ngày nhận</th>
          <th>Tác vụ</th>
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
			<td>
				{{$dt->id}}
			</td>
			<td>
                {{$dt->trangthai}}
            </td>
            <td>
                {{$dt->created_at}}
            </td>

            {{-- <td>
                @php
                    $today = date('Y-m-d');
                    $ngaylap = $dt->ngaylap;
                    $thoihan = strtotime(date("Y-m-d", strtotime($ngaylap)) . " +6 month");
                    $thoihan = strftime("%Y-%m-%d", $thoihan);
                    if($thoihan > $today){ 
                        echo "<b style='color: blue'>Còn thời hạn</b>";
                    }else  echo "<b style='color: red'>Hết thời hạn</b>";
                    
                @endphp
            </td> --}}
            <td>
                <a href="{{route('admin.hopdong.huygiahanhopdong',$dt->id)}}" target="_blank" class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
                    Hủy xác nhận
                </a>
                <a href="{{route('admin.hopdong.dongygiahanhopdong',$dt->id)}}" target="_blank" class="btn btn-success pull-right m-l-20 waves-effect waves-light">
                    Xác nhận
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