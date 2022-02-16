@extends('layouts.admin.app')

@section('content')
<div class="container">
    @isset($evacuees_in_the_shelter)
    <div class="center-block">
        @foreach($evacuees_in_the_shelter as $evacuee)
        <h1>入場済み避難者</h1>
        <table class="table table-bordered table-hover table-sm text-center caption-top">
            <thead class="thead-light">
                <tr>
                    <th scope="col">氏名</th>
                    <th scope="col">ふりがな</th>
                </tr>
            </thead>
            <tbody>
                <tr onclick="window.open('/admin/evacuee/detail/{{$evacuee->id}}')"> 
                    <td scope="row">{{$evacuee->name}}</td>
                    <td scope="row">{{$evacuee->furigana}}</td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </table>
    @else
    <span class="text-center">避難者はいません</span>
    </div>
    @endisset
</div>
@endsection