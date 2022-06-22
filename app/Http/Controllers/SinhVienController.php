<?php

namespace App\Http\Controllers;

use App\SinhVien;
use App\SinhVienTable;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Storage;
use Carbon\Carbon;
use PDF;

class SinhVienController extends Controller
{   
    public function login(){
        return view('view.login_sv',[
            'url'=>'ĐĂNG NHẬP CHO SINH VIÊN'
        ]);
    }

    public function getLogin(){
        // dd("user.get.login");
        if(Auth::guard('SinhVien')->check()){
            return redirect()->route('user.index');
        }
        else return redirect()->route('login.sv');
    }
    public function getLogout(){
        Auth::guard('SinhVien')->logout();
        return redirect()->route('user.get.login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'masv' => $request->masv,
            'password' => $request->password,
        ];
        $masv = $request->masv;
        $password = $request->password;

        // if ($request->remember == trans('remember.Remember Me')) {
        //     $remember = true;
        // } else {
        //     $remember = false;
        // }
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('SinhVien')->attempt($arr)) {
        // if(Auth::guard('SinhVien')->attempt(['masv' => $masv , 'password' => $password])){

            // dd('đăng nhập thành công');
        
            return redirect()->route('user.get.login');
        } else {

            // dd('tài khoản và mật khẩu chưa chính xác'.$masv." ".$password);
            return redirect()->back()->with('status', 'Tài khoản hoặc mật khẩu chưa chính xác!');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $user = Auth::guard('SinhVien')->user();
        $masv = $user->masv;
        $data = DB::table('sinhvien')->where('masv', $masv)->select()->get();

        return view('user.home',[
            'data' => $data,
            'url'=> 'Thông tin cá nhân'
        ]);

    }

    public function chinhsua(){

        $user = Auth::guard('SinhVien')->user();
        $masv = $user->masv;
        $data = DB::table('sinhvien')->where('masv', $masv)->select()->get();

        return view('user.chinhsua_thongtin',[
            'data' => $data,
            'url'=> 'Thông tin cá nhân'
        ]);

    }

    public function postchinhsua(Request $request){
        $user = Auth::guard('SinhVien')->user();
        $masv = $user->masv;

        $ngaysinh = $request->ngaysinh;
        $sdt = $request->sdt;
        // dd($sdt);
        $email = $request->email;
        $diachi = $request->diachi;
        $updated_at = Carbon::now();
        $namefile = "";
        try {
            if ($request->hasFile('anhthe')) {
                $file = $request->anhthe;
                $original = $file->getClientOriginalExtension();
                // dd($name);
                if($original == 'png' || $original == 'jpeg' || $original == 'jpg'){
                    $namefile = $masv;
                    
                    $file->move(
                        'images/anhthe', //nơi cần lưu
                        $namefile //tên file
                    );
                    DB::table('taikhoansv')->where('masv', '=', $masv)->update([
                        'anhthe' => $namefile,
                    ]);
                }
            }

            DB::table('sinhvien')->where('masv', '=', $masv)->update([
                'ngaysinh' => $ngaysinh,
                'sdt' => $sdt,
                'email' => $email,
                'diachi' => $diachi,
                'updated_at' => $updated_at,
            ]);
            return redirect()->back()->with('status','Cập nhật thành công');

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('status','Cập nhật thất bại , thử lại!');
        }
    }

    public function hopdong()
    {
        $user = Auth::guard('SinhVien')->user();
        $masv = $user->masv;
        $data = DB::table('hopdong')->where('masv', $masv)->orderBy('ngaylap', 'DESC')->first();;
        $today = date('Y-m-d');
        $ngaylap = $data->ngaylap;
        $thoihan = strtotime(date("Y-m-d", strtotime($ngaylap)) . " +6 month");
        $thoihan = strftime("%Y-%m-%d", $thoihan);

        $pdf = $data->pdf;
        // dd($pdf);
        if($thoihan > $today){ 
           
           $thoihan = 'conhan';
        }else $thoihan = 'hethan';

        return view('user.hopdong',[
            'data' => $data,
            'url'=> 'Hợp đồng',
        ])->with('thoihan', $thoihan);
    }

    public function giahanhopdong(Request $request)
    {
        $id = $request->id;
        try {
            DB::table('giahanhopdong')->insert([
                'id' => $id,
                'trangthai' => 'CHUADUYET',
                'created_at' =>  Carbon::now(),
            ]);
            return redirect()->back()->with('status','Gia gửi yêu cầu hạn thành công');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status','Đã gửi yêu cầu gia hạn trước đó!');
        }
    }
    public function chamduthopdong(Request $request)
    {
        $id = $request->id;
        try {
            DB::table('chamduthopdong')->insert([
                'id' => $id,
                'trangthai' => 'CHUADUYET',
                'created_at' =>  Carbon::now(),
            ]);
            return redirect()->back()->with('status','Chấm gửi yêu cầu dứt thành công');
            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status','Đã gửi yêu cầu chấm dứt trước đó!');
        }
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
     * @param  \App\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function show(SinhVien $sinhVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function edit(SinhVien $sinhVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SinhVien $sinhVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SinhVien  $sinhVien
     * @return \Illuminate\Http\Response
     */
    public function destroy(SinhVien $sinhVien)
    {
        //
    }
}
