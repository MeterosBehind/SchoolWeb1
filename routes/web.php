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

Route::pattern('id', '[0-9]+');

# 首頁
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/home', 'HomeController@index')->name('home');

# 公告系統
Route::get('posts/' , 'PostsController@index')->name('posts.index');
Route::get('posts/create' , 'PostsController@create')->name('posts.create');
Route::post('posts' , 'PostsController@store')->name('posts.store');
Route::get('posts/{post}' , 'PostsController@show')->name('posts.show');
Route::get('posts/{post}/edit' , 'PostsController@edit')->name('posts.edit');
Route::patch('posts/{post}' , 'PostsController@update')->name('posts.update');
Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');
Route::get('downloadPfile/{pfile}' , 'PostsController@downloadPfile')->name('posts.downloadPfile');
Route::get('delPfile/{pfile}' , 'PostsController@delPfile')->name('posts.delPfile');

# 晨會文稿
Route::get('mornings/index','MorningsController@index')->name('mornings.index');
Route::get('mornings/create' , 'MorningsController@create')->name('mornings.create');
Route::post('mornings' , 'MorningsController@store')->name('mornings.store');
Route::get('mornings/{morning}' , 'MorningsController@show')->name('mornings.show');
Route::get('mornings/{morning}/edit' , 'MorningsController@edit')->name('mornings.edit');
Route::patch('mornings/{morning}' , 'MorningsController@update')->name('mornings.update');
Route::delete('mornings/{morning}', 'MorningsController@destroy')->name('mornings.destroy');
Route::get('mornings/{morning}/download' , 'MorningsController@txtDown')->name('mornings.txtDown');

//處室報告
Route::get('mornings/{morning}/createReport' , 'MorningsController@createReport')->name('mornings.createReport');
Route::post('mornings/storeReport' , 'MorningsController@storeReport')->name('mornings.storeReport');
Route::get('mornings/{morning}/editReport/{report_id}' , 'MorningsController@editReport')->name('mornings.editReport');
Route::patch('reports/{report}' , 'MorningsController@updateReport')->name('mornings.updateReport');
Route::delete('reports/{report}', 'MorningsController@destroyReport')->name('mornings.destroyReport');
Route::post('reports/addFile' , 'MorningsController@addFile')->name('mornings.addFile');
Route::get('downloadMfile/{mfile}' , 'MorningsController@downloadMfile')->name('mornings.downloadMfile');
Route::get('delMfile/{mfile}' , 'MorningsController@delMfile')->name('mornings.delMfile');

//管理介面
Route::group(['middleware' => 'admin'],function(){
//使用者管理
    Route::get('admin','AdminController@index')->name('admin.index');
    Route::post('admin/storeUser', 'AdminController@storeUser')->name('admin.storeUser');
    Route::get('admin/{user}/resetUser', 'AdminController@resetUser')->name('admin.resetUser');
    Route::get('admin/{user}/unactiveUser', 'AdminController@unactiveUser')->name('admin.unactiveUser');
    Route::patch('admin/{user}/updateUser' , 'AdminController@updateUser')->name('admin.updateUser');
    Route::get('admin/{user}/activeUser', 'AdminController@activeUser')->name('admin.activeUser');

//公告管理
    Route::get('admin/postAdmin','AdminController@postAdmin')->name('admin.postAdmin');
    Route::get('admin/{post}/post','AdminController@postDel')->name('admin.postDel');
//分類管理
    Route::post('admin/storeCategory', 'AdminController@storeCategory')->name('admin.storeCategory');
    Route::patch('admin/{category}/updateCategory' , 'AdminController@updateCategory')->name('admin.updateCategory');
//區塊管理
    Route::get('admin/linkAdmin', 'LinksController@index')->name('admin.linkAdmin');
    Route::post('admin/storeBlock', 'BlocksController@store')->name('admin.storeBlock');
    Route::patch('admin/{block}/Block' , 'BlocksController@update')->name('admin.updateBlock');
    Route::get('admin/{block}/Block', 'BlocksController@destroy')->name('admin.destroyBlock');
//連結管理
    Route::post('admin/storeLink', 'LinksController@store')->name('admin.storeLink');
    Route::patch('admin/{link}/Link' , 'LinksController@update')->name('admin.updateLink');
    Route::get('admin/{link}/Link', 'LinksController@destroy')->name('admin.destroyLink');
//會議管理
    Route::get('admin/reportAdmin','AdminController@reportAdmin')->name('admin.reportAdmin');
    Route::get('admin/{report}/report','AdminController@reportDel')->name('admin.reportDel');
//內容管理
    Route::get('admin/contentIndex','ContentController@index')->name('admin.contentIndex');
    Route::post('admin/ContentStore', 'ContentController@store')->name('admin.contentStore');
    Route::get('admin/{content}/contentEdit','ContentController@edit')->name('admin.contentEdit');
    Route::patch('admin/{content}/contentUpdate','ContentController@update')->name('admin.contentUpdate');
    Route::get('admin/{content}/contentDestroy', 'ContentController@destroy')->name('admin.contentDestroy');

//ckeditor及file manager
    Route::get('admin/fileAdmin', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('admin/fileAdmin/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');


});
//內容顯示
Route::get('contents/{content}' , 'ContentController@show')->name('content.show');

# 登入/登出
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//變更密碼
Route::get('resetPassword', 'ResetPasswordController@index')->name('resetPassword');
Route::post('updatePassword', 'ResetPasswordController@update')->name('updatePassword');




//Auth::routes();

