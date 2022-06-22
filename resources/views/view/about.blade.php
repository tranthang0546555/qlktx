@extends('view/index')
@section('Noidung')
			<section class="about-video-area section-gap">
				<div class="container">			
					<div class="row align-items-center">
						<div class="col-lg-5 about-video-left">
							<h6 class="text-uppercase">
								KÍ TÚC XÁ CAO ĐẲNG CÔNG NGHỆ
							</h6>
							<h1>
								TRUNG TÂM NỘI TRÚ <br>
								SINH VIÊN 
							</h1>
							<p>
								<span>CỘNG ĐỒNG SINH VIÊN NỘI TRÚ KTX - ĐÔ THỊ ĐẠI HỌC</span>
							</p>
							<p>
								Tiếp nhận nhanh chóng mọi thông tin, thông báo liên quan đến hoạt động của KTX
								Giao lưu, kết bạn giữa các SV nội trú KTX
								Thẳng thắn góp ý đến Tổ Quản lý KTX, góp ý giữa các bạn sinh viên nội trú với nhau để cùng xây dựng môi trường sinh hoạt, học tập tốt hơn.
							</p>
							<a class="primary-btn" href="{{route('view.tacvu.dangki')}}">ĐĂNG KÝ NÀO</a>
						</div>
						<div class="col-lg-7">
							<iframe id="ytplayer" type="text/html" width="640" height="360"
  src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"
  frameborder="0"></iframe>
						</div>
					</div>
				</div>	
			</section>
@endsection