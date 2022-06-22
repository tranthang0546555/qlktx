@extends('user/index')
@section('Noidung')
<!DOCTYPE html>
<html lang="en">
<head>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    #giahan, #chamdut{
        display: none;
    }
</style>
</head>
<body>
    
    <a onclick="javascript:window.history.back(-1);return false;">
        <button class="btn btn-info">
            <i class="fa fa-reply"></i>
            Trở về 
        </button>
    </a>
    {!! session()->get('status') !!}
    <button id="chamdut" onclick="chamdut()" {{--  target="_blank" --}} class="btn btn-danger pull-right m-l-20 waves-effect waves-light">
        Chấm dứt hợp đồng
    </button>
    <button id="giahan" onclick="giahan()" {{--  target="_blank" --}} class="btn btn-success pull-right m-l-20 waves-effect waves-light">
        Gia hạn hợp đồng
    </button>   
    
    <br>
    <br>
    <div style="height: 1000px; width: 100%; marg in: 20px auto; background: yellow; ">
        {{-- <object src="images/hopdong/{{$data->pdf}}#page=2" width="100%" height="100%"> --}}
        <object data='/images/hopdong/{{$data->pdf}}#page=1' type='application/pdf' width='100%' height='100%'>
    </div>
    {{$data->pdf ?? ''}}
    <script>
        var thoihan = '{{$thoihan}}';
        // alert(thoihan);
          if(thoihan == 'conhan'){
            document.getElementById('chamdut').style.display = 'block';
            document.getElementById('giahan').style.display = 'none';
            // alert('conhan');
          } else{
            document.getElementById('chamdut').style.display = 'none';
            document.getElementById('giahan').style.display = 'block';
            // alert('hethan');
          } 
        

        function giahan(){
            confirm('Bạn có muốn thực hiện gia hạn hợp đồng');
            window.location = '/user/hop-dong/gia-han/'+{{$data->id}};
        }
        function chamdut(){
            confirm('Bạn có muốn thực hiện chấm dứt hợp đồng');
            window.location = '/user/hop-dong/cham-dut/'+{{$data->id}};
        }
      </script>
</body>
</html>
@endsection