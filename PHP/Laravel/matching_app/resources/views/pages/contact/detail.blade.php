@extends('layouts.app')

@section('content')
<div class="admin_wrap">
    <h1 class="admin_wrap_h"><b>●お問い合わせ詳細</b></h1>
</div>

<table class="a_detail_table">
    <tbody>
        <tr class="detail_wrap">
            <th class="detail_title a_detail_title_id">ID</th>
            <td class="detail_data a_detail_id">{{ $body->id }}</td>
        </tr>
        <tr class="detail_wrap">
            <th class="detail_title a_detail_title_email">メールアドレス</th>
            <td class="detail_data a_detail_email">{{ $body->email }}</td>
        </tr>
        <tr class="detail_wrap">
            <th class="detail_title a_detail_title_time">送信日時</th>
            <td class="detail_data a_detail_time">{{ $body->created_at }}</td>
        </tr>
        <tr class="detail_wrap">
            <th class="detail_title a_detail_title_body">問い合わせ内容</th>
            <td class="detail_data a_detail_body">{{ $body->body }}</td>
        </tr>
    </tbody>
</table>


<form class="detail_cancel_btn_form" action="{{ route('return.contacts') }}">
    @csrf
    <div class="detail_cancel_btn_wrap">
        <button class="detail_cancel_btn" type="submit">一覧へ戻る</button>
    </div>
</form>
@endsection