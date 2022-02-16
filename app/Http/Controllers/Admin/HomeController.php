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

    public function index(User $user)
    {
        return view('admin.home');
    }
    
    public function examineUser(Request $request)
    {

        //QRコードのUUIDに一致するユーザを抽出
        $user = User::where('id_for_qrcode', $request->uuid)->first();
        
        //ユーザが存在すれば
        if(!is_null($user)) {
    
            //ページの避難者名称をUserのshelterカラムに設定
            $user->shelter = $request->shelter;
            $user->save();
        }
        //今入場した避難者を返す
        return ['name' => $user->name];
    }
    
    //特定のshelterにいる避難者たちのレコードを返す
    public function list(Request $request){
        $evacuees_in_the_shelter = User::where('shelter', $request->input('shelter'))->get();
        //避難者リストページへ
        return view('admin.evacuee.list', compact('evacuees_in_the_shelter'));
    }
    
    //特定のIDの避難者レコードを返す
    public function detail(User $evacuee){
        return view('admin.evacuee.detail', compact('evacuee'));
    }
}