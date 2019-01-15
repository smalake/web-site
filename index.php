<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="description" content="Webプログラマを目指して勉強しているプログラミング初心者が、勉強がてら作ったWebアプリケーションを公開してます。公開中のアプリケーションはご自由にお使いください。">
        <title>Webアプリケーション置き場</title>
        <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/header.php'); ?>
    </head>
    <body>
        <div id="wrap">
            <header>
                <h1>おもちゃ箱</h1>
                プログラミング初心者が勉強がてら作ったWebアプリケーションが置いてあるWebサービスサイトです。<br>公開しているアプリケーションはご自由にお使いください。
            </header>
            
            <?php include($_SERVER['DOCUMENT_ROOT'].'/teishutsu/sidebar.php'); ?>
            
            <div class="main-top">
                <ul class="slider">
                    <li><a href="scheduler/"><img src="image/scheduler.png"></a></li>
                    <li><a href="uploader/"><img src="image/uploader.png"></a></li>
                    <li><a href="#"><img src="image/blog.png"></a></li>
                    <li><a href="https://twitter.com/"><img src="image/twitter.png"></a></li>
                    <li><a href="mail_form/"><img src="image/mail.png"></a></li>
                </ul>
                <ul class="thumb">
                    <li><img src="image/scheduler.png"></li>
                    <li><img src="image/uploader.png"></li>
                    <li><img src="image/blog.png"></li>
                    <li><img src="image/twitter.png"></li>
                    <li><img src="image/mail.png"></li>
                </ul>
            </div>
            
            <div class="main">
                <div class="update">
                    <h2>&emsp;更新履歴</h2>
                    <div class="update_frame">
                        <iframe src="update.html" width="600" height="200">
                            このページはiframe対応ブラウザでご覧ください。
                        </iframe>
                    </div>
                </div>
                <h2>&emsp;Webアプリ一覧</h2>
                &emsp;<a href="scheduler/">スケジューラ</a><br>
                <div class="description">簡単にユーザIDを取得可能。<br>自分で使うだけでなく、人と共有することで予定を合わせることも可能に。<br>シンプルに使えるスケジューラです。</div>
                <br>
                &emsp;<a href="uploader/">アップローダ</a><br>
                <div class="description">登録不要で使える簡易アップローダです。<br>ダウンロード用URLさえあれば誰でもどこからでもダウンロードできるので、<br>ちょっとしたファイルのやり取りに使えます。</div>
                <h2>&emsp;お問い合わせについて</h2>
                <div class="description">ページやアプリケーションに何かしら不具合や意見があった場合<br>気軽にお問い合わせフォームからご連絡ください。<br>返信はできるかわかりませんが、すべて確認はしております。<br>また、「こんなアプリケーションが欲しい！」のようなリクエストも大歓迎です。</div><br>
            </div>
            <footer>

            </footer>
        </div>
        <script type="text/javascript">
            $('.slider').slick({
                autoplay:true,
                autoplaySpeed:5000,
                dots:true,
                asNavFor: '.thumb',
            });
            $('.thumb').slick({
                asNavFor: '.slider',
                focusOnSelect: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false
            });
            $(function(){
                $('#main_menu p').on('click', function() {
                    $(this).next().slideToggle();
                    $(this).toggleClass("open");
                });
            });
            $(function() {
                $('.navToggle').click(function() {
                    $(this).toggleClass('active');

                    if ($(this).hasClass('active')) {
                        $('.globalMenuSp').addClass('active');
                    } else {
                        $('.globalMenuSp').removeClass('active');
                    }
                });
            });
        </script>
    </body>
</html>