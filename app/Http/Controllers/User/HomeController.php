<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Milon\Barcode\DNS2D;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    // $auths = Auth::user();

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('user.home');
    }
    
    public function show_qrcode(){
        // $qrCode = DNS2D::getBarcodePNG('4445645656', 'QRCODE');
        return view('user.show_qrcode');
    }
    
    public function edit(){
        return view('user.edit', ['user' => Auth::user()]);
    }
    public function update(Request $request){
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/home');
    }
}
