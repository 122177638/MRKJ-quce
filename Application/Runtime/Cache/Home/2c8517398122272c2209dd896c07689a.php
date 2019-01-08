<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <!-- 去除浏览器地址栏和菜单栏 -->
    <meta name='apple-mobile-web-app-capable' content='yes' />
    <meta name='full-screen' content='true' />
    <meta name='x5-fullscreen' content='true' />
    <meta name='360-fullscreen' content='true' />
    <title>情商测试</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/public_zm.css">

    <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan style='display:none;' id='cnzz_stat_icon_"+<?php echo ($channelID); ?>+"'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D"+<?php echo ($channelID); ?>+"' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <style>
        .bannerBg{
            margin:0.1rem 0.1rem 0;
            padding-top:0.88rem;
            position: relative;
            background: url('/quce/Public/images/qstest/bj_01.png') no-repeat;
            background-size:100% 100%;
        }
        .b_wrap{
            padding:0.3rem 0.2rem;
            background-color:#FFF3F5;
            border:0.01rem solid #E9E0DE;
            border-bottom-color: transparent;
            border-top-color: transparent;
        }
        .btnBox{display: flex;position: absolute;top:0;width: 100%;}
        .btnBox a{
            height:0.88rem;
            line-height: 0.88rem;
            text-align: center;
            flex: 1;
            font-size: 0.36rem;
            color:#666666;
            height: 100%;
        }
        .btnBox a.on{color:#f02f2f;position: relative;font-weight: 700;}
        .btnBox a.on::after{
            content:'';
            display: inline-block;
            width:1.6rem;
            height:0.04rem;
            background-color:#f02f2f;
            position: absolute;
            left:50%;
            margin-left:-0.8rem;
            bottom:0.1rem;
            animation: onActive 0.35s  forwards ease-in;
        }
        @keyframes onActive{
            0%{width:0;margin-left:0;}
            100%{width:1.6rem;margin-left:-0.8rem;}
        }
        /*  */
        .test_content{
            margin:0 0.1rem;
            background-color:#FFF4F4;
            border:0.01rem solid #E9E0DE;
            padding-bottom: 0.2rem;
            border-top-color: transparent;
        }
        .public_imgBox,.public_banner{font-size:0;}
        .public_imgBox{margin:0.3rem 0.2rem;}
        .mgt24lr0b50{margin:0.24rem 0 0.5rem;}
        .mgt24{margin-top:0.24rem;}
        .mg1{margin: 0.1rem 0.2rem 0.3rem;}
        .test_btn{
            margin:0.2rem 0.2rem 0.3rem;
            height:1rem;
            line-height: 1rem;
            text-align: center;
            color:#ffffff;
            border-radius: 0.1rem;
            -webkit-border-radius: 0.1rem;
            -moz-border-radius: 0.1rem;
            -ms-border-radius: 0.1rem;
            font-size:0.36rem;
            display: block;
            -o-border-radius: 0.1rem;
            background:linear-gradient(#ff8585,#ef0d0d);
            box-sizing: border-box;
            box-shadow: 0 0.06rem #c21717;
        }
        /* 滚动评价 */
        .feedback_container{
            height:8.22rem;
            background:url('/quce/Public/images/qstest/img_yonghupinjia.png') no-repeat;
            background-size:100% 100%;
            padding-top:1.7rem;
            box-sizing: border-box;
            margin:0 0.2rem;
        }
        .feedback_content{
            margin:0.1rem 0.2rem 0.3rem;
            padding:0.3rem 0;
            box-sizing: border-box;
            background-color:#FFFFFF;
            height:5.9rem;
        }
        /* 滚动内容 */
        .uf_ul_wrap{overflow: hidden;height:100%;border-radius: 0.05rem;}
        .uf_ul_wrap .uf_ul{position: relative;padding:0 0.3rem;}
        .uf_ul_wrap .uf_ul li{border-bottom:1px solid #F7E9E0;list-style: none;padding:0.1rem 0;}
        .uf_ul_wrap .uf_ul li strong{color:#ff5800;margin-bottom:0.1rem;display: inline-block;font-size:0.26rem;font-family: PingFangSC-Medium, sans-serif;font-weight: 700;}
        .uf_ul_wrap .uf_ul li p{font-family: PingFangSC-Medium, sans-serif;font-size:0.3rem;color:#333333;line-height: 0.5rem;}
        
        /* 悬浮按钮 */
        .public_sus_container{
            position: fixed;
            left:0;
            bottom:0;
            width: 100%;
            display: block;
            z-index: 40;        
        }
        .public_sus_container .public_sus_content{
            overflow: hidden;
            width: 100%;
            height:1rem;
            line-height: 1rem;
            background-color:rgba(0, 0, 0, 0.5);
        }
        .public_sus_container .public_test_btn{
            height:0.8rem;
            line-height: 0.8rem;
            display: block;
            background-color:#FC3518;
            text-decoration: none;
            margin:0.1rem 0.1rem 0;
            border-radius: 0.1rem;
            text-align: center;
            font-size:0.32rem;
            color:#ffffff;
            border:1px solid rgba(0, 0, 0, 0.3);
            text-shadow: 2px 2px 3px #333333;
        }
        /* menu */
        .public_menu_container{
            position: fixed;
            right:0.1rem;
            bottom:1.8rem;
        }
        .public_menu_content{
            display: flex;
            flex-direction: column;
            height:1.8rem;
            align-items: center;
            justify-content: space-between;
        }
        .public_menu_content .navigate{
            display:block;
            width:0.8rem;
            height:0.8rem;
            border-radius: 50%;
            padding:0;
        }
        .public_menu_content .navigate:nth-child(1){
            background:url('/quce/Public/images/public/home.png') center center no-repeat rgba(0, 0, 0, 0.5);
            background-size:0.48rem;
        }
        .public_menu_content .navigate:nth-child(2){
            background:url('/quce/Public/images/public/my.png') center center no-repeat rgba(0, 0, 0, 0.5);
            background-size:0.48rem;
        }
    </style>
</head>
<body>
    <div class="public_banner bannerBg">
        <div class="btnBox">
            <a href="<?php echo U('Index/palace','',false);?>?subject=QWCS20F&id=116">财商测试</a>
            <a href="<?php echo U('Index/palace','',false);?>?subject=QWCS21F&id=128" class="on">情商测试</a>
        </div>
        <div class="b_wrap">
            <img src="/quce/Public/images/qstest/banner.png" width="100%" alt="">
        </div>
    </div>
    <!-- main -->
    <main class="test_content">
        <!-- <div class="public_imgBox"><img src="/quce/Public/images/qstest/img_zhuanjiajieshao.png" width="100%" alt=""></div> -->
        <div class="public_imgBox mg1"><img src="/quce/Public/images/qstest/img_1.png" width="100%" alt=""></div>
        <a  class="test_btn">测测你的情商</a>
        <div class="public_imgBox"><img src="/quce/Public/images/qstest/img_2.png" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/qstest/img_3.png" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/qstest/img_4.png" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/qstest/img_5.png" width="100%" alt=""></div>
        <!-- <div class="public_imgBox"><img src="/quce/Public/images/cstest/05.jpg" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/06.jpg" width="100%" alt=""></div>
        <div class="public_imgBox mgt24"><img src="/quce/Public/images/cstest/photo_02.jpg" width="100%" alt=""></div> -->
        <div class="feedback_container">
            <!-- <div class="feedback_title">用户反馈</div> -->
            <div class="feedback_content">
                <div class="uf_ul_wrap" id="feedbackScroll">
                    <ul class="uf_ul">
                        <li>
                            <strong>王先生  137****1254</strong>
                            <p>我跟妻子的关系一直很僵，真是三天一大吵，一天一小吵，这也让我很困惑，这个测试告诉我症结在哪，完全是自己的情商不够嘛。</p>
                        </li>
                        <li>
                            <strong>戈女士  136****5779</strong>
                            <p>测试结果很准，我确实有的时候脾气很差，很不能控制自己的情绪，这也让我损失了很多朋友，跟家人的相处也不好，真的很痛苦，希望自己以后能改吧。</p>
                        </li>
                        <li>
                            <strong>黄先生  188****9635</strong>
                            <p>我以前老觉得发脾气那是个性，可是做了这个测试我才知道是自己情商不高啊，要努力学习控制自己的情绪，不能再让它过多的影响我的生活了！</p>
                        </li>
                        <li>
                            <strong>颜女士  185****4685</strong>
                            <p>建议很管用，根据这个建议我可以慢慢做出改变，变成那个美好的样子。</p>
                        </li>
                        <li>
                            <strong>张女士  139****6650</strong>
                            <p>我的情商竟然95分！这个让我很高兴，确实我生活中待人接物方面做的不错，小小的窃喜一下。</p>
                        </li>
                        <li>
                            <strong>刘先生  136****5536</strong>
                            <p>这个测试说我不会说话，不能敏锐的觉察别人的情绪，真的是啊！我感觉自己在人际关系中就是一个傻子！看来我以后要多注意观察别人的情绪了。</p>
                        </li>
                        <li>
                            <strong>费先生  137****9987</strong>
                            <p>感觉跟同事的关系老是处不好，有些时候就因为一点小事就会闹各种矛盾，会严重影响我的工作效率，情商专家给了我很多好的建议，我准备试一下，毕竟改变总比坐以待毙好很多！</p>
                        </li>
                        <li>
                            <strong>林先生  139****2263</strong>
                            <p>情商一直是我一个大的软肋，在公共场合一直不太会说话，跟朋友家人也是矛盾重重，这个测试给了我很大的帮助，我相信我会变得更好的。</p>
                        </li>
                        <li>
                            <strong>张先生  188****2669</strong>
                            <p>情商里竟然有那么多的东西，听别人说多了，只是知道它很重要，但是没想到它会影响到我们生活的方方面面，真是大开眼界啊。</p>
                        </li>
                        <li>
                            <strong>李先生  139****4459</strong>
                            <p>我是一个情商很高的人，所以在生活中就过得很幸福，都被别人称呼为小太阳，希望我也能照亮你。</p>
                        </li>
                        <li>
                            <strong>屠女士  139****7585</strong>
                            <p>跟父母的关系真的很差，其实并不是他们或者自己做的事情很糟糕，只是不会与他们相处罢了，一个人的情商真的很关键</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <!-- footer -->
<footer class="public_fonter_container">
    <div class="public_fonter_content">
        <?php if(($_COOKIE['channel']== qudao183)): ?><p>客服QQ号：2307821835</p>
            <?php else: ?>
            <img src="/quce/Public/images/QR_core.png" width="30%" class="public_QRicon" alt="">
            <p>长按二维码添加客服微信</p><?php endif; ?>
        <p>在线服务时间：周一至周五9:00-18:00</p>
        <p><small>(以上测试纯属测试本身，不作为证明任何人能力的依据)</small></p>
    </div>
</footer>
    <!-- 悬浮Home -->
    <div class="public_menu_container">
        <div class="public_menu_content">
            <a href="<?php echo U('Index/index','',false);?>" class="navigate"></a>
            <a href="<?php echo U('Index/mytest','',false);?>" class="navigate"></a>
        </div>
    </div>
    <!-- 悬浮按钮 -->
    <div class="public_sus_container">
        <div class="public_sus_content">
            <a href="javascript:;" class="public_test_btn">立即测算</a>
        </div>
    </div>
    <script>
        window.history.pushState('',null,'');
        window.addEventListener('popstate',function(){
            window.location.href = "<?php echo U('Index/index','',false);?>";
        })
        $(function(){
            // 服务轮播
            var scrollTop=0;
            var scrollUl=$('#feedbackScroll').children('ul');
            function scrollTip(){
                var top=scrollUl.children('li').eq(0).outerHeight();
                if(Math.abs(scrollTop)==Math.abs(top)){
                    scrollUl.children('li').eq(0).appendTo(scrollUl);
                    scrollUl.css("top",0);
                    scrollTop=0;
                }else{
                    scrollTop--;
                    scrollUl.css("top",scrollTop);
                }
            }
            setInterval(scrollTip,50);
        });

        $('.test_btn').on('click',function(){
            //点击回调入库
            $.getJSON("<?php echo U('Paycs/index_cs','',false);?>",function(data){});
            location.href="<?php echo U('Paycs/answerPage','',false);?>";
        });
        $('.public_test_btn').on('click',function(){
            //点击回调入库
            $.getJSON("<?php echo U('Paycs/index_fd','',false);?>",function(data){});
            location.href="<?php echo U('Paycs/answerPage','',false);?>";
        });
    </script>
</body>
</html>