@include('header')
<script>
  $(function(){
    $('.header').addClass('black-contact');
  });
</script>
  <body>
    <div class="contact">
      <div class="contact-box">
        <form action="/editComplete" method="POST">
        
            {{ csrf_field() }}

          <h4>編集</h4>
          <h3 class="contact-h3">編集したい下記項目をご記入の上送信ボタンを押してください</h3>
          <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
          <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
          <p><span class="span">*</span>は必須項目となります。</p>
          <input type="hidden" id="id" name="id" value="{{ $user->id }}">

          <dl>
             <dt>
             <label for="name">氏名</label>
              <span class="span">*</span>         
            </dt>
            @if ($errors->has('name'))
            <p>{{$errors->first('name')}}</p>
            @endif
            <dd><input type="text" id="name" name="name" value="{{ $user->name }}"></dd>
          </dl>

          <dl> 
            <dt>
            <label for="kana">フリガナ</label>
            <span class="span">*</span>
            </dt>
            @if ($errors->has('kana'))
            <p>{{$errors->first('kana')}}</p>
            @endif
            <dd><input type="text" id="kana" name="kana" value="{{ $user->kana }}"> </dd>
          </dl>

          <dl> 
            <dt>
              <label for="tel">電話番号</label>
              <span class="span">*</span>
            </dt>
            @if ($errors->has('tel'))
            <p>{{$errors->first('tel')}}</p>
            @endif
            <dd><input type="text" id="tel" name="tel" value="{{ $user->tel }}"></dd>
          </dl>
          <dl> 
            <dt>
              <label for="address">メールアドレス</label>
              <span class="span">*</span>
            </dt>
            @if ($errors->has('address'))
            <p>{{$errors->first('address')}}</p>
            @endif
          <dd><input type="text" id="address" name="address"  value="{{ $user->email }}"></dd>
          </dl>

          <h3 class="contact-h3">お問い合わせ内容をご記入ください<span class="span">*</span></h3>
          @if ($errors->has('content'))
            <p>{{$errors->first('content')}}</p>
            @endif
          <textarea type="textarea" id="content" name='content' class="textarea" rows="7">{{ $user->body }}</textarea> 

          <input type="hidden" name="submitted" value="true">
            <input id="button" class="button" type="submit" value="送信" >
        </div>
      </form>
    </div>

  @include('footer')

  </html>