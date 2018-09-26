<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>姓名配对测试</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_namepd.css">
    <script src="/quce/Public/js/rem.js"></script>
    <style>
        *{margin:0;padding:0;}
        .input_1{
            background: url("/quce/Public/images/namepd/inputBox_1Big.png") no-repeat center;
            background-size: 100% 100%;
        }
        .input_2{
            background: url("/quce/Public/images/namepd/inputBox_2Big.png") no-repeat center;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <style>
        .nav_body{
            position: fixed;
            max-width: 1024px;
            margin:0 auto;   
            width: 100%;
            background: #ffffff;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            border-bottom: 0.12rem solid #efeff4; 
        }
        .nav_contain{
            display: flex;
            justify-content: space-around;
            height: 1.2rem;
            line-height: 1.2rem;
        }
        .nav_contain .navItem{
            width: 26%;
            font-size:0;
            text-align: center;
        }

        .navItem>img{
            width: 1.2rem;
            display: inline-block;
            vertical-align: middle;
        }
        .nav_body>.nav_contain>.navItem_active{
            border-bottom: 0.04rem solid #f56f70;
        }
        .preload{display: none;}
    </style>
    <!-- 头部 -->
    <div class="nav_body">
        <div class="nav_contain">
            <div class="navItem"><img src="/quce/Public/images/peidui/contell0.png" alt="" class="navImg"></div>
            <div class="navItem"><img src="/quce/Public/images/peidui/namePd0.png" alt="" class="navImg"></div>
            <div class="navItem "><img src="/quce/Public/images/peidui/nameNum0.png" alt="" class="navImg"></div>
        </div>
        <!-- 预加载 -->
        <div class="preload">
            <img src="/quce/Public/images/peidui/contell1.png" alt="">
            <img src="/quce/Public/images/peidui/namePd1.png" alt="">
            <img src="/quce/Public/images/peidui/nameNum1.png" alt="">
        </div>
        <script>
            (function(){
                var item = document.querySelectorAll('.navItem>img');
                for(var i=0;i<item.length;i++){
                    (function (i){
                        item[i].onclick = function(e){
                            for(var j=0;j<item.length;j++){
                                item[j].parentNode.className = 'navItem';
                                item[j].src =  item[j].src.replace(/1.png/,'0.png');
                                window.open(jumpUrl[i],'_self');
                            }
                            e.target.src =  e.target.src.replace(/0.png/,'1.png');
                            e.target.parentNode.className = 'navItem navItem_active';
                        }
                    })(i);
                }
                var href = window.location.href;
                var index = 0;
                if(href.match(/xzpeidui/ig))
                    index=0;
                if(href.match(/namepd/ig))
                    index=1;
                if(href.match(/newnamenum/ig))
                    index=2;
                item[index].src =  item[index].src.replace(/0.png/,'1.png');
                item[index].parentNode.className = 'navItem navItem_active';
                var jumpUrl = ["<?php echo U('Zodiac/xzpeidui','',false);?>","<?php echo U('Zodiac/namepd','',false);?>","<?php echo U('Zodiac/newnamenum','',false);?>"];
            })()
        </script>
    </div>
    <!-- 内容 -->
    <div class="nmpd_container">
        <div class="titleimgWrap"><img src="/quce/Public/images/namepd/matchTitle.png" class="titleImage" alt=""></div>
        <p class="nameMatch_mainInfo">填写男女生姓名可生成你们的缘分卡片</p>
        <div class="inputBox inputBox1"><input type="text" class="input_1" placeholder="女生姓名" maxlength="5"></div>
        <div class="inputBox inputBox2"><input type="text" class="input_2" placeholder="男生姓名" maxlength="5"></div>
        <img src="/quce/Public/images/namepd/startBtnBig.png" alt="" class="startBtn">
    </div>
    <!-- 测算结果 -->
    <div class="result">
        <div class="result_container">
            <div class="result_wrap">
                <div class="result_wrap_t">
                    <img src="/quce/Public/images/namepd/result_t.png" width="100%" alt="">
                    <span class="woman"></span>
                    <span class="man"></span>
                </div>
                <div class="result_wrap_f">
                    <div class="result_wrap_item">
                        <p>缘分指数</p>
                        <p><img src="/quce/Public/images/namepd/result_b.png" width="100%" alt=""></p>
                        <p class="result_ajax_b"></p>
                    </div>
                    <div class="result_wrap_item">
                        <p>配对结果</p>
                        <p><img src="/quce/Public/images/namepd/result_b.png" width="100%" alt=""></p>
                        <p class="result_ajax_t"></p>
                    </div>
                </div>
                <div class="resulit_wrap_c">
                    
                </div>
                <div class="QRcode">
                    <div class="QR_icon"><img src="/quce/Public/images/namepd/qrcode_bx.png" width="100%" alt=""></div>
                    <p class="QR_t">长按识别二维码，测测你们的缘分指数</p>
                </div>
            </div>
        </div>
        <!-- 切换 -->
        <div class="result_img_container">
            <div class="result_imgwrap"><img src="" class="result_img" width="100%" alt="结果图片"></div>
            <div class="port2_bg_1"></div>
            <div class="port2_bg_2"></div>
            <div class="result_t_f">
                <img src="/quce/Public/images/namepd/againBtnBig.png" alt="再来一次" class="again">
                <img src="/quce/Public/images/namepd/shareBtnBig.png" alt="炫耀缘分" class="show"> 
            </div>
        </div>
    </div>
    

    <!-- 提示保存 -->
    <div class="zwfy-report-cartoonBox">
        <div class="zwfy-report-cartoonBox-filter"></div>
        <img src="/quce/Public/images/namepd/hand1.png" alt="" class="zwfy-report-cartoon zwfy-report-cartoon-active">
        <img src="/quce/Public/images/namepd/hand2.png" alt="" class="zwfy-report-cartoon">
        <img src="/quce/Public/images/namepd/hand3.png" alt="" class="zwfy-report-cartoon">
        <p>长按图片<br>即可保存到相册</p>
    </div>
    <!-- 加载 -->
    <div class="loadingBox" style="display:none">
        <div class="loading_wrap">
            <img src="/quce/Public/images/namepd/load.png" alt="" class="loading">
            <p>正在测算</p>
        </div>
    </div>
    <script src='/quce/Public/js/jquery.min.js'></script>
    <script src="/quce/Public/js/html2canvas2016.js"></script>
    <script type="text/javascript" src="/quce/Public/js/_namepd.js"></script>
    <script src="/quce/Public/js/_newnamenumFN.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script>
        // 传递数据
        function ajaxDataEvent(){
            console.log(12313)
            $('.woman').html(womanName);
            $('.man').html(manName);
            $.post("<?php echo U('Zodiac/namepdObtain','',false);?>",{bihua:nameNumCount.getNum(manName)+nameNumCount.getNum(womanName)},function(data){
                var data  = JSON.parse(data)
                $('.result_ajax_t').html(data.name.split('，')[0]+'<br>'+data.name.split('，')[1]);
                $('.result_ajax_b').text(data.percentage+'%');
                $('.resulit_wrap_c').text(data.text);
                callback();
            })
        }
    </script>
</body>
</html>