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

  <h3>Danh sách chỉ số điện nước</h3>
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
          <th data-sortable="true">Mã Phòng</th>
          <th data-sortable="true">Chỉ số điện</th>
          <th data-sortable="true">Chỉ số nước</th>
          {{-- <th>Tác vụ</th> --}}
        </tr>	
      </thead>
      <tbody>
        @foreach($data as $dt)	
        <tr>
			<td>
				        {{$dt->maphong}}
			</td>
			<td>
        Chỉ số củ<input type="text" class="form-control input-sm"> 
        Chỉ số mới<input type="text" class="form-control input-sm"> 
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
        Chỉ số củ<input type="text" class="form-control input-sm"> 
        Chỉ số mới<input type="text" class="form-control input-sm">    
      </td>
    </tr>

        @endforeach
      </tbody>
    </table>
</div>



</body>
</html>
@endsection