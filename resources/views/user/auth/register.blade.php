@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認のためもう一度入力してください') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="new-password">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="furigana" class="col-md-4 col-form-label text-md-right">{{ __('ふりがな') }}</label>

                            <div class="col-md-6">
                                <input id="furigana" type="tel" class="form-control @error('furigana') is-invalid @enderror" name="furigana" value="{{ old('furigana') }}" autocomplete="furigana" placeholder="">

                                @error('furigana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Sex" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="form-check form-check-inline">                
                                <input class="form-check-input" type="radio" name="sex" id="SexRadio1" value="男性">
                                <label class="form-check-label" for="radio">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="SexRadio2" value="女性">
                                <label class="form-check-label" for="radio">女性</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="SexRadio3" value="その他">
                                <label class="form-check-label" for="radio">その他</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="SexRadio4" value="回答しない">
                                <label class="form-check-label" for="radio">回答しない</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('居住行政区') }}</label>

                            <div class="col-md-6">
                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" required autocomplete="district">

                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('生年月日') }}</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="age">
                                    <option value="">-----</option>
                                    @for ($i = 0; $i <= 130; $i++)
                                        <option value="{{ $i }}歳">{{ $i }}歳</option>
                                    @endfor
                                </select>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ec_name" class="col-md-4 col-form-label text-md-right">{{ __('緊急連絡先氏名') }}</label>

                            <div class="col-md-6">
                                <input id="ec_name" type="text" class="form-control @error('ec_name') is-invalid @enderror" name="ec_name" value="{{ old('ec_name') }}" required autocomplete="ec_name">

                                @error('ec_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ec_address" class="col-md-4 col-form-label text-md-right">{{ __('緊急連絡先住所') }}</label>

                            <div class="col-md-6">
                                <input id="ec_address" type="text" class="form-control @error('ec_address') is-invalid @enderror" name="ec_address" value="{{ old('ec_address') }}" required autocomplete="ec_address">

                                @error('ec_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ec_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('緊急連絡先電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="ec_phone_number" type="text" class="form-control @error('ec_phone_number') is-invalid @enderror" name="ec_phone_number" value="{{ old('ec_phone_number') }}" required autocomplete="ec_phone_number">

                                @error('ec_phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="relative_name1" class="col-md-4 col-form-label text-md-right">{{ __('親族氏名１') }}</label>

                            <div class="col-md-6">
                                <input id="relative_name1" type="text" class="form-control @error('relative_name1') is-invalid @enderror" name="relative_name1" value="{{ old('relative_name1') }}" required autocomplete="relative_name1">

                                @error('relative_name1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="relative_name2" class="col-md-4 col-form-label text-md-right">{{ __('親族氏名２') }}</label>

                            <div class="col-md-6">
                                <input id="relative_name2" type="text" class="form-control @error('relative_name2') is-invalid @enderror" name="relative_name2" value="{{ old('relative_name2') }}" required autocomplete="relative_name2">

                                @error('relative_name2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="relative_name3" class="col-md-4 col-form-label text-md-right">{{ __('親族氏名３') }}</label>

                            <div class="col-md-6">
                                <input id="relative_name3" type="text" class="form-control @error('relative_name3') is-invalid @enderror" name="relative_name3" value="{{ old('relative_name3') }}" required autocomplete="relative_name3">

                                @error('relative_name3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="special_request" class="col-md-4 col-form-label text-md-right">{{ __('負傷・疾病の状況、おくすり手帳の内容及び特別な要望') }}</label>

                            <div class="col-md-6">
                                <input id="special_request" type="text" class="form-control @error('special_request') is-invalid @enderror" name="special_request" value="{{ old('special_request') }}" required autocomplete="special_request">

                                @error('special_request')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="disclosure_permission" class="col-md-4 col-form-label text-md-right">{{ __('安否確認のための身元開示許可') }}</label>

                            <div class="col-md-6">
                                 <div class="form-check form-check-inline">                
                                    <input class="form-check-input" type="radio" name="disclosure_permission" id="PermissionRadio1" value="許可する">
                                    <label class="form-check-label" for="radio">許可する</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="disclosure_permission" id="PermissionRadio2" value="許可しない">
                                    <label class="form-check-label" for="radio">許可しない</label>
                                </div>         
                                @error('disclosure_permission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection