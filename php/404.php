<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>404</title>
    <script src="jq.js"></script>
    <style type="text/css">
        *{margin:0;padding:0;list-style-type:none;}
        a,img{border:0;}
        body{background: #d2f5f1}
        .mianBox{width: 100%;margin: 0 auto;position: relative;overflow: hidden;}
        .mianBox >img{position: absolute}
        .yun0{right: -140px;top: 30px;webkit-animation: cloudLarge 105s infinite;-moz-animation: cloudLarge 105s infinite;-o-animation: cloudLarge 105s infinite;animation: cloudLarge 105s infinite;}
        .yun1{left: 5%;top: 48%;-webkit-animation: cloudSmall 105s infinite;-moz-animation: cloudSmall 105s infinite;-o-animation: cloudSmall 105s infinite;animation: cloudSmall 105s infinite;}
        .yun2{left: 16%;top: 35%;-webkit-animation: cloudMedium 105s infinite;-moz-animation: cloudMedium 105s infinite;-o-animation: cloudMedium 105s infinite;animation: cloudMedium 105s infinite;}
        .san{left: 10%;top: 20%;-webkit-animation:dn400 3s 0s ease both;-moz-animation:dn400 3s 0s ease both;animation:dn400 3s 0s ease both;}
        .bird{left: 27%;top: 15%;-webkit-animation: flying 3s infinite;-moz-animation: flying 3s infinite;-o-animation: flying 3s infinite;animation: flying 3s infinite;}
        .tipInfo{position:absolute;z-index:99;margin-left:150px;border: 4px solid #c0ece7;border-color: rgba(192,237,232,07);border-radius:5px;derbackground:#c0ece7;background: rgba(192,237,232,07);width: 360px}
        .tipInfo .in{background: #fff;padding: 0 10%}
        .tipInfo .in h2{line-height:50px;font-size: 30px;color: #e94c3c;border-bottom: 1px dashed #aacdd5;padding: 18px 0}
        .tipInfo .in p{padding:30px 0 50px 0;text-align: center;color: #289575}
        .tipInfo .in p span{margin:0 20px}
        .tipInfo .in p span a{color:#e94c3c;margin: 0 10px}
        .tipInfo .in .desc{overflow: hidden;font-size: 14px;color: #2b2b2b;padding: 0 10%}
        .tipInfo .in .desc h3{font-weight: normal;padding: 20px 0 5px 0}


        @keyframes cloudLarge{0%{right: -140px;}
            100%{right: 118%;}}
        @keyframes cloudSmall{0%{left: 5%;}
            100%{left: 105%;}}
        @keyframes cloudMedium{0%{left: 16%;}
            100%{left: -18%;}}
        @keyframes light{0%{opacity: 0;}
            100%{opacity: 100;}}
        @keyframes hide{0%{opacity: 100;}
            100%{opacity: 0;}}
        @keyframes flying{0%{margin-top: 0px;}
            50%{margin-top: 6px;}
            100%{margin-top: 0px;}}
        @keyframes flying{0%{margin-top: 0px;}
            50%{margin-top: 6px;}
            100%{margin-top: 0px;}}
        @keyframes down900{0%{opacity:0;transform:translate(0,0);}
            100%{opacity:1;transform:translate(900,900);}}
        @keyframes dn400{0%{opacity:0;transform:translateY(-400px);}
            100%{opacity:1;transform:translateY(0);}}

    </style>
    <script type="text/javascript">
        $(function() {
            var h = $(window).height();
            $('body').height(h);
            $('.mianBox').height(h);
            centerWindow(".tipInfo");
        });

        //2.将盒子方法放入这个方，方便法统一调用
        function centerWindow(a) {
            center(a);
            //自适应窗口
            $(window).bind('scroll resize',
                function() {
                    center(a);
                });
        }

        //1.居中方法，传入需要剧中的标签
        function center(a) {
            var wWidth = $(window).width();
            var wHeight = $(window).height();
            var boxWidth = $(a).width();
            var boxHeight = $(a).height();
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            var top = scrollTop + (wHeight - boxHeight) / 2;
            var left = scrollLeft + (wWidth - boxWidth) / 2;
            $(a).css({
                "top": top,
                "left": left
            });
        }
    </script>
</head>
<body>
<div class="mianBox">
    <img src="../img/yun0.png" alt="" class="yun yun0" />
    <img src="../img/yun1.png" alt="" class="yun yun1" />
    <img src="../img/yun2.png" alt="" class="yun yun2" />
    <img src="../img/bird.png" alt="" class="bird" />
    <img src="../img/san.png" alt="" class="san" />
    <div class="tipInfo">
        <div class="in">
            <div class="textThis">
                <h2>出错啦404！</h2>
                <h3 style="color: #fc4222">登录后才能进入</h3>
                <p><span>页面<a id="href" href="mlogin.php">跳转到</a></span>登录界面<span>等待<b id="wait">6</b>秒</span></p>
                <script type="text/javascript">                            (function() {
                        var wait = document.getElementById('wait'), href = document.getElementById('href').href;
                        var interval = setInterval(function() {
                            var time = --wait.innerHTML;
                            if (time<=0) {

                                clearInterval(interval);
                                location.href = href;
                                //alert("开始跳转提示");
                            }
                            ;
                        }, 1000);
                    })();
                </script>
            </div>
        </div>
    </div>
</div>

</body>
</html>
