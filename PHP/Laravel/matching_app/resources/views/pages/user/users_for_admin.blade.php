@extends('layouts.app')

@section('content')
<div class="admin_wrap">
    <h1 class="admin_wrap_h"><b>●ユーザ一覧</b></h1>
</div>

<table class="a_users_table">
    <thead>
        <tr class="a_users_tr">
            <th class="a_users_th th_del"><b>削除</b></th>
            <th class="a_users_th th_id"><b>ID</b></th>
            <th class="a_users_th th_uName"><b>ユーザー名</b></th>
            <th class="a_users_th th_email"><b>メールアドレス</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="a_users_tr">
                <td class="a_users_td td_del">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
                <td class="a_users_td td_id">{{ $user->id }}</td>
                <td class="a_users_td td_uName">{{ $user->name }}</td>
                <td class="a_users_td td_email">{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
