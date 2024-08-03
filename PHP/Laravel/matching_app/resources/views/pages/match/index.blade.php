@extends('layouts.app')

@section('content')
<div class="matches_wrap">
    <h1 class="matches_wrap_h"><b>●マッチしたユーザー</b></h1>
</div>
    @if ($matchedUsers)
        <div class="p-match-index">
            <div class="container">
                <div class="row">
                    @foreach($matchedUsers as $matchedUser)
                        <div class="col-md-12 mb-3">
                            <img src="{{ $matchedUser->toUser->img_url }}" class="rounded-circle" style="height: 70px; width: 70px; object-fit: cover;">
                            <!-- <a href="#" class="stretched-link ml-3" style="font-size: 16px;">{{ $matchedUser->toUser->name }}</a> -->
                            <a href="{{ route('chat.show',['id' => $matchedUser->toUser->id]) }}" class="stretched-link ml-3" style="font-size: 16px;">{{ $matchedUser->toUser->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p>マッチしたユーザーが存在しません</p>
    @endif
@endsection