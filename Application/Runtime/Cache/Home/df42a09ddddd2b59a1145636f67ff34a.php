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
    <title>财商测试</title>
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
            background: url('/quce/Public/images/cstest/banner_bg.png') no-repeat;
            background-size:100% 100%;
        }
        .b_wrap{
            padding:0.3rem 0.2rem 0.2rem;
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
            width:0rem;
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
        



        .pst{position: relative;}
        .public_imgBox,.public_banner{font-size:0;}
        .mgt24lr0b50{margin:0.24rem 0 0.5rem;}
        .mgt24{margin-top:0.24rem;}
        .test_btn{
            width:90%;
            font-size: 0;
            position: absolute;
            bottom:0.2rem;
            left:50%;
            margin-left:-45%;
            
        }
        /* 滚动评价 */
        .feedback_container{background-color: #FEF4F3;margin:0 0.1rem;padding-bottom:0.2rem;border:0.01rem solid #E9E0DE;border-top-color: transparent;}
        .feedback_title{font-size:0.48rem;color:#59B4FC;text-align: center;padding:0.4rem 0;font-weight: 700;position: relative;}
        .feedback_title::after{
            content: '';
            border:0.18rem solid transparent;
            border-top-color:#59B4FC;
            position: absolute;
            bottom:-0.1rem;
            left:50%;
            margin-left:-0.18rem;
        }
        .feedback_content{
            margin:0.1rem 0.2rem 0.3rem;
            background:url('/quce/Public/images/cstest/bj_02.png')no-repeat;
            padding:0.1rem 0;
            box-sizing: border-box;
            background-size:100% 100%;
            height:5rem;
        }
        /* 滚动内容 */
        .uf_ul_wrap{overflow: hidden;height:100%;border-radius: 0.05rem;}
        .uf_ul_wrap .uf_ul{position: relative;padding:0 0.3rem;}
        .uf_ul_wrap .uf_ul li{border-bottom:1px solid #cccccc;list-style: none;}
        .uf_ul_wrap .uf_ul li strong{color:#ff5800;margin:0.1rem 0;display: inline-block;font-size:0.26rem;font-family: PingFangSC-Medium, sans-serif;font-weight: 700;}
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
            <a href="<?php echo U('Index/palace','',false);?>?subject=QWCS20F&id=116" class="on">财商测试</a>
            <a href="<?php echo U('Index/palace','',false);?>?subject=QWCS21F&id=128">情商测试</a>
        </div>
        <div class="b_wrap">
            <img src="/quce/Public/images/cstest/banner.png" width="100%" alt="">
        </div>
    </div>
    <!-- main -->
    <main class="test_content">
        <div class="public_imgBox pst">
            <img src="/quce/Public/images/cstest/01.jpg" width="100%" alt="">
            <a class="test_btn"><img src="/quce/Public/images/cstest/button.gif" width="100%" alt=""></a>
        </div>
        
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/02.jpg" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/03.jpg" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/04.jpg" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/05.jpg" width="100%" alt=""></div>
        <div class="public_imgBox"><img src="/quce/Public/images/cstest/06.jpg" width="100%" alt=""></div>
        <div class="feedback_container">
            <div class="feedback_title">用户反馈</div>
            <div class="feedback_content">
                <div class="uf_ul_wrap" id="feedbackScroll">
                    <ul class="uf_ul">
                        <li>
                            <strong>张女士  136****5852</strong>
                            <p>分析的很客观，针对我的财商给出了针对性的建议，非常有用，希望自己能成为一个财商高的人。</p>
                        </li>
                        <li>
                            <strong>龙先生  136****9662</strong>
                            <p>真的很准啊，对我现在的情况做了很准确的分析，让我豁然开朗。</p>
                        </li>
                        <li>
                            <strong>诸葛先生  185****8841</strong>
                            <p>感觉自己事事不顺，总是被坑，也挣不着钱，这原来都是财商不够啊，我一定会按照专家给的建议改变，努力让自己变成一个财商高的人，努力 挣钱！</p>
                        </li>
                        <li>
                            <strong>程先生  139****6845</strong>
                            <p>测试的结果让我很意外，本来并没有抱着很大的希望，但是结果就摆在那里，真的很准让我认识到自己的很多财商方面的不足，还有一些优势，看来以后要努力避免这些不足，发扬自己的优势！</p>
                        </li>
                        <li>
                            <strong>赵女士  136****6739</strong>
                            <p>我的消费观念确实存在很大的问题，这次测试结果给了很大的帮助，看来以后要注意了。</p>
                        </li>
                        <li>
                            <strong>吴先生  185****6985</strong>
                            <p>刚才朋友推荐我来测的，结果很值得参考，最关键的是不仅分析我现在的现状，而且还针对于我差的地方给了很好的建议，让我有一个改进的方向</p>
                        </li>
                        <li>
                            <strong>余先生  188****4585</strong>
                            <p>财商不高的人注定是不配拥有财富的，加油！努力让自己变成一个财商高的人，根据这个测试结果，我应该多培养自己的冒险精神跟自控能力，我相信我会变得更好的。</p>
                        </li>
                        <li>
                            <strong>辜先生  139****8547</strong>
                            <p>针对我的财商的各个方面分析的很详细，让我把财商这个笼统的概念有了更加直观的感受，希望自己约来越好吧</p>
                        </li>
                        <li>
                            <strong>冯女士  137****8946</strong>
                            <p>我真的觉得这个测试在我身边装了一个摄像头，把我分析的很透彻，也帮助我在认识自己方面上了一个台阶。</p>
                        </li>
                        <li>
                            <strong>钟先生  136****8594</strong>
                            <p>原来我挣不着钱的症结在这啊！将来一定好好注意一下。</p>
                        </li>
                        <li>
                            <strong>钟先生  185****4566</strong>
                            <p>测试结果说我挣钱能力很强，收钱能力并不是并不是很强，确实！每个月基本都是月光，也是存不着钱啊，这也确实是我的一个大毛病。</p>
                        </li>
                        <li>
                            <strong>李先生  188****8888</strong>
                            <p>我的财商75分，在人群中也处在上半部分，还是有点小窃喜呢。</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <!-- footer -->
    <!-- footer -->
<footer class="public_fonter_container">
    <div class="public_fonter_content">
        <?php if(($_COOKIE['channel']== qudao183)): ?><p>客服QQ号：2307821835</p>
            <?php else: ?>
            <img src="/quce/Public/images/QR_core.png" width="30%" class="public_QRicon" alt="">
            <p>长按二维码添加客服微信</p><?php endif; ?>
        <p>在线服务时间：周一至周五9:00-18:00</p>
        <p><small>(以上测试纯属测试本身，不作为证明任何人财商能力的依据)</small></p>
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
            <a  class="public_test_btn">立即测算</a>
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