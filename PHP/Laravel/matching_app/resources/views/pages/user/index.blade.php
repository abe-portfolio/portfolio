  @extends('layouts.app')

  @section('content')
<div class="p-user-index">
  <div class="tphoto">

    @if(!is_null($user))
    <img src="{{ asset($user->img_url) }}" title="uphoto" alt="User Photo" class="user_photo"/>
    <!-- <img src="{{ asset('storage/' . $user->img_url) }}" title="uphoto" alt="User Photo" class="user_photo"/> -->

    <div class="tname"><p class="p_tname">ユーザー名：</p>{{ $user->name }}</div>
    @endif
  </div>

  <div class="tcontrols">
    <div class="container">
      <div class="row">
          <!-- Nope -->
          <div class="col-md-6 mb-1">
              @if ($user)
                <form action="{{ route('swipes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                    <input type="hidden" name="is_like" value="0">

                    <button class="tno" type="submit">
                      <i class="fa fa-xmark fa-3x" aria-hidden="true"></i>
                    </button>
                </form>
              @endif
          </div>

          <!-- Like -->
          <div class="col-md-6 mb-1">
              @if ($user)
                <form action="{{ route('swipes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                    <input type="hidden" name="is_like" value="1">

                    <button class="tyes" type="submit">
                      <i class="fa fa-heart fa-3x" aria-hidden="true"></i>
                    </button>
                </form>
            @endif
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
