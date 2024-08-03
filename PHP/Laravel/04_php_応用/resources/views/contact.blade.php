@include('header')
<script>
  $(function(){
    $('.header').addClass('black-contact');
  });

  @if ($errors->any())
    alert("{{ implode('\n', $errors->all()) }}");
  @elseif (session()->has('success'))
    alert("{{ session()->get('success') }}");
  @endif
    </script>

<body>

<div class="contact">
    
        <form action="/confirm" method="POST">
            {{ csrf_field() }}
            
            <h4>お問い合わせ</h4>
        <div class="contentsForm">
          <p id="word">下記の項目をご記入の上送信ボタンを押してください</p>
          <p>送信いただいた件につきましては、当社より折り返しのご連絡を差し上げます。</p>
          <p>なお、ご連絡までに、お時間をいただく場合もございますので予めご了承ください。</p>
          <p><span>*</span>は必須項目となります。</p>

          <dl>
              <dt>
              <label for="name">氏名</label>
              <span class="span">*</span>
            </dt>
            @if ($errors->has('name'))
            <p class="errorsText">{{$errors->first('name')}}</p>
            @endif
            <dd><input type="text" id="name" name="name" placeholder="山田太郎" value="{{ old('name') }}"></dd>
          </dl>
          <dl>
            <dt>
            <label for="kana">フリガナ</label>
            <span class="span">*</span>
            </dt>
            @if ($errors->has('kana'))
            <p class="errorsText">{{$errors->first('kana')}}</p>
            @endif
            <dd><input type="text" id="kana" name="kana" value="{{ old('kana') }}" placeholder="ヤマダタロウ"> </dd>
          </dl>

          <dl>
            <dt>
              <label for="tel">電話番号</label>
            </dt>
            @if ($errors->has('tel'))
            <p class="errorsText">{{$errors->first('tel')}}</p>
            @endif
            <dd><input type="text" id="tel" name="tel" placeholder="09012345678" value="{{ old('tel') }}"></dd>
          </dl>
          <dl>
            <dt>
              <label for="address">メールアドレス</label>
              <span class="span">*</span>
            </dt>
            @if ($errors->has('address'))
            <p class="errorsText">{{$errors->first('address')}}</p>
            @endif
          <dd><input type="text" id="address" name="address" placeholder="test@test.co.jp" value="{{ old('address') }}"></dd>
          </dl>

          <h3 class="contact-h3">お問い合わせ内容をご記入ください<span class="span">*</span></h3>
          <dl>
          @if ($errors->has('content'))
            <p class="errorsText">{{$errors->first('content')}}</p>
            @endif
          <textarea type="textarea" id="content" name='content' class="textarea" rows="7">{{ old('content') }}</textarea>
</dl>

<input type="hidden" name="submitted" value="true">
            <input id="button" class="button" type="submit" value="送信" >
        </div>
      </form>
    </div>
      <table>

        <tr>
          <th>id</th>
          <th>氏名</th>
          <th>フリガナ</th>
          <th>電話番号</th>
          <th>メールアドレス</th>
          <th>お問い合わせ</th>
          <th>送信日時</th>
          <th></th>
          <th></th>
        </tr>

        <?php try {?>
        @foreach($contacts as $contact)
        <tr>
          <th>{{ $contact->id}}</th>
          <th>{{ $contact->name}}</th>
          <th>{{ $contact->kana}}</th>
          <th>{{ $contact->tel}}</th>
          <th>{{ $contact->email}}</th>
          <th>{{ $contact->body}}</th>
          
          <!-- <th>{{ $contact->created_at}}</th> -->
          <td><a href="/edit/{{$contact->id}}"><button type="button" class="btn btn-primary">編集</button></a></td>
          <td><form action="delete/{{$contact->id}}" method="post">
            {{ csrf_field()}}
            <input type="submit" class="btn-dell" value="削除" onclick="return confirm('本当に削除しますか？')">
          </form>
          </td>
        </tr>
        @endforeach
<?php
} catch (PDOException $e) {
  echo "接続失敗しました。".$e->getMessage();
  $dbh->rollback();
  exit();
}
?>



      </table>


  @include('footer')
  
  </html>
