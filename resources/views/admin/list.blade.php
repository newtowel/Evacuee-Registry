@extends('layouts.user.app')

@section('content')
<h1>入場済み避難者リスト</h1>
<div class="center-block">
    <table class="table">
        @foreach($evacuees_here as $evacuee_here)    
        <tr>
            <th class="text-right">{{$evacuee_here->name}}</th>
            <td>{{ $evacuee_here->furigana }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection