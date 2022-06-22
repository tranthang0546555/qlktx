<head>
	<base href="{{ asset('')}}">
</head>
<div class="single-sidebar-widget search-widget">
	<form class="search-form" action="{{route('view.timkiem')}}" method="post">
		{{ csrf_field()}}
        <input style="outline:none;" placeholder="Tìm kiếm thông báo" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm thông báo'" >
        <button  type="submit" ><i class="fa fa-search"></i></button>

    </form>
</div>
<div class="single-sidebar-widget user-info-widget">
	<img src="{{asset('view/img/logo - Copy.png')}}" alt="">
	<a href="#"><h5>KÝ TÚC XÁ</h5></a>
	<p>
		CỘNG ĐỒNG SINH VIÊN NỘI TRÚ KTX - ĐÔ THỊ ĐẠI HỌC ĐÀ NẴNG
	</p>
	<ul class="social-links">
		<li><a href="https://www.facebook.com/groups/CongDongSinhVienKTXDoThiDHDN/"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#"><i class="fa fa-github"></i></a></li>
		<li><a href="#"><i class="fa fa-behance"></i></a></li>
	</ul>
	<p>
		<span>
		Là nơi để các bạn sinh viên <br>
		Tiếp nhận nhanh chóng mọi thông tin, thông báo liên quan đến hoạt động của KTX <br>
		Giao lưu, kết bạn giữa các SV nội trú KTX <br>
		Thẳng thắn góp ý đến Tổ Quản lý KTX, góp ý giữa các bạn sinh viên nội trú với nhau để cùng xây dựng môi trường sinh hoạt, học tập tốt hơn.
		</span>
	</p>
</div>