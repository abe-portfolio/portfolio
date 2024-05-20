@extends('layouts.app')

@section('content')
<div class="mypage_wrap">
    <nav class="mypage_nav_wrap">
        <ul class="mypage_nav">
            <li class="mypage_li"><a href="{{ route('mypage.edit') }}" class="btn2 btn-malformation"><span>マイページ</span></a></li>
            <li class="mypage_li"><a href="{{ route('users.index') }}" class="btn2 btn-malformation"><span>マッチング</span></a></li>
            <li class="mypage_li"><a href="{{ route('user.delete') }}" class="btn2 btn-malformation"><span>退会</span></a></li>
            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
            <li class="mypage_li"><a href="{{ route('contact.page') }}" class="btn2 btn-malformation"><span>お問い合わせ</span></a></li>
            @endif
            @if(Auth::user()->role == 0)
            <li class="mypage_li"><a href="{{ route('users.for_admin') }}" class="btn2 btn-malformation"><span>ユーザー一覧</span></a></li>
            <li class="mypage_li"><a href="{{ route('contact.all') }}" class="btn2 btn-malformation"><span>問い合わせ一覧</span></a></li>
            @endif
        </ul>
    </nav>
</div>
@endsection