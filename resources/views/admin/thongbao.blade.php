@extends('admin/index')
@section('Noidung')
<head>
  <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset('admin/css/thongbao.css')}}">

  <style>
table {
  /*font-family: arial, sans-serif;*/
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.color{
  color: #FED014;
  background: #FFF;
}
</style>
</head>
<div id="content">

  <div id="form">
    <form action="{{ route('admin.thongbao.dangbai') }}" method="post">
    {{ csrf_field()}}
    <input type="hidden" name="id" id="id">
      <table>
        <tr>
          <td colspan="2" class="color"><h3 id="luachon">Thêm bài viết mới</h3></td>
        </tr>	
        <tr>
          <td nowrap="nowrap">Tiêu đề bài viết :</td>
          <td><input type="text" id="title" name="title" style="width: 99%"></td>
        </tr>
        <tr>
          <td nowrap="nowrap">Nội dung :</td>
          <td>
            <textarea name="post_content" id="post_content" rows="10" cols="150"></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Thêm bài viết"></td>
        </tr>
 
	    </table>
    </form>
  </div>
  <br>
  <hr>
  <div id='form'>
    <table
    id="table"
    data-height="650"
    data-toggle="table"
    data-search="true"
    data-pagination="true"
    data-search-on-enter-key="true"
    >
    <thead>
      <tr>
        <th data-sortable="true" style="width: 50%;">Tiều đề</th>
        <th data-sortable="true" >Ngày tạo</th>
        <th data-sortable="true">Ngày cập nhật</th>  
        <th>Sửa</th> 
        <th>Xóa</th> 
      </tr>
     </thead> 
    <?php 
    foreach($tb as $data){
    ?> 
      <tr>
        <td>{{$data->tieude}}</td>
        <td>{{$data->created_at}}</td>
        <td>{{$data->updated_at}}</td>
        <td><input type="submit" name="edit" onclick="edit('{{$data->id}}','{{$data->tieude}}', '{{$data->noidung}}')" value="S"></td>
        <td>
          <a href="{{route('admin.thongbao.xoabai',[$data->id])}}"></a>
            <input id="{{$data->id}}" type="submit" name="del" onclick="del(id)" value="X">
            {{-- <button onclick="del(id)" id="">X</button> --}}
          
        </td> 
      </tr>  
    <?php 
    }
    ?>
    </table>


  </div>
  <br>
  <br>
  <br>
</div>
<script>
    CKEDITOR.replace( 'post_content' );
    $smg = '{{Session::get('status')}}';
  var exist = '{{Session::has('status')}}';
  if(exist){  
    document.getElementById('status').style.display = 'block';
    document.getElementById('status').innerHTML = $smg;
  }

  function edit($id, $tieude, $noidung){
    // alert($noidung);
    document.getElementById('title').value = $tieude;
    CKEDITOR.instances['post_content'].setData($noidung);
    document.getElementById('submit').value = 'Chỉnh sửa';
    document.getElementById('luachon').innerHTML = 'Chỉnh sửa bài viết';
    document.getElementById('id').value = $id;


    $('html,body').animate({
        scrollTop: $("#page-wrapper").offset().top
    }, 'slow');

    $("#"+x).click(function(e) {
        // Prevent a page reload when a link is pressed
        e.preventDefault();
        // Call the scroll function
        goToByScroll("page-wrapper");
    });

  }

  function del($id){
    $x = confirm("Bạn muốn xáo bài viết này chứ!");
    if ($x == 1) {
      var url = window.location.href + '/xoa-bai/' + $id;
      window.location= url;
    }
  }
</script>
</body>
</html>
@endsection