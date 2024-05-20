@include('header')
<script>
        $(function(){
            $('.header').addClass('black-contact');
        });
</script>

    <div>
      <div class="contact-box">
        <form action="/complete" method="POST" class="confi-form"> 
        {{ csrf_field() }}
        <div class="confirm">
        <div class="confirmForm">
          <h4>お問い合わせ</h4>
          <div id="word">
          <p>下記の内容をご確認の上送信ボタンを押してください</p>
          <p>内容を訂正する場合は戻るを押してください。</p>
        </div>
          <div id="contents">
            <label>氏名</label>
          <p>{!! htmlspecialchars($name) !!}</p>
          <input name="name" value="{{$name}}" type="hidden">
       
        <label>フリガナ</label>
        
          <p>{!! htmlspecialchars($kana) !!}</p>
          <input name="kana" value="{{$kana}}" type="hidden">
       
        <label>電話番号</label>
        
          <p>{!! htmlspecialchars($tel) !!}</p>
          <input name="tel" value="{{$tel}}" type="hidden">
        
      
         <label>メールアドレス</label>
     
           <p>{!! htmlspecialchars($address) !!}</p>
        <input name="address" value="{{$address}}" type="hidden">
      
    
    
      <label> お問い合わせ内容</label>
              
        <p>{!! htmlspecialchars($content) !!}</p>
        <input name="content" value="{{$content}}" type="hidden">
</div>
      <div id="button">
      <input type="submit" VALUE="送信" class="send"> 
      <a href="/contact"> <input type='submit' VALUE="戻る" class="return"> </a>
    </div>
  </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>