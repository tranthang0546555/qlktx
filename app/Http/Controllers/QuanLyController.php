<?php

namespace App\Http\Controllers;

use App\QuanLy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Session;
use Validator;
use PDF;

class QuanLyController extends Controller
{   

    public function login(){
        return view('view.login_ad',[
            'url'=>'ĐĂNG NHẬP CHO QUẢN LÝ'
        ]);
    }

    public function getLogin(){
        if(Auth::guard('QuanLy')->check()){
            return redirect()->route('admin.index');
        }
        else return redirect()->route('login.ad');
    }
    public function postLogin(Request $request)
    {
        $arr = [
            'taikhoan' => $request->taikhoan,
            'password' => $request->password,
        ];
        $taikhoan = $request->taikhoan;
        $password = $request->password;

        // if ($request->remember == trans('remember.Remember Me')) {
        //     $remember = true;
        // } else {
        //     $remember = false;
        // }
        //kiểm tra trường remember có được chọn hay không
        
        // if (Auth::guard('SinhVien')->attempt($arr)) {
        if(Auth::guard('QuanLy')->attempt(['taikhoan' => $taikhoan , 'password' => $password])){

            // dd('đăng nhập thành công');
        

            return redirect()->route('admin.get.login');
        } else {

            // dd('tài khoản và mật khẩu chưa chính xác'.$request->taikhoan." ".$request->password);
            return redirect()->back()->with('status', 'Tài khoản hoặc mật khẩu chưa chính xác!');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    public function getLogout(){
        Auth::guard('QuanLy')->logout();
        return redirect()->route('admin.get.login');
    }

    public function index(){
        $ql = Auth::guard('QuanLy')->user();
        $taikhoan = $ql['taikhoan'];
        return view('admin.dashboard',[
            'taikhoan' => $taikhoan,
            'url' => 'Trang chủ'
        ]);
        // dd($taikhoan);
    }
    
    public function thongbao(){
        $tb = DB::select('SELECT * FROM bangthongbao ORDER BY created_at DESC');
        // $ql = Auth::guard('QuanLy')->user();
        // $taikhoan = $ql['taikhoan'];
        return view('admin/thongbao', [
            'tb' => $tb,
            'url' => 'Thông báo',
            // 'taikhoan'=> $taikhoan
        ]);
    }

    public function dashboard(){
        return redirect()->route('admin.index');
    }
    public function dangsuabai(Request $Request){
        $id = $Request->id;
        $title = $Request->title;
        $content = $Request->post_content;
        $date = Carbon::now();
        $day = $date->toDateString();
 
        $status = "";
        try {

            if (DB::select('SELECT id FROM bangthongbao WHERE id = ?',[$id])) {
                DB::update('UPDATE bangthongbao SET tieude = ?, noidung = ?, updated_at = ? WHERE id = ?',[$title, $content, $date, $id]);
                $status = "Chỉnh sửa thành công";
            }
            else{
                if(DB::insert('insert into bangthongbao (tieude, noidung, created_at) values (?, ?, ?)', [$title, $content, $date])){
                $status = "Đăng bài viết thành công.";
                }else $status = "Đăng bài viết thất bại";
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
        return redirect()->back()->with('status', $status);
        
    }

    public function xoabai($id){
        try {
            DB::table('bangthongbao')->where('id', '=', $id)->delete();
            $status = "Xóa thành công";
        } catch (\Throwable $th) {
            $status = "Xóa thất bại";
        }
        return redirect()->back()->with('status', $status);
    }

    public function qlsinhvien(){
        $data = DB::table('sinhvien')->select()->get();
        return view('admin/qlsinhvien', [
            'data' => $data,
            'url' => 'Quản lý sinh viên',
        ]);
    }

    public function qlphongoc(){
        $data = DB::table('khu')->select()->get();
        return view('admin/quanly_phongoc/khu', [
            'data' => $data,
            'url' => 'Quản lý phòng',

        ]);
    }
    public function qlkhu(Request $request){
        $makhu = $request->makhu;
        $data = DB::table('phong')->where('makhu',"=",$makhu)->select()->get();
        return view('admin/quanly_phongoc/phong', [
            'data' => $data,
            'url' => 'Quản lý phòng',
            'makhu'=> $makhu,
        ]);
    }
    public function qlphong(Request $request){
        $maphong = $request->maphong;
        $makhu = $request->makhu;
        $data = DB::table('giuong')->where('maphong',"=",$maphong)->select()->get();
        return view('admin/quanly_phongoc/giuong', [
            'data' => $data,
            'url' => 'Quản lý phòng',
            'makhu'=> $makhu,
            'maphong'=> $maphong,
        ]);
    }
// QUẢN LÝ KHU
    public function themkhu(){
        return view('admin/quanly_phongoc/form/form_khu_themmoi', [
            'url' => 'Thêm khu mới',
        ]
        );
    }
    public function postthemkhu(Request $request){
        $makhu = $request->makhu;
        $tenkhu = $request->tenkhu;
        
        $validationKhu = Validator::make(
            $request->all(),
            [
                'makhu' => 'required|min:4|max:4',
                'tenkhu' => 'required|min:5|max:5',
            ],
        
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
            ],
        
            [
                'makhu' => 'Mã khu',
                'tenkhu' => 'Tên khu',
            ]
        );
        
        if ($validationKhu->fails()) {
            return redirect()->back()->withErrors($validationKhu);  
        }
        try {
            $result = DB::table('khu')->insert([
                'makhu' => $makhu,
                'tenkhu' => $tenkhu
             ]);

            return redirect()->route('admin.phongoc');
           
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('makhu','Mã khu đã tồn tại, thử lại!');
        }   
    }
    public function capnhatkhu(Request $request){
        $makhu = $request->makhu;
        
        $data = DB::table('khu')->where('makhu','=',$makhu)->select()->get();
        foreach ($data as $dt) {
            $tenkhu = $dt->tenkhu;
        }
        return view('admin/quanly_phongoc/form/form_khu_capnhat', [
            'makhu' => $makhu,
            'tenkhu' => $tenkhu,
            'url' => 'Quản lý phòng',
        ]
        );
    }
    public function postcapnhatkhu(Request $request){
        
        $makhu = $request->makhu;
        $tenkhu = $request->tenkhu;

        $validationKhu = Validator::make(
            $request->all(),
            [
                'tenkhu' => 'required|min:5|max:5',
            ],
        
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
            ],
        
            [
                'tenkhu' => 'Tên khu',
            ]
        );
        
        if ($validationKhu->fails()) {
            return redirect()->back()->withErrors($validationKhu);  
        }
        try {
            $result = DB::table('khu')->where('makhu','=',$makhu)->update([
                // 'makhu' => $makhu,
                'tenkhu' => $tenkhu
             ]);
            return redirect()->route('admin.phongoc');
        } catch (\Throwable $th) {
            return redirect()->back()->with('makhu', 'Cập nhật thất bại, thử lại!');
        }   
    }
    public function postxoakhu(Request $request)
    {
        $makhu = $request->makhu;
        // dd($makhu);
        try {
            DB::table('khu')->where('makhu', '=',$makhu)->delete();
            $phongs = DB::table('phong')->where('makhu', '=', $makhu)->select('maphong')->get();
            foreach($phongs as $ph){
                DB::table('giuong')->where('maphong','=',$ph->maphong)->delete();
            }
            DB::table('phong')->where('makhu', '=', $makhu)->delete();

            return redirect()->back()->with('status', 'Xóa thành công');            
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Xóa thất bại');   
        }
    }

    public function themphong(Request $request){
        $makhu = $request->makhu;
        return view('admin/quanly_phongoc/form/form_phong_themmoi', [
            'url' => 'Thêm phòng mới',
            'makhu' => $makhu,
        ]
        );
    }
    public function postthemphong(Request $request){

        $validationPhong = Validator::make(
            $request->all(),
            [
                'maphong' => 'required|min:4|max:4',
                'giaphong' => 'required|integer',
            ],
        
            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
            ],
        
            [
                'maphong' => 'Mã phòng',
                'giaphong' => 'Giá phòng',
            ]
        );
        
        if ($validationPhong->fails()) {
            return redirect()->back()->withErrors($validationPhong);
        } 
        try {
            $makhu = $request->makhu;   
            $maphong = $request->maphong;
            $giaphong = $request->giaphong;

            DB::table('phong')->insert([
                'maphong' => $maphong,
                'giaphong' => $giaphong,
                'tinhtrang' => '',
                'makhu' => $makhu,
            ]);
            return redirect()->route('admin.phongoc.khu', ['makhu' => $makhu]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('maphong',"Thêm phòng thất bại, thử lại!");
        }
    }
    public function capnhatphong(Request $request)
    {   
        $makhu = $request->makhu;
        $maphong = $request->maphong;
        
        try {
            $data = DB::table('phong')->where('maphong','=',$maphong)->select()->get();
                foreach ($data as $dt) {
                    $maphong = $dt->maphong;
                    $giaphong = $dt->giaphong;
                    // $makhu = $dt->makhu;
                    // dd($giaphong);
                }
                return view('admin/quanly_phongoc/form/form_phong_capnhat', [
                    'makhu' => $makhu,
                    'maphong' => $maphong,
                    'giaphong' => $giaphong,
                    'url' => 'Quản lý phòng',
                ]
            );
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    public function postcapnhatphong(Request $request)
    {   
        $makhu = $request->makhu;
        $maphong = $request->maphong;
        $giaphong = $request->giaphong;
        try {
            $result = DB::table('phong')->where('maphong','=',$maphong)->update([
                'giaphong' => $giaphong,
            ]);
            return redirect()->route('admin.phongoc.khu', ['makhu' => $makhu]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('giaphong', 'Cập nhật thất bại, thử lại!');
        } 
    }

    public function postxoaphong(Request $request)
    {
        $maphong = $request->maphong;
        try {
            DB::table('giuong')->where('maphong', '=',$maphong)->delete();

           DB::table('phong')->where('maphong', '=', $maphong)->delete();
            return redirect()->back()->with('status', 'Xóa thành công');            
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Xóa thất bại');   
        }
    }

    public function themgiuong(Request $request)
    {
        $makhu = $request->makhu;
        $maphong = $request->maphong;
        return view('admin/quanly_phongoc/form/form_giuong_themmoi', [
            'url' => 'Thêm giường mới',
            'maphong' => $maphong,
            'makhu' => $makhu,
        ]
        );
    }
    public function postthemgiuong(Request $request)
    {
        $makhu = $request->makhu;
        $maphong = $request->maphong;
        $sogiuong = $request->sogiuong;
        try {
            $result = DB::table('giuong')->insert([
                'sogiuong' => $sogiuong,
                'tinhtrang' => "TRONG",
                'maphong' => $maphong,
             ]);

            return redirect()->route('admin.phongoc.phong',[$makhu,$maphong]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('sogiuong', 'Thêm giường thất bại, thử lại!');
        }
    }
    public function postxoagiuong(Request $request)
    {
        $sogiuong = $request->sogiuong;
        $maphong = $request->maphong;
        // dd($makhu);
        try {
            DB::table('giuong')->where('maphong', '=',$maphong)->where('sogiuong', '=', $sogiuong)->delete();
            $phongs = DB::table('phong')->where('makhu', '=', $makhu)->select('maphong')->get();
            return redirect()->back()->with('status', 'Xóa thành công');            
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Xóa thất bại');   
        }
    }
    

    public function qldangki(){
        $data = DB::table('hopdong')->where('trangthai', '=', 'CHUAXACNHAN')->orderBy('ngaylap', 'desc')->select()->get();
        return view('admin/qldangki', [
            'data' => $data,
            'url' => 'Đăng ký',
        ]);
    }

    public function dongyDangky(Request $Request){
        $id = $Request->id;
        $masv = $Request->masv;
        $status = "";

        $ql = Auth::guard('QuanLy')->user();
        $taikhoan = $ql['taikhoan'];

        try {
            //code...
            
            /*Lấy thông tin gửi MAIL*/
            $tt = DB::table('sinhvien')->where('masv', $masv)->select()->get();
            foreach ($tt as $tht) {
                $hoten = $tht->hoten;
                $email = $tht->email;
                $gioitinh = $tht->gioitinh;
                $ngaysinh = $tht->ngaysinh;
                $sdt = $tht->sdt;
                $email = $tht->email;
            }
            if($gioitinh == 1) $gioitinh = 'Nam';
            else $gioitinh = 'Nữ';
            $data = [
                'masv' => $masv,
                'hoten' => $hoten,
                'email' => $email,
                'sdt' => $sdt,
                'gioitinh' => $gioitinh, 
                'ngay' => Carbon::now()->day,
                'thang' => Carbon::now()->month,
                'nam' => Carbon::now()->year,
                'ngaysinh' => $ngaysinh,
            ];
            
            $pdf = PDF::loadView('admin/quanly_hopdong/pdf_hopdong', $data);  
            // return $pdf->download('medium.pdf');

            $location = 'images/hopdong/';
            $filename = $masv.'.pdf';
            $pdf -> save($location . $filename);
            // dd($pdf);

            // dd($mailto);
            /*Thay đổi trạng thái hợp đòng*/
            $data = DB::table('hopdong')->where('id', $id)->update([
                'trangthai' => 'DAXACNHAN',
                'pdf' => $filename,
                'manv' => $taikhoan,
                ]);

            /*Lấy thông tin hợp đồng và cập nhật giường TRỐNG*/
            $phong = DB::table('hopdong')->where('id', $id)->select()->get();
            foreach ($phong as $phong1) {
                $maphong = $phong1->maphong;
                $sogiuong = $phong1->sogiuong;
            }
            DB::table('giuong')->where('maphong', $maphong)->where('sogiuong', $sogiuong)->update(['tinhtrang' => 'DACO']);

            /*Cấp tài khoản cho sinh viên*/
            $tk = DB::table('taikhoansv')->insert([
                'masv' => $masv,
                'password' => bcrypt('12345'),
                'anhthe' => 'anhthe.jpg',
                'created_at' => Carbon::now(),
            ]);
            
            Mail::send(
                ['text'=>'mail.mail_dangki'],
                ['hoten'=>$hoten, 'email'=>$email],
                function($message) use ($hoten, $email){

                $tieude = "Xác nhận Đăng ký kí túc tại KTX CĐCN";

                $message->to( $email, $hoten)->subject($tieude);
                $message->from('tranthang0546555@gmail.com',  'Ban quản lý KTX');
            });

            $status = "Đã xác nhận cho sinh viên: ".$masv;    
            return redirect()->back()->with('status', $status);

        } catch (\Throwable $th) {
            throw $th;
            $status = "Đã HỦY xác nhận cho sinh viên: ".$masv;
            return redirect()->back()->with('status', $status);
        }  
    
    }

    public function huyDangky(Request $Request){
        $id = $Request->id;
        $masv = $Request->masv;
        $ql = Auth::guard('QuanLy')->user();
        $taikhoan = $ql['taikhoan'];
        $data = DB::table('hopdong')->where('id', $id)->update([
            'trangthai' => 'HUYXACNHAN',
            'manv' => $taikhoan,
            ]);
        $status = "Đã HỦY xác nhận cho sinh viên".$masv;
        return redirect()->back()->with('status', $status);
    }

    public function tinnhan(){
        $data = DB::table('tinnhan')->orderBy('created_at', 'desc')->get();
        return view('admin/quanly_tinnhan/tinnhan', [
            'data' => $data,
            'url' => 'Tin nhắn',
        ]);
    }
    public function xemtinnhan(Request $request){
        $id = $request->id;
        try {
            $data = DB::table('tinnhan')->where('id', '=', $id)->get();
            return view('admin/quanly_tinnhan/xem_tinnhan',[
                'data' => $data,
                'url' => "Xem tin nhắn",

            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function traloi_tinnhan(Request $request){
        try {
            $ten = $request->ten;   
            $mail = $request->mail;
            $tieude = $request->tieude;
            $noidung1 = $request->noidung1;
            $noidung2 = $request->noidung2;

            $data = array(
                'noidung1'=> $noidung1,
                'noidung2'=> $noidung2,
            );
            if($noidung2 == null){
                return redirect()->back()->with('tinnhan',"Nội dung trả lời trống!");
            }
            else{

                Mail::send(
                'mail.mail_traloi_tinnhan',
                // ['ten'=>$ten, 'mail'=>$mail, 'tieude'=>$tieude, 'data'=>$data],
                $data,
                function($message) use ($ten, $mail, $tieude){

                $tieude = "Trả lời: ".$tieude;

                $message->to( $mail, $ten)->subject($tieude);
                $message->from('tranthang0546555@gmail.com',  'Ban quản lý KTX');
            });
                return redirect()->back()->with('tinnhan',"Gửi đi thành công!");
            }
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('tinnhan',"Lỗi xảy ra, thử lại!");
        }
    }

   
    public function hopdong()
    {
        $data = DB::table('hopdong')->where('trangthai',"DAXACNHAN")->select()->get();
        return view('admin/quanly_hopdong/qlhopdong', [
            'data' => $data,
            'url' => 'Hợp đồng',
        ]);
    }
    public function themhopdong()
    {
        $data = DB::table('khu')->pluck("tenkhu","makhu")->all();
        return view('admin/quanly_hopdong/them_hopdong',[
            'url'=>'ĐĂNG KÍ NỘI TRÚ',
            'data'=>$data
        ]);
    }
    public function giahanhopdong()
    {
        $data = DB::table('giahanhopdong')->where('trangthai','CHUADUYET')->select()->get();
        return view('admin/quanly_hopdong/giahan_hopdong', [
            'data' => $data,
            'url' => 'Gia hạn hợp đồng',
        ]);
    }
    public function dongygiahanhopdong(Request $request){
        $id = $request->id;
        // dd($id);
        try {
            DB::table('giahanhopdong')->where('id',$id)->update([
                'trangthai' => 'DAGIAHAN',
                'updated_at' => Carbon::now(),
            ]);

            $phu = DB::table('hopdong')->where('id',$id)->first();

            $ph = DB::table('hopdong')->insert(
                [   
                    'masv' => $phu->masv,
                    'makhu' => $phu->makhu,
                    'maphong' => $phu->maphong,
                    'sogiuong' => $phu->sogiuong,
                    'ngaylap' => Carbon::now(),
                    'thoihan' => $phu->thoihan,
                    'trangthai' => 'DAXACNHAN',
                    'pdf' => '',
                    'manv' => "",
                ]
            );
            // dd($phu);
            return redirect()->back()->with('status','Gia hạn thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status','Gia hạn thất bại!');
        }
        return redirect()->back()->with('status','Gia hạn thành công');
    }
    public function chamduthopdong()
    {
        $data = DB::table('chamduthopdong')->where('trangthai','CHUADUYET')->select()->get();
        return view('admin/quanly_hopdong/chamdut_hopdong', [
            'data' => $data,
            'url' => 'Chấm dứt hợp đồng',
        ]);
    }
    public function dongychamduthopdong(Request $request){
        $id = $request->id;
        // dd($id);
        try {
            DB::table('chamduthopdong')->where('id',$id)->update([
                'trangthai' => 'DADUYET',
                'updated_at' => Carbon::now(),
            ]);
            DB::table('hopdong')->where('id',$id)->update([
                'trangthai' => 'DACHAMDUT',
            ]);
            return redirect()->back()->with('status','Chấm dứt thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status','Chấm dứt thất bại!');
        }
        return redirect()->back()->with('status','Chấm dứt thành công');
    }
    
    public function qldiennuoc()
    {
        $data = DB::table('phong')->select()->get();
        return view('admin/qldiennuoc', [
            'data' => $data,
            'url' => 'Quản lý điện nước',
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuanLy  $quanLy
     * @return \Illuminate\Http\Response
     */
    public function show(QuanLy $quanLy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuanLy  $quanLy
     * @return \Illuminate\Http\Response
     */
    public function edit(QuanLy $quanLy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuanLy  $quanLy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuanLy $quanLy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuanLy  $quanLy
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuanLy $quanLy)
    {
        //
    }
}
