@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="list-group">
        <a class="list-group-item" href="/user/edit">登録情報編集</a>
        <a class="list-group-item" href="/user/show_qrcode">QRコード表示</a>
    </div>
    <div class="center-block">
        <table class="table">
            
            <tr>
                <th class="text-center">E-mailアドレス</th>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            <tr>
            <tr>
                <th class="text-center">お名前</th>
                <td>{{ Auth::user()->name }}</td>
            </tr>
                <th class="text-center">ふりがな</th>
                <td>{{ Auth::user()->furigana }}</td>
            </tr>
            <tr>
                <th class="text-center">性別</th>
                <td>{{ Auth::user()->sex }}</td>
            </tr>
            <tr>
                <th class="text-center">居住行政区</th>
                <td>{{ Auth::user()->district }}</td>
            </tr>
                <tr>
                <th class="text-center">生年月日</th>
                <td>{{ Auth::user()->birth_date }}</td>
            </tr>
            </tr>
            <tr>
                <th class="text-center">年齢</th>
                <td>{{ Auth::user()->age }}</td>
            </tr>
            <tr>
                <th class="text-center">住所</th>
                <td>{{ Auth::user()->address }}</td>
            </tr>
            <tr>
                <th class="text-center">電話番号</th>
                <td>{{ Auth::user()->phone_number }}</td>
            </tr>
            <tr>
                <th class="text-center">緊急連絡先の氏名</th>
                <td>{{ Auth::user()->ec_name }}</td>
            </tr>
            <tr>
                <th class="text-center">緊急連絡先の住所</th>
                <td>{{ Auth::user()->ec_address }}</td>
            </tr>
            <tr>
                <th class="text-center">緊急連絡先の電話番号</th>
                <td>{{ Auth::user()->ec_phone_number }}</td>
            </tr>
            <tr>
                <th class="text-center">親族氏名１</th>
                <td>{{ Auth::user()->relative_name1 }}</td>
            </tr>
            <tr>
                <th class="text-center">親族氏名２</th>
                <td>{{ Auth::user()->relative_name2 }}</td>
            </tr>
            <tr>
                <th class="text-center">親族氏名３</th>
                <td>{{ Auth::user()->relative_name3 }}</td>
            </tr>
            <tr>
                <th class="text-center">負傷・疾病の状況、おくすり手帳の内容及び特別な要望</th>
                <td>{{ Auth::user()->special_request }}</td>
            </tr>
            <tr>
                <th class="text-center">安否確認のための身元開示許可</th>
                <td>{{ Auth::user()->disclosure_permission }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection