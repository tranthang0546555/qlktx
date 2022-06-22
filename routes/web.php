<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// View
// Route::get('/', function () {
//     return view('view/home');
// });
Route::get('/', 'ViewController@home')->name('home');

Route::group(['prefix'=>'/'],function(){

    Route::get('thong-tin', 'ViewController@about')->name('thongtin');
    Route::get('lien-he', 'ViewController@contact')->name('lienhe');
    Route::post('contact/postform', 'ViewController@postform')->name('contact.postform');
    Route::group(['prefix'=>'/login'],function(){
        Route::get('/', 'SinhVienController@login')->name('login.sv');
        Route::get('sv', 'SinhVienController@login')->name('login.sv');
        Route::post('sv', 'SinhVienController@postLogin');
        Route::get('ad', 'QuanLyController@login')->name('login.ad');
        Route::post('ad', 'QuanLyController@postlogin');
        
    });

    Route::group(['prefix'=>'tacvu'],function(){
        Route::group(['prefix'=>'/dangki'],function(){
            Route::get('/', 'ViewController@dangki')->name('view.tacvu.dangki');
            Route::post( '/khu', 'ViewController@postKhu')->name('view.dangki.postKhu');
            Route::post( '/phong', 'ViewController@postPhong')->name('view.dangki.postPhong');
            Route::post( '/postDangki', 'ViewController@postDangki')->name('view.dangki.postDangki');
        });

    });
    
    Route::get('thong-bao/{id}', 'ViewController@thongbao')->name('view.thongbao');
    Route::get('quy-che-quy-dinh', 'ViewController@quychequydinh')->name('view.quychequydinh');
    Route::post('thong-bao/tim-kiem', 'ViewController@timkiem')->name('view.timkiem');
});


// POST contact


