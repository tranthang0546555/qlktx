@extends('view/index')
@section('Noidung')

<!------ Include the above in your HEAD tag ---------->
<body>
    <div id="login">
        <h3 class="text-center pt-5">LOGIN</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login.ad') }}" method="post">
                            {{ csrf_field()}}
                            
                            <div class="form-group">
                                <label for="taikhoan" class="text-info">TÀI KHOẢN:</label><br>
                                <input type="text" name="taikhoan" id="taikhoan" class="form-control" placeholder="admin1">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">MẬT KHẨU:</label><br>
                                <input name="password" type="password" class="form-control" id="" placeholder="********">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="ĐĂNG NHẬP">
                                
                                <?php
                                if (Session::has('status')) {
                                   echo Session::get('status');
                                } else {
                                    # code...
                                }
                                
                                ?>
                                
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection