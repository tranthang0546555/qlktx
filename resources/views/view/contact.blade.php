@extends('view/index')
@section('Noidung')
  
<style>
  .container{
  font-family: inherit;
  }
  #status{
    color: #E3D600;
    /*font-family:"Poppins",sans-serif;*/
    display: none;
    font-family: inherit;
  }
</style>
<body>
  <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">
      <div class="container">
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
              	<br>  <br>
                  <h1 class="section-title">
                    LIÊN HỆ CHÚNG TÔI
                    <span id="status"></span>
                  </h1>
              </div>
          </div>
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                <p>
                  Nhằm nâng cao và cải thiện chất lượng KTX <br>
                  Bạn vui lòng để lại lời nhắn ở biểu mẫu bên phải <br>
                  Cảm ơn những đóng góp và phản hồi từ bạn <br>
                  Thân!
                </p>

                <div class="find-widget">
                 Địa chỉ: <a href="#">NAM KỲ KHỞI NGHĨA</a>
                </div>
                <div class="find-widget">
                  Điện thoại:  <a href="#">+ 84 333333333</a>
                </div>
                
                <div class="find-widget">
                  {{-- Website:  <a href="https://uny.ro">www.uny.ro</a> --}}
                </div>
                <div class="find-widget">
                   Làm việc: <a href="#">Thứ 2 - 7: 09:30 AM - 10.30 PM</a>
                </div>
              </div>
              <!-- contact form -->
              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                  <form action="{{ url('contact/postform') }}" method="post" class="shake" role="form" id="contactForm" name="contact-form" data-toggle="validator">
                      {{ csrf_field()}}
                      <!-- Name -->
                      
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Tên</label>
                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name" >
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Subject -->
                      <div class="form-group label-floating">
                        <label class="control-label">Tiêu đề</label>
                        <input class="form-control" id="msg_subject" type="text" name="title" required data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Nội dung</label>
                          <textarea class="form-control" rows="3" id="message" name="content" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                          <button style="background: red; color: #FFF" class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> GỬI ĐI</button>
                          <div id="msgSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>
                      </div>
                      <br>
                  </form>
              </div>
          </div>
      </div>
    </section>
<?php

 ?>
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
@endsection