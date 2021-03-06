<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>姓名笔画测试</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_newnamenum.css">
    <script src="/quce/Public/js/rem.js"></script>
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
    <!-- 主页 -->
    <div class="namenum_container">
        <div class="namenum_title"><img src="/quce/Public/images/newnamenum/Port1title.png" width="100%" alt=""></div>
        <div class="namenum_ipt">
            <input type="text" placeholder="我的名字:" maxlength="6" class="myInput">
            <input type="text" placeholder="TA的名字:" maxlength="6" class="hisInput">
        </div>
        <div class="startBtnwrap"><img src="/quce/Public/images/newnamenum/startBtn.png" alt="" width="100%" class="startBtn"></div>
    </div>
    <!-- 测算结果 -->
    <div class="result">
        <div class="result_container">
            <div class="result_wrap">
                <div class="result_wrap_t">姓名笔画测试结果</div>
                <div class="result_cotent">
                    <div class="result_wrap_c">
                        <p><span class="firstName">我我我</span>:<span class="f_num">14划</span></p>
                        <p><span class="last_name">他他他</span>:<span class="l_num">15划</span></p>
                        <p><span class="chaNum">差值</span>:<span class="c_num">15划</span></p>
                    </div>
                    <div class="result_wrap_f">
                        <p class="result_wrap_f_t">/你们的关系是/</p>
                        <p class="result_c_c">郎才女貌</p>
                    </div>
                    <div class="QR_wrap">
                        <img src="/quce/Public/images/newnamenum/qrcode_bx.png" class="QR_icon" alt="">
                        <p>长按识别二维码</p>
                        <p>测出你和TA的真正关系</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- 切换 -->
        <div class="result_img_container">
            <div class="result_imgwrap"><img src="" class="result_img" width="100%" alt="结果图片"></div>
            <div class="result_t_f">
                <img src="/quce/Public/images/newnamenum/againBtn.png" alt="再来一次" class="again">
                <img src="/quce/Public/images/newnamenum/shareBtn.png" alt="炫耀缘分" class="show"> 
            </div>
        </div>
    </div>
    <!-- 提示保存 -->
    <div class="zwfy-report-cartoonBox">
        <div class="zwfy-report-cartoonBox-filter"></div>
        <img src="/quce/Public/images/newnamenum/hand1.png" alt="" class="zwfy-report-cartoon zwfy-report-cartoon-active">
        <img src="/quce/Public/images/newnamenum/hand2.png" alt="" class="zwfy-report-cartoon">
        <img src="/quce/Public/images/newnamenum/hand3.png" alt="" class="zwfy-report-cartoon">
        <p>长按图片<br>即可保存到相册</p>
    </div>
    <!-- 加载 -->
    <div class="loadingBox" style="display:none">
        <div class="loading_wrap">
            <img src="/quce/Public/images/newnamenum/loading.png" alt="" class="loading">
            <p>正在测算</p>
        </div>
    </div>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/html2canvas2016.js"></script>
    <script src="/quce/Public/js/_newnamenum.js"></script>
    <script src="/quce/Public/js/_newnamenumFN.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script>
        // 传递数据
        function ajaxDataEvent(success){
            $('.firstName').html(myName);
            $('.last_name').html(heName);
            var f_num = nameNumCount.getNum(myName);
            var l_num = nameNumCount.getNum(heName);
            $('.f_num').html(f_num+'划');
            $('.l_num').html(l_num+'划');
            $('.c_num').html(Math.abs(f_num-l_num)+'划');
            $.post("<?php echo U('Zodiac/newnamenumObtain','',false);?>",{bihua:Math.abs(f_num-l_num)},function(data){
                var data = JSON.parse(data);
                $('.result_c_c').text(data);
                setTimeout(function(){
                    success();
                },1000)
            })
        }
    </script>
</body>
</html>