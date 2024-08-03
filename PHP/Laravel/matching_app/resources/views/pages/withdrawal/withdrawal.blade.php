@extends('layouts.app')

@section('content')
<div class="delete_wrap">
    <h1 class="delete_wrap_h"><b>●退会手続き</b></h1>
    <p class="delete_wrap_p">退会するとアカウントは削除されます。</p>
</div>

<form class="del_btn_form" method="POST" action="{{ route('user.destroy') }}">
    @csrf
    @method('DELETE')
    <button class="del_btn" type="submit"><b>退会する</b></button>
</form>

<form class="del_btn_form" method="POST" action="{{ route('user.destroy_cancel') }}">
    @csrf
    <button class="del_cancel_btn" type="submit">キャンセル</button>
</form>
@endsection