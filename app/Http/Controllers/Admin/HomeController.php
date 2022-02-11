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
    
    private static $evacuees_here = [];
    public function list(Request $request)
    {
        // return view('/posts/', compact('evacuees_here'));
        
        $result = false;
        $user = User::where('uuid', $request->uuid)->first();
    
        if(!is_null($user)) {
    
            array_unshift($evacuees_here, $user);
            print($user);
            $result = true;
    
        }
    
        return [
            'result' => $result,
            'user' => $user,
            
        ];

    }

}