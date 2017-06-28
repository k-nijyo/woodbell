<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="target-densitydpi=device-dpi, width=1050, maximum-scale=1.0, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/flexslider2/flexslider.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<!--&#91;if lt IE 9&#93;>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<!&#91;endif&#93;-->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/flexslider2/jquery.flexslider-min.js"></script>
<script>
$(document).ready(function(){
 
    $(".pageTop").hide();
     // ↑ページトップボタンを非表示にする
 
    $(window).on("scroll", function() {
 
        if ($(this).scrollTop() > 500) {
            // ↑ スクロール位置が500よりも小さい場合に以下の処理をする
            $('.pageTop').fadeIn("slow");
            // ↑ (500より小さい時は)ページトップボタンをスライドダウン
        } else {
            $('.pageTop').fadeOut("slow");
            // ↑ それ以外の場合の場合はスライドアップする。
        }
         
    // フッター固定する
 
        scrollHeight = $(document).height(); 
        // ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); 
        //　ウィンドウの高さ+スクロールした高さ→　現在のトップからの位置
        footHeight = $("footer").innerHeight();
        // フッターの高さ
                 
        if ( scrollHeight - scrollPosition  <= footHeight ) {
        // 現在の下から位置が、フッターの高さの位置にはいったら
        //  ".pageTop"のpositionをabsoluteに変更し、フッターの高さの位置にする        
            $(".pageTop").css({
                "position":"absolute",
                "bottom": footHeight
            });
        } else {
        // それ以外の場合は元のcssスタイルを指定
            $(".pageTop").css({
                "position":"fixed",
                "bottom": "0px"
            });
        }
    });
 
    // トップへスムーススクロール
    $('.pageTop a').click(function () {
        $('body,html').animate({
        scrollTop: 0
        }, 500);
        // ページのトップへ 500 のスピードでスクロールする
        return false;
     });
 
});
</script>

<script>
function slideSwitch() {
   var $active = $('#slide-top img.active');

   if ( $active.length == 0 ) $active = $('#slide-top img:last');

   var $next =  $active.next().length ? $active.next()
      : $('#slide-top img:first');

   $active.addClass('last-active');

   $next.css({opacity: 0.0})
      .addClass('active')
      .animate({opacity: 1.0}, 1500, function() {
           $active.removeClass('active last-active');
      });
}
$(function() {
   setInterval( "slideSwitch()", 3500 );
});
</script>

<script>
$(function(){
    // 画像透過
    $(document).ready(function(){
    $("img.pale").fadeTo(0,1);
    $("img.pale").hover(function(){
    $(this).fadeTo(100,0.7);
    },
    function(){
    $(this).fadeTo(200,1);
    });
    });
});
</script>

<script>
    // 家具詳細ページのスライダー
$(window).load(function() {
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        itemWidth: 165,
        itemMargin: 50,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: true,
        slideshow: false,
        smoothHeight: true,
        sync: "#carousel"
    });
});
$('#slider').flexslider({
        start: function() {
            modifySliderSize();
        },
        before: function() {
            modifySliderSize();
        },
        after: function() {
            modifySliderSize();
        }
     });
function modifySliderSize() {
    $('#slider .slides li').css('width','400px');
    $('#slider .slides li').css('height','350px');
    $('#slider .slides li img').css('margin','0 auto');
    $('#slider .slides li img').css('width','auto');
    $('#slider .slides li img').css('max-width','400px');
    $('#slider .slides li img').css('max-height','350px');

    $('#carousel .slides li').css('width','210px');
    $('#carousel .slides li').css('height','170px');
    $('#carousel .slides li img').css('margin','0 auto');
    $('#carousel .slides li img').css('width','auto');
    $('#carousel .slides li img').css('max-width','210px');
    $('#carousel .slides li img').css('max-height','170px');
}

</script>
<script>
$(document).ready(function(){
    // flexsliderの拡張：要素にマウスオーバーした時、クリックをしたような挙動にする
    $("#carousel .slides li").hover(function(){
        $(this).trigger("click");
    });
});
</script>

</head>
<body>
<div id="container" class="clearfix">
    <div id="header" class="clearfix">
        <div id="header-box">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.jpg" alt="ロゴ"></a>
        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        </div><!-- /#header-box -->
    </div><!-- /#header -->