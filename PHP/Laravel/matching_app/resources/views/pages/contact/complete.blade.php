@extends('layouts.app')

@section('content')
<div class="complete_wrap">
    <h1 class="complete_wrap_h"><b>●送信完了</b></h1>
</div>

<div class="complete_body">
    <p class="complete_text">お問い合わせありがとうございます。</p>

    <form class="complete_btn_form" method="POST" action="{{ route('return.mypage') }}">
        @csrf
        <div class="complete_btn_wrap">
            <button class="complete_btn" type="submit"><b>マイページへ戻る</b></button>
        </div>
    </form>
</div>


@endsection