<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Mail;
use App\SinhVienTable;

class ViewController extends Controller
{
    public function home(){
        // $data = DB::table('bangthongbao')->select()->get();
        $data = DB::table('bangthongbao')->orderBy('created_at','DESC')->paginate(7);
    	return view('view/home-thongbao',[
    		'url'=>'TRANG CHỦ',
            'data'=>$data,
    	]);
    }

    public function about(){
    	return view('view/about',[
    		'url'=>'THÔNG TIN'

 
    	]);
    }

    public function contact(){
    	return view('view/contact',[
    		'url'=>'LIÊN HỆ'
 
    	]);
    }
    
    // POST contact
    public function postform(Request $Request){
    	// print_r($Request->all());
    	$name = $Request->name;
        $email = $Request->email;
        $title = $Request->title;
        $content = $Request->content;

        $date = Carbon::now();
        $status = "";

        if(DB::insert('insert into tinnhan (ten, mail, tieude, noidung, created_at) values (?, ?, ?, ?, ?)', [$name, $email, $title, $content, $date])){
            $status = "Gửi đi thành công.";
        }else $status = "Gửi đi thất bại";

    	return redirect()->back()->with('status',$status);
    }


    public function thongbao(Request $Request){
        $data = DB::table('bangthongbao')->where('id', '=', $Request->id)->orderBy('created_at', 'DESC')->select()->get();
        return view('view.thongbao',[
            'url'=> 'THÔNG BÁO',
            'data'=>$data 
        ]);
    }

    public function dangki(Request $Request){
        // $data = DB::table('khu')->select()->get();
        $data = DB::table('khu')->pluck("tenkhu","makhu")->all();
        return view('view.dangki.dangki',[
            'url'=>'ĐĂNG KÍ NỘI TRÚ',
            'data'=>$data
        ]); 


    }
    public function postKhu(Request $request){
        if ($request->ajax()) {

        $makhu = $request->makhu;          
        
        $phong = DB::table('phong')->where('makhu',$makhu)->pluck("maphong","maphong")->all();

        // $phong = DB::table('phong')->where('makhu',$makhu)->select()->get();
        $data = view('view.dangki.ajax_select_phong',compact('phong'))->render();

        return response()->json(['options'=>$data]);
        // return response()->json($phong);
        // return $phong;
        // print_r($phongs);

        }
    }

    public function postPhong(Request $request){
        if ($request->ajax()) {

        $maphong = $request->maphong;          
        
        $giuong = DB::table('giuong')->where('maphong',$maphong)->where('tinhtrang','TRONG')->pluck("sogiuong","sogiuong")->all();

        // $phong = DB::table('phong')->where('makhu',$makhu)->select()->get();
        $data = view('view.dangki.ajax_select_giuong',compact('giuong'))->render();

        return response()->json(['options'=>$data]);
        // return response()->json($phong);
        // return $phong;
        // print_r($phongs);

        }
    }


    public function postDangki(Request $request){

        $status = "";

            $masv = $request->masv;
            $hoten = $request->hoten;
            $gioitinh = $request->gender;
            $ngaysinh = $request->ngaysinh;
            $sdt = $request->sdt;
            $email = $request->email;
            $diachi = $request->diachi;

            $ngaylap = Carbon::now();
            $thoihan = 6;

            $makhu = $request->makhu;
            $maphong = $request->phong;
            $sogiuong = $request->giuong;

            $created_at = Carbon::now();    
            $updated_at = Carbon::now();

        // SinhVienTable::where('masv', $masv)->delete();
        $sv = SinhVienTable::where('masv', $masv)->first();

        try {
            //code...
        
                if($sv == null){
                    $sv = DB::table('sinhvien')->insert(
                        [   
                               'masv' => $masv,
                            'hoten' => $hoten,
                            'gioitinh' => $gioitinh,
                            'ngaysinh' => date("Y-m-d", strtotime($ngaysinh)),
                            'sdt' => $sdt,
                            'diachi' => $diachi,
                            'email' => $email,
                            'cmnd' => "",
                            'truonghoc' => "",
                        ]
                    );

                    $ph = DB::table('hopdong')->insert(
                        [   
                            'masv' => $masv,
                            'makhu' => $makhu,
                            'maphong' => $maphong,
                            'sogiuong' => $sogiuong,
                            'ngaylap' => $ngaylap,
                            'thoihan' => $thoihan,
                            'trangthai' => 'CHUAXACNHAN',
                            'pdf' => '',
                            'manv' => "",
                        ]
                    );
                } 
        }catch (\Throwable $th) {
            //throw $th;
            $status = "Đăng kí thất bại";
            return redirect()->back()->with('status', $status);
        }
            try {
                Mail::send(
                    ['text'=>'mail.mail_dangki'],
                    ['hoten'=>$hoten, 'email'=>$email],
                     function($message) use ($hoten, $email){
    
                    $tieude = "Đăng ký kí túc tại KTX CĐCN";
    
                    $message->to( $email, $hoten)->subject($tieude);
                    $message->from('tranthang0546555@gmail.com',  'Ban quản lý KTX');

                    $status = "Đã ghi nhận đăng ký của bạn!";
                    }
                    
                );

            } catch (\Throwable $th) {
                $status = "Gửi Email thất bại!";
                return redirect()->back()->with('status', $status);
            }
        $status = "Đã ghi nhận đăng ký của bạn!";
        return redirect()->back()->with('status', $status);
    }

    public function quychequydinh(){
        return view('view/quyche_quydinh',[
            'url'=>'QUY CHẾ - QUY ĐỊNH',
        ]);
    }

    public function timkiem(Request $request){
        $t = $request->search;
        $data = DB::table('bangthongbao')->where('tieude','like', '%'.$t.'%')->paginate(7);;
        // $data = DB::table('bangthongbao')->paginate(7);
        return view('view/home-thongbao',[
            'url'=>'TRANG CHỦ',
            'data'=>$data,
        ]);
    }



    
}
