<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }
    
    protected function guard(){
        return Auth::guard('user');
    }
    
    public function showRegistrationForm(){
        return view('user.auth.register');
    }

    //データ入力バリデーション
    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'furigana' => ['required', 'string', 'max:50'],
        'sex' => ['required'],
        'district' => ['required', 'max:50'],
        'birth_date'=> ['required'],
        'age' => ['required'],
        'address' => ['required', 'max:50'],
        'phone_number' => ['required', 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}$/'],
        'ec_phone_number' => ['required', 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}$/'],
        'ec_name' => ['required', 'max:50'],
        'ec_address' => ['required', 'max:50'],
        'relative_name1' => ['required', 'max:50'],
        'relative_name2' => ['required', 'max:50'],
        'relative_name3' => ['required', 'max:50'],
        'special_request' => ['required', 'max:250'],
        'disclosure_permission' => ['required'],
    ];
    protected $messages = [
        'name.required' => 'お名前を入力してください。',
        'name.max' => 'お名前は50文字以内で入力してください。',
        'email.required' => 'E-mailアドレスを入力してください。',
        'email.email' => '正しいE-mailアドレスを入力してください。',
        'email.max' => 'E-mailアドレスは255文字以内で入力してください。',
        'email.unique' => 'そのメールアドレスは既に登録されています。',
        'password.required' => 'パスワードを入力してください。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.confirmed' => '入力されたパスワードが一致しません。',            
        'furigana.required' => 'ふりがなを入力してください。',
        'furigana.max' => 'ふりがなは50文字以内で入力してください。',
        'sex.required' => '性別を選択してください。',
        'district.required' => '居住行政区を入力してください。',
        'district.max' => '居住行政区は50文字内で入力してください。',
        'birth_date.required' => '生年月日を入力してください。',
        'age.required' => '年齢を入力してください。',
        'address.required' => '住所を入力してください。',
        'address.max' => '住所は50文字以内で入力してください。',
        'phone_number.required' => '電話番号を入力してください。',
        'phone_number.regex' => '電話番号は半角数字と半角ハイフンで入力してください。',
        'ec_phone_number.required' => '緊急連絡先の電話番号を入力してください。',
        'ec_phone_number.regex' => '電話番号は半角数字と半角ハイフンで入力してください。',
        'ec_name.required' => '緊急連絡先の氏名を入力してください。',
        'ec_name.max' => '緊急連絡先の氏名は50文字以内で入力してください。',
        'ec_address.required' => '緊急連絡先の住所を入力してください。',
        'ec_address.max' => '緊急連絡先の住所は50文字以内で入力してください。',
        'relative_name1.required' => '親族氏名を入力してください。',
        'relative_name1.max' => '親族氏名は50文字以内で入力してください。',
        'relative_name2.required' => '親族氏名を入力してください。',
        'relative_name2.max' => '親族氏名は50文字以内で入力してください。',
        'relative_name3.required' => '親族氏名を入力してください。',
        'relative_name3.max' => '親族氏名は50文字以内で入力してください。',
        'special_request.required' => '負傷・疾病の状況、おくすり手帳の内容及び特別な要望を入力してください。',
        'special_request.max' => '負傷・疾病の状況、おくすり手帳の内容及び特別な要望は250文字以内で入力してください。',
        'disclosure_permission.required' => '安否確認のための身元開示許可を設定してください。'    
    ];
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->messages, $this->rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    
        $user = new User();
        //fillableで指定した項目だからfillメソッドが使える。
        $user->fill($data);
        //パスワードのみ改めてハッシュ化する
        $user->password = Hash::make($data['password']);
        $user->id_for_qrcode = Str::uuid();
        $user->save();
        return $user;
    }
}
