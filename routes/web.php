<?php
Route::redirect('/', 'user/login');

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        // Route::resource('home', 'HomeController', ['only' => 'home']);
        Route::get('home', 'HomeController@home'); //ユーザ情報確認
        Route::get('show_qrcode', 'HomeController@show_qrcode'); //QRコード確認
        Route::get('edit', 'HomeController@edit')->name('edit'); //ユーザ情報修正
        Route::put('edit', 'HomeController@update')->name('update'); //更新情報登録
        Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        // Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::get('home', 'HomeController@index'); //QRコード読み取り
        Route::post('home', 'HomeController@examineUser'); //ユーザ存在検証
        Route::get('evacuee/list', 'HomeController@list'); //入場済み避難者リスト表示
        Route::get('evacuee/detail/{evacuee}', 'HomeController@detail'); //選択した避難者の情報確認
        Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 
        
    });

});