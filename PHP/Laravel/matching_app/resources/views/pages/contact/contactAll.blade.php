@extends('layouts.app')

@section('content')
<div class="contactAll_wrap">
    <h1 class="contactAll_wrap_h"><b>●お問い合わせ一覧</b></h1>
</div>

<div class="contactAll">
    @if ($bodys->isEmpty())
    <div class="noData">
        <p>表示データなし</p>
    </div>
    @else
        <table class="a_contact_table">
            <thead>
                <tr class="a_contact_tr">
                    <th class="a_contact_th th_contact_del"><b>詳細</b></th>
                        <th class="a_contact_th th_contact_id"><b>ID</b></th>
                        <th class="a_contact_th th_contact_email"><b>メールアドレス</b></th>
                        <th class="a_contact_th th_contact_time"><b>送信日時</b></th>
                        <th class="a_contact_th th_contact_body"><b>問い合わせ内容</b></th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($bodys as $body)
                    <tr class="a_contact_tr">
                        <td class="a_contact_td td_contact_del">
                            <form action="{{ route('contact.detail') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $body->id }}">
                                <button type="submit">詳細</button>
                            </form>
                        </td>
                        <td class="a_contact_td td_contact_id">{{ $body->id }}</td>
                        <td class="a_contact_td td_contact_email">{{ $body->email }}</td>
                        <td class="a_contact_td td_contact_time">{{ $body->updated_at }}</td>
                        <td class="a_contact_td td_contact_body">{{ $body->body }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection