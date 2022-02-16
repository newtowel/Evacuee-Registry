@extends('layouts.user.app')
@section('content')
<div class="container">
    <div class="list-group">
        <a class="list-group-item" href="/user/home">登録情報表示</a>
        <a class="list-group-item" href="/user/edit">登録情報編集</a>
    </div>
    <div class="center-block">
        {!!DNS2D::getBarcodeHTML(Auth::user()->id_for_qrcode, 'QRCODE')!!}
    </div>
</div>
@endsection