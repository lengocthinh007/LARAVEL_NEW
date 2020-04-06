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
Route::group(['namespace'=>'Frontend'],function(){
		Route::get('/','Homecontroller@getHome');
});
Route::get('loaisanpham/{id}/{alias}','Frontendcontroller@getloaisanpham');
Route::get('tim-kiem','Frontendcontroller@getloaisanpham')->name('tim-kiem');
Route::post('/autocomplete/fetch', 'Frontendcontroller@fetch')->name('autocomplete.fetch');
Route::get('Details/{id}/{alias}','Frontendcontroller@getdetails');

Route::get('lien-he','Contactcontroller@getcontact');
Route::post('lien-he','Contactcontroller@postcontact')->name('lien-he');

Route::group(['prefix'=>'thanh-toan','middleware'=>'CheckLoginUser'],function(){
	Route::get('/','Cartcontroller@thanhtoan');
	Route::post('/','Cartcontroller@savethanhtoan');
});

Route::group(['prefix'=>'ajax','middleware'=>'CheckLoginUser'],function(){
	Route::post('/danh-gia/{id}','Ratingcontroller@saverating');
	Route::post('/view-product','Homecontroller@recentlyviews')->name('post.product.view');
});

Route::group(['namespace'=>'Auth'],function(){

	Route::group(['prefix'=>'Admin'],function(){
		Route::get('/login','Logincontroller@getLoginadmin');
		Route::post('/login','Logincontroller@postLoginadmin');
		Route::get('/logout','Logincontroller@logoutadmin');
		});

		Route::get('dang-ky','Registercontroller@getregister');
		Route::post('dang-ky','Registercontroller@postregister');

		Route::get('/xac-nhan-tai-khoan','Registercontroller@verifyaccount')->name('verify.account');

		Route::get('dang-nhap','Logincontroller@getLogin')->name('dang-nhap');;
		Route::post('dang-nhap','Logincontroller@postLogin');

		Route::get('dang-xuat','Logincontroller@logout');

		Route::get('/lay-lai-mat-khau','ForgotPasswordController@formlaylaipass');
		Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendcodelaylaipass');

		Route::get('/Password/reset','ForgotPasswordController@resetpassword')->name('get.link.reset.password');
		Route::post('/Password/reset','ForgotPasswordController@saveresetpassword');
});

Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','Cartcontroller@getcart');
	Route::get('show','Cartcontroller@getshow');
	Route::get('delete/{id}','Cartcontroller@getdelete');
	Route::get('update','Cartcontroller@getupdate');
	Route::post('show','Cartcontroller@postcomplete');
});

Route::group(['namespace'=>'User'],function(){

	Route::group(['prefix'=>'User'],function(){
		Route::get('/home','Usercontroller@home')->name('User.home');

		Route::get('/infor','Usercontroller@getinfor')->name('User.infor');
		Route::post('/infor','Usercontroller@saveinfor');

		Route::get('/password','Usercontroller@updatepassword')->name('User.password');
		Route::post('/password','Usercontroller@savepassword');
		});
});

Route::group(['namespace'=>'Backend'],function(){

	Route::group(['prefix'=>'admin'],function(){

			Route::get('home','Usercontroller@tongquang');
			Route::get('kho','Usercontroller@kho')->name('kho');
			Route::post('notify','Notifycontroller@notify')->name('notify');

		Route::group(['prefix'=>'category'],function(){
			Route::get('/',['as'=>'admin.cate.list','uses'=>'AdminCategoryController@listcate']);
			Route::get('add','AdminCategoryController@getaddcate');
			Route::post('add','AdminCategoryController@postaddcate');
			Route::get('edit/{id}','AdminCategoryController@getedit');
			Route::post('edit/{id}','AdminCategoryController@postedit');
			Route::get('delete/{id}','AdminCategoryController@getdelete');
		});
		Route::group(['prefix'=>'product'],function(){
			Route::get('/',['as'=>'admin.cate.pro','uses'=>'AdminProductController@listProduct']);
			Route::get('action/{action}/{id}','AdminProductController@action')->name('admin.product.action');
			Route::post('add-img/{id}','AdminProductController@addimg');
			Route::get('add','AdminProductController@getadd');
			Route::post('add','AdminProductController@postadd');
			Route::get('edit/{id}','AdminProductController@getedit');
			Route::post('edit/{id}','AdminProductController@postedit');
			Route::get('delete/{id}','AdminProductController@getdelete');
			Route::post('getimg','AdminProductController@get_imgdetails')->name('getimg');
			Route::get('delimg/{id}','AdminProductController@getdelimg')->name('admin.product.delimg');
	    });
		Route::group(['prefix'=>'user'],function(){
		Route::get('/','USercontroller@index')->name('admin.user.index');
		Route::get('/pagination/fetch_data', 'USercontroller@fetch_data');
		});
		Route::group(['prefix'=>'transaction'],function(){
		Route::get('/','Admintransactioncontroller@index')->name('admin.transaction.index');
		Route::get('/view{id}','Admintransactioncontroller@vieworder')->name('admin.transaction.index');
		Route::get('/active/{id}','Admintransactioncontroller@activetransaction');
		});
	});
});