Route::group(['prefix'=>'ad'],function(){
    Route::get('/','QuanLyController@getLogin')->name('admin.get.login');

    Route::group(['middleware' => 'admin'],function(){

        Route::get('/index', 'QuanLyController@index')->name('admin.index');
        
        Route::get('/logout', 'QuanLyController@getLogout')->name('admin.get.logout');
        Route::group(['prefix'=>'/thong-bao'],function(){
            Route::get('/', 'QuanLyController@thongbao')->name('admin.thongbao');
            Route::post('dang-bai', 'QuanLyController@dangsuabai')->name('admin.thongbao.dangbai');
            Route::get('xoa-bai/{id}', 'QuanLyController@xoabai')->name('admin.thongbao.xoabai');
        });
        Route::get('dashboard', 'QuanLyController@dashboard');

        Route::group(['prefix'=>'dang-ki'],function(){
            Route::get('/', 'QuanLyController@qldangki')->name('admin.dangki');
            Route::post('/dongy', 'QuanLyController@dongyDangky')->name('admin.dangki.dongy');
            Route::post('/huy', 'QuanLyController@huyDangky')->name('admin.dangki.huy');
        });

        Route::group(['prefix'=>'tin-nhan'],function(){
            Route::get('/', 'QuanLyController@tinnhan')->name('admin.tinnhan');
            Route::get('/{id}', 'QuanLyController@xemtinnhan')->name('admin.tinnhan.xem');
            Route::post('traloi-tinnhan','QuanLyController@traloi_tinnhan')->name('admin.tinnhan.traloi');
        });

        Route::group(['prefix'=>'dien-nuoc'],function(){
            Route::get('/', 'QuanLyController@qldiennuoc')->name('admin.diennuoc');

        });

        Route::get('ql-sinh-vien', 'QuanLyController@qlsinhvien');
        

        Route::group(['prefix'=>'ql-phongoc'],function(){

            // Route::get('/', 'QuanLyController@qlphongoc')->name('admin.phongoc');
            // Route::get('/makhu/{makhu}', 'QuanLyController@qlkhu')->name('admin.phongoc.khu');
            // Route::get('/makhu/{makhu}/maphong/{maphong}', 'QuanLyController@qlphong')->name('admin.phongoc.phong');
        
            // Route::get('/them-khu', 'QuanLyController@themkhu')->name('admin.phongoc.themkhu');
            // Route::post('/them-khu', 'QuanLyController@postthemkhu')->name('admin.phongoc.postthemkhu');
            // Route::get('/cap-nhat-khu/{makhu}', 'QuanLyController@capnhatkhu')->name('admin.phongoc.capnhatkhu');
            // Route::post('/cap-nhat-khu', 'QuanLyController@postcapnhatkhu')->name('admin.phongoc.postcapnhatkhu');
            // Route::get('/xoa-khu/{makhu}', 'QuanLyController@postxoakhu')->name('admin.phongoc.postxoakhu');
            
            // Route::get('/them-phong/{makhu}', 'QuanLyController@themphong')->name('admin.phongoc.themphong');
            // Route::post('/them-phong', 'QuanLyController@postthemphong')->name('admin.phongoc.postthemphong');
            // Route::get('/cap-nhat-phong/{maphong}', 'QuanLyController@capnhatphong')->name('admin.phongoc.capnhatphong');
            // Route::post('/cap-nhat-phong', 'QuanLyController@postcapnhatphong')->name('admin.phongoc.postcapnhatphong');

            // Route::get('/them-giuong/{makhu}/{maphong}', 'QuanLyController@themgiuong')->name('admin.phongoc.themgiuong');
            // Route::post('/them-giuong', 'QuanLyController@postthemgiuong')->name('admin.phongoc.postthemgiuong');
            // Route::get('/xoa-giuong/{maphong}/{sogiuong}', 'QuanLyController@postxoagiuong')->name('admin.phongoc.postthemgiuong');


            Route::get('', 'QuanLyController@qlphongoc')->name('admin.phongoc');
            Route::get('/them-khu', 'QuanLyController@themkhu')->name('admin.phongoc.themkhu');
            
            Route::group(['prefix' => '{makhu}'], function () {
                Route::get('', 'QuanLyController@qlkhu')->name('admin.phongoc.khu');
                Route::get('/cap-nhat-khu', 'QuanLyController@capnhatkhu')->name('admin.phongoc.capnhatkhu');
                Route::get('/them-phong', 'QuanLyController@themphong')->name('admin.phongoc.themphong');
                Route::get('/xoa-khu', 'QuanLyController@postxoakhu')->name('admin.phongoc.postxoakhu');

                Route::group(['prefix' => '{maphong}'], function () {
                    Route::get('', 'QuanLyController@qlphong')->name('admin.phongoc.phong');
                    Route::get('/cap-nhat-phong', 'QuanLyController@capnhatphong')->name('admin.phongoc.capnhatphong');
                    Route::get('/them-giuong', 'QuanLyController@themgiuong')->name('admin.phongoc.themgiuong');
                    Route::get('/xoa-phong', 'QuanLyController@postxoaphong')->name('admin.phongoc.postxoaphong');
                    Route::get('/{sogiuong}/xoa-giuong', 'QuanLyController@postxoagiuong')->name('admin.phongoc.postthemgiuong');
                });
            });
            
            Route::post('/them-khu', 'QuanLyController@postthemkhu')->name('admin.phongoc.postthemkhu');
            Route::post('/cap-nhat-khu', 'QuanLyController@postcapnhatkhu')->name('admin.phongoc.postcapnhatkhu');
            Route::post('/them-phong', 'QuanLyController@postthemphong')->name('admin.phongoc.postthemphong');
            Route::post('/cap-nhat-phong', 'QuanLyController@postcapnhatphong')->name('admin.phongoc.postcapnhatphong');
            Route::post('/them-giuong', 'QuanLyController@postthemgiuong')->name('admin.phongoc.postthemgiuong');  
        });

        Route::group(['prefix'=>'hop-dong'],function(){
            Route::get('', 'QuanLyController@hopdong')->name('admin.hopdong');
            Route::get('them-moi', 'QuanLyController@themhopdong')->name('admin.hopdong.them');
            Route::get('gia-han', 'QuanLyController@giahanhopdong')->name('admin.hopdong.giahan');
            Route::get('cham-dut', 'QuanLyController@chamduthopdong')->name('admin.hopdong.chamdut');
            Route::get('dong-y-gia-han/{id}', 'QuanLyController@dongygiahanhopdong')->name('admin.hopdong.dongygiahanhopdong');
            Route::get('huy-gia-han/{id}', 'QuanLyController@huygiahanhopdong')->name('admin.hopdong.huygiahanhopdong');

            Route::get('dong-y-cham-dut/{id}', 'QuanLyController@dongychamduthopdong')->name('admin.hopdong.dongychamduthopdong');
            Route::get('huy-cham-dut/{id}', 'QuanLyController@huychamduthopdong')->name('admin.hopdong.huychamduthopdong');
        });
    });
});


Route::group(['prefix'=>'user'],function(){

    Route::get('/','SinhVienController@getLogin')->name('user.get.login');
    
    Route::group(['middleware' => 'user'],function(){   
        Route::get('/index','SinhVienController@index')->name('user.index');
        Route::get('logout','SinhVienController@getLogout')->name('user.get.logout');
        Route::get('chinh-sua-thong-tin','SinhVienController@chinhsua')->name('user.chinhsua');
        Route::post('chinh-sua-thong-tin','SinhVienController@postchinhsua')->name('user.postchinhsua');
        Route::get('hop-dong','SinhVienController@hopdong')->name('user.hopdong');
        Route::get('hop-dong/gia-han/{id}','SinhVienController@giahanhopdong')->name('user.giahanhopdong');
        Route::get('hop-dong/cham-dut/{id}','SinhVienController@chamduthopdong')->name('user.chamduthopdong');

    });

});
Auth::routes();

Route::get('pdfhopdong', function () {
    return view('admin.quanly_hopdong.pdf_hopdong');
});
// Route::get('sendmail', 'MailController@sendmail')->name('sendmail');





