<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }
    
    public function list(Request $request)
    {

        $evacuees_here = [];

        //QRコードのUUIDに一致するユーザを抽出
        $user = User::where('id_for_qrcode', $request->uuid)->first();
        
        //ユーザが存在すれば
        if(!is_null($user)) {
    
            //ページの避難者名称をUserのshelterカラムに設定
            $user->shelter = $request->shelter;
            $user->save();
        }
        //今入場した避難者とこれまで入場した避難者すべての集合を返す
        return compact('user');
    }
}