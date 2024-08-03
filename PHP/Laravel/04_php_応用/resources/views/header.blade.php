<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Lesson Sample Site</title>
<meta name="description" content="Lesson Sample Site">
<link href="{{asset('/css/style.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script>
  $(function(){
    $(window).scroll(function () {
      var scroll = $(this).scrollTop();
      if ($(this).scrollTop()>53) {
        $('.header').addClass('black');
      } else if ($(this).scrollTop()<53) {
          $('.header').removeClass('black');
        }
      });

      $('.right').click(function(){
        $('.login').addClass('show').fadeIn();

      });
      $('body').dblclick(function(){
        $('.login').fadeOut();
        });



        $('.humberger-menu button').click(function(){
          $('.login').addClass('show').fadeIn();
          $('.humberger-menu').removeClass('menu-open');
          $()
        });

        $('.login').dblclick(function(){
          $('.login').fadeOut();
          });

        $('.humberger img').click(function(){
          $('.humberger-menu').toggleClass('menu-open');
        });


        $('.right').click(function(){
          $('.login-wrapper').addClass('show')

        });
        $('body').dblclick(function(){
          $('.login-wrapper').removeClass('show')
          });


          $('.humberger-menu button').click(function(){
            $('.login-wrapper').addClass('show')

          });
          $('body').dblclick(function(){
            $('.login-wrapper').removeClass('show')
            });


          $('.login').dblclick(function(){
            $('.login').fadeOut();
            });
          });
    $(function(){
  $('a[href^="#"]').click(function(){
    var adjust = 0;
    var speed = 400;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top + adjust;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});
</script>
</head>
<body>
    <div class="wrapper">
    <header class="header">
    <a href="/"><img src="{{asset('img/logo.png') }}" alt=""></a>



        



        <div class="center">
            <a href="#1">はじめに</a>
            <a href="#2">体験</a>
            <a href="/contact">お問い合わせ</a>
        </div>
        <button class="right">サインイン</button>

        <div class="humberger"><img src="{{asset('img/menu.png') }}" alt=""></div>

        <div class="humberger-menu">
          <div class="humberger-content">
            <a href="#1">はじめに</a>
            <a href="#2">体験</a>
            <a href="/contact">お問い合わせ</a>
          </div>
        <button class="humberger-sginin">サインイン</button>
        </div>
    </header>
    
    <div class="login-wrapper">
      <div class="login">
          <div class="content">
              <h3>ログイン</h3>
              <form action="" method="post">
                  <div class="mail-box">
                      <input type="text" name="mail" required  placeholder="メールアドレス">
                  </div>
                  <div>
                    <input type="password" name="pass" required placeholder="パスワード">
                  </div>
                  <input class="button" type="submit" value="送信">
                </form>
                <p></p>
            </div>
            <ul>
            <li><a href=""><img src="{{asset('img/twitter.png') }}"></a></li>
            <li><a href=""><img src="{{asset('img/fb.png') }}"></a></li>
            <li><a href=""><img src="{{asset('img/google.png') }}"></a></li>
            <li><a href=""><img src="{{asset('img/apple.png') }}"></a></li>
          </ul>
        </div>
      </div>
  </div>
<body>
