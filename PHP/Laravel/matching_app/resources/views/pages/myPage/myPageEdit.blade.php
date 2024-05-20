@extends('layouts.app')

@section('content')

<style>
.tbg {
    height: 900px;
    width: 400px;
    background-color: #fff;
    margin: 0 auto;
    border: 1px solid #c0c0c0;
}
</style>


<div class="edit_wrap">
    <h1 class="edit_wrap_h"><b>●マイページ</b></h1>
</div>


<form method="POST" action="{{ route('mypage.update', Auth::user()->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mypageEdit_area">
        <label class="edit_area_name" for="profile_image">◆プロフィール画像</label>
        <input id="profile_image" type="file" name="profile_image">
        @error('profile_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if (Auth::user()->img_url)
            <div>
                <!-- <img id="now_profile_image" src="{{ asset('storage/'.Auth::user()->img_url) }}" alt="プロフィール画像"> -->
                <img id="now_profile_image" src="{{ asset($user->img_url) }}" alt="プロフィール画像">

            </div>
        @endif
    </div>

    <div class="mypageEdit_area">
        <label class="edit_area_name" for="name">◆氏名</label>
        <input class="edit_form" id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mypageEdit_area">
        <label class="edit_area_name" for="email">◆メールアドレス</label>
        <input class="edit_form" id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mypageEdit_area">
        <label class="edit_area_name" for="password">◆新パスワード</label>
        <input class="edit_form" id="password" type="password" name="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mypageEdit_area">
        <label class="edit_area_name" for="password-confirm">◆新パスワード（確認用）</label>
        <input class="edit_form" id="password-confirm" type="password" name="password_confirmation" required>
    </div>

    <div class="edit_btn_wrap">
        <button class="edit_btn" type="submit"><b>変更する</b></button>
    </div>
</form>

<form class="edit_btn_form" method="POST" action="{{ route('mypage.update_cancel') }}">
    @csrf
    <div class="edit_cancel_btn_wrap">
        <button class="edit_cancel_btn" type="submit">キャンセル</button>
    </div>
</form>
@endsection