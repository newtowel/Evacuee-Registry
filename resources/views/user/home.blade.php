@extends('layouts.app')

@section('content')

<table class="table">
    <tr>
        <th class="text-right">E-mailアドレス</th>
        <td>{{ $auths->email }}</td>
    </tr>
    <tr>
    <tr>
        <th class="text-right">お名前</th>
        <td>{{ $auths->name }}</td>
    </tr>
        <th class="text-right">ふりがな</th>
        <td>{{ $auths->furigana }}</td>
    </tr>
    <tr>
        <th class="text-right">性別</th>
        <td>{{ $auths->sex }}</td>
    </tr>
    <tr>
        <th class="text-right">居住行政区</th>
        <td>{{ $auths->district }}</td>
    </tr>
        <tr>
        <th class="text-right">生年月日</th>
        <td>{{ $auths->birth_date }}</td>
    </tr>
    </tr>
    <tr>
        <th class="text-right">年齢</th>
        <td>{{ $auths->age }}</td>
    </tr>
    <tr>
        <th class="text-right">住所</th>
        <td>{{ $auths->address }}</td>
    </tr>
    <tr>
        <th class="text-right">電話番号</th>
        <td>{{ $auths->phone_number }}</td>
    </tr>
    <tr>
        <th class="text-right">電話番号</th>
        <td>{{ $auths->phone_number }}</td>
    </tr>
    <tr>
        <th class="text-right">緊急連絡先の氏名</th>
        <td>{{ $auths->ec_name }}</td>
    </tr>
    <tr>
        <th class="text-right">緊急連絡先の住所</th>
        <td>{{ $auths->ec_address }}</td>
    </tr>
    <tr>
        <th class="text-right">緊急連絡先の電話番号</th>
        <td>{{ $auths->ec_phone_number }}</td>
    </tr>
    <tr>
        <th class="text-right">親族氏名１</th>
        <td>{{ $auths->relative_name1 }}</td>
    </tr>
    <tr>
        <th class="text-right">親族氏名２</th>
        <td>{{ $auths->relative_name2 }}</td>
    </tr>
    <tr>
        <th class="text-right">親族氏名３</th>
        <td>{{ $auths->relative_name3 }}</td>
    </tr>
    <tr>
        <th class="text-right">負傷・疾病の状況、おくすり手帳の内容及び特別な要望</th>
        <td>{{ $auths->special_request }}</td>
    </tr>
    <tr>
        <th class="text-right">安否確認のための身元開示許可</th>
        <td>{{ $auths->disclosure_permission }}</td>
    </tr>
    
</table>

@endsection