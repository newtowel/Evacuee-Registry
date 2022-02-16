@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="center-block">
        <table class="table">
            
            <tr>
                <th class="text-right">E-mailアドレス</th>
                <td>{{ $evacuee->email }}</td>
            </tr>
            <tr>
            <tr>
                <th class="text-right">お名前</th>
                <td>{{ $evacuee->name }}</td>
            </tr>
                <th class="text-right">ふりがな</th>
                <td>{{ $evacuee->furigana }}</td>
            </tr>
            <tr>
                <th class="text-right">性別</th>
                <td>{{ $evacuee->sex }}</td>
            </tr>
            <tr>
                <th class="text-right">居住行政区</th>
                <td>{{ $evacuee->district }}</td>
            </tr>
                <tr>
                <th class="text-right">生年月日</th>
                <td>{{ $evacuee->birth_date }}</td>
            </tr>
            </tr>
            <tr>
                <th class="text-right">年齢</th>
                <td>{{ $evacuee->age }}</td>
            </tr>
            <tr>
                <th class="text-right">住所</th>
                <td>{{ $evacuee->address }}</td>
            </tr>
            <tr>
                <th class="text-right">電話番号</th>
                <td>{{ $evacuee->phone_number }}</td>
            </tr>
            <tr>
                <th class="text-right">電話番号</th>
                <td>{{ $evacuee->phone_number }}</td>
            </tr>
            <tr>
                <th class="text-right">緊急連絡先の氏名</th>
                <td>{{ $evacuee->ec_name }}</td>
            </tr>
            <tr>
                <th class="text-right">緊急連絡先の住所</th>
                <td>{{ $evacuee->ec_address }}</td>
            </tr>
            <tr>
                <th class="text-right">緊急連絡先の電話番号</th>
                <td>{{ $evacuee->ec_phone_number }}</td>
            </tr>
            <tr>
                <th class="text-right">親族氏名１</th>
                <td>{{ $evacuee->relative_name1 }}</td>
            </tr>
            <tr>
                <th class="text-right">親族氏名２</th>
                <td>{{ $evacuee->relative_name2 }}</td>
            </tr>
            <tr>
                <th class="text-right">親族氏名３</th>
                <td>{{ $evacuee->relative_name3 }}</td>
            </tr>
            <tr>
                <th class="text-right">負傷・疾病の状況、おくすり手帳の内容及び特別な要望</th>
                <td>{{ $evacuee->special_request }}</td>
            </tr>
            <tr>
                <th class="text-right">安否確認のための身元開示許可</th>
                <td>{{ $evacuee->disclosure_permission }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection