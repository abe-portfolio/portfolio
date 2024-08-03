@extends('layouts.app')

@section('content')
<div class="contact_wrap">
    <h1 class="contact_wrap_h"><b>●お問い合わせフォーム</b></h1>
</div>

<!-- <form class="contact_form" method="POST" action="{{ route('contact.submit') }}"> -->
<form class="contact_form" method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div class="contact_input_wrap">
        <label class="contact_area" for="email">メールアドレス</label>
        <input class="contact_form" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <div class="contact_error">{{ $message }}</div>
        @enderror
    </div>

    <div class="contact_input_wrap">
        <label class="contact_area" for="body">お問い合わせ内容</label>
        <textarea class="contact_form" id="body" name="body" required>{{ old('body') }}</textarea>
        @error('body')
            <div class="contact_error">{{ $message }}</div>
        @enderror
    </div>

    <div class="contact_submit_wrap">
        <button class="contact_submit_btn" type="submit">送信</button>
    </div>
</form>

<form class="contact_btn_form" method="POST" action="{{ route('contact.cancel') }}">
    @csrf
    <div class="contact_cancel_btn_wrap">
        <button class="contact_cancel_btn" type="submit">キャンセル</button>
    </div>
</form>

@endsection