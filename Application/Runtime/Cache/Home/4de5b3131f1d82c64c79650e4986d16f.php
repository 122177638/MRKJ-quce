<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>星座运势</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_constellation_ys.css">
    <link rel="stylesheet" href="/quce/Public/css/DateSelector.css">
    <script src="/quce/Public/js/rem.js"></script>
    
</head>
<body>
    <!-- 主页 -->
    <div class="index_container">
        <div class="replacexz_container">
            <div class="replacexz">
                <p>修改已绑定星座请点击右侧按钮</p>
                <div class="setxzBtn">修改星座  </div>
            </div>
        </div>
        <div class="index_top">选择您要绑定的星座</div>
        <ul class="index_xz_select">
            <li class="select_to" data-constell="0"><img src="/quce/Public/images/constellation_ys/sign0-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="1"><img src="/quce/Public/images/constellation_ys/sign1-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="2"><img src="/quce/Public/images/constellation_ys/sign2-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="3"><img src="/quce/Public/images/constellation_ys/sign3-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="4"><img src="/quce/Public/images/constellation_ys/sign4-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="5"><img src="/quce/Public/images/constellation_ys/sign5-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="6"><img src="/quce/Public/images/constellation_ys/sign6-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="7"><img src="/quce/Public/images/constellation_ys/sign7-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="8"><img src="/quce/Public/images/constellation_ys/sign8-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="9"><img src="/quce/Public/images/constellation_ys/sign9-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="10"><img src="/quce/Public/images/constellation_ys/sign10-0.png" alt="" width="100%" class="select_img"></li>
            <li class="select_to" data-constell="11"><img src="/quce/Public/images/constellation_ys/sign11-0.png" alt="" width="100%" class="select_img"></li>
        </ul>
    </div>
    <!-- 测算结果 -->
    <div class="result">
        <!-- 今日明日星座运势 -->
        <div class="result_ys_container" id="js_day_ys">
            <div class="result_ys_wrap">
                <div class="result_ys_title js_day_ys_title">2018.17.16 &nbsp;-&nbsp; 星期一</div>
                <div class="result_ys_msg">
                    <div class="result_ys_portrait">
                        <img src="/quce/Public/images/user_avatar.png" crossOrigin="Anonymous" class="user_portrait" alt="">
                        <img src="/quce/Public/images/constellation_ys/signSmall10.png" class="xz_icon js_day_ys_icon" alt="">
                    </div>
                    <div class="result_ys_name"><?php echo ($nickname); ?></div>
                    <div class="result_ys_xz js_day_ys_xz">摩羯座(12.22-01.19)</div>
                </div>
                <div class="result_ys_zs">
                    <div class="love_zs circular"><span>爱情指数</span><span class="aq_num">100</span></div>
                    <div class="wealth_zs circular"><span>财富指数</span><span class="cf_num">100</span></div>
                    <div class="healthy_zs circular"><span>健康指数</span><span class="jk_num">100</span></div>
                    <div class="work_zs circular"><span>工作指数</span><span class="gz_num">100</span></div>
                </div>
                <div class="result_ys_sy">
                    <div class="_hr"></div> 
                    <div class="result_ys_sy_c">
                        <div><p>综合指数</p><p class="zh_num">80</p></div>
                        <div><p>幸运数字</p><p class="lk_num">9</p></div>
                        <div><p>速配星座</p><p class="sp_xz">金牛座</p></div>
                        <div><p>幸运数字</p><p class="lk_color">亮橙色</p></div>
                    </div>
                    <div class="_hr2"></div> 
                </div>
                <div class="result_ys_jy">
                    <p class="zh_pj">今天会针对自己的兴趣安排一个学习的计划。部分人的另一半今天也会有出行的可能。今天关于网络营销之类的事情都会比较顺畅，只是有孩子的人要注意孩子的健康。</p>
                </div>
                <div class="result_ys_QRcode">
                    <p>长按识别二维码</p>
                    <img src="/quce/Public/images/constellation_ys/qrcode_bx.png" width="20%" alt="">
                    <p>生成你的星座卡</p>
                </div>
            </div>
        </div>
        <!-- 周月运势 -->
        <div class="result_ys_container" id="js_wm_ys">
            <div class="result_ys_wrap">
                <div class="result_ys_title js_day_ys_title">2018年07月</div>
                <div class="result_ys_msg">
                    <div class="result_ys_portrait">
                        <img src="/quce/Public/images/user_avatar.png" crossOrigin="Anonymous" class="user_portrait" alt="">
                        <img src="/quce/Public/images/constellation_ys/signSmall10.png" class="xz_icon js_day_ys_icon" alt="">
                    </div>
                    <div class="result_ys_name"><?php echo ($nickname); ?></div>
                    <div class="result_ys_xz js_day_ys_xz">摩羯座(12.22-01.19)</div>
                </div>
                <div class="result_ys_js">
                    <div class="wm_compre_wrap">
                        <div class="wmshare wm_compre"><span>综合</span></div>
                        <p class="wm_compre_c">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，会发生争吵。</p>
                        <div class="_hr2"></div> 
                    </div>
                    
                    <div class="wm_item">
                        <div class="wmshare wm_healthy"><span>健康</span></div>
                        <p class="jk_p">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，会发生争吵。</p>
                    </div>
                    <div class="_hr2"></div> 
                    <!-- <div class="wm_item" >
                        <div class="wmshare wm_qwork"><span>学习</span></div>
                        <p class="xx_p">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，</p>
                    </div>
                    <div class="_hr2"></div>  -->
                    <div class="wm_item">
                        <div class="wmshare wm_love"><span>爱情</span></div>
                        <p class="aq_p">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，</p>
                    </div>
                    <div class="_hr2"></div> 
                    <div class="wm_item">
                        <div class="wmshare wm_wealth"><span>财运</span></div>
                        <p class="cy_p">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，</p>
                    </div>
                    <div class="_hr2"></div> 
                    <div class="wm_item">
                        <div class="wmshare wm_work"><span>工作</span></div>
                        <p class="gz_p">恋爱：本周的你得自己控制下脾气，否则会惹得你的伴侣不开心，</p>
                    </div>
                </div>
                <div class="result_ys_QRcode">
                    <p>长按识别二维码</p>
                    <img src="/quce/Public/images/constellation_ys/qrcode_bx.png" width="20%" alt="">
                    <p>生成你的星座卡</p>
                </div>
            </div>
        </div>
        <!-- 切换 -->
        <div class="result_img_container">
            <div class="result_imgwrap"><img src="" class="result_img" width="100%" alt="结果图片"></div>
            <div class="result_t_f">
                <img src="/quce/Public/images/constellation_ys/changeConstellNew.png" alt="更换星座" class="setconstell">
                <img src="/quce/Public/images/constellation_ys/showMeMore.png" alt="查看更多" class="getmore"> 
                <ul class="result_menu">
                    <li class="menu_select" id="today">今日运势</li>
                    <li class="menu_select" id="tomorrow">明日运势</li>
                    <li class="menu_select" id="week">周运势</li>
                    <li class="menu_select" id="month">月运势</li>
                    <li class="menu_select" id="anther">更多日期</li>
                </ul>
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
            <img src="/quce/Public/images/constellation_ys/load.png" alt="" class="loading">
            <p>正在测算</p>
        </div>
    </div>
    <!-- 日期插件 -->
    <div id="targetContainer"></div>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/html2canvas2016.js"></script>
    <script src="/quce/Public/js/DateSelector.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/_constellation_ys.js"></script>
    <script>
        var xzType = "today";  //默认今日运势
        var userxz = null; //用户绑定星座
        let aviurl= "<?php echo ($headimgurl); ?>";
        if(aviurl){
            $('.user_portrait').attr('src',aviurl);
        }else{
            console.log('不是微信')
        }
        var xzdata = [
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall0.png',xz_time:'水瓶座(01.20-02.18)',xz_name:'水瓶'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall1.png',xz_time:'双鱼座(02.19-03.20)',xz_name:'双鱼'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall2.png',xz_time:'白羊座(03.21-04.19)',xz_name:'白羊'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall3.png',xz_time:'金牛座(04.20-05.20)',xz_name:'金牛'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall4.png',xz_time:'双子座(05.21-06.21)',xz_name:'双子'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall5.png',xz_time:'巨蟹座(06.22-07.22)',xz_name:'巨蟹'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall6.png',xz_time:'狮子座(07.23-08.22)',xz_name:'狮子'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall7.png',xz_time:'处女座(08.23-09.22)',xz_name:'处女'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall8.png',xz_time:'天秤座(09.23-10.23)',xz_name:'天秤'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall9.png',xz_time:'天蝎座(10.24-11.22)',xz_name:'天蝎'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall10.png',xz_time:'射手座(11.23-12.21)',xz_name:'射手'},
            {xz_icon:'/quce/Public/images/constellation_ys/signSmall11.png',xz_time:'摩羯座(12.22-01.19)',xz_name:'摩羯'}
        ]
        
        // 更多日期
        var DateSelectorEndTime = getToDayTime().nextDayTime.split('-'); //结束日期
        var DateSelectorToDayTime = getToDayTime().todayTime.split('-'); //默认选择今天
        var DateSelectorBeginTime = [DateSelectorToDayTime[0],(DateSelectorToDayTime[1]-1),0];
        new DateSelector({
            input: 'anther',//点击触发插件的input框的id
            container: 'targetContainer',//插件插入的容器id
            type: 0,
            //0：不需要tab切换，自定义滑动内容，建议小于三个；
            //1：需要tab切换，【年月日】【时分】完全展示，固定死，可设置开始年份和结束年份
            param: [1, 1, 1, 0, 0,],
            //设置['year','month','day','hour','minute'],1为需要，0为不需要,需要连续的1
            beginTime: DateSelectorBeginTime,//如空数组默认设置成1970年1月1日0时0分开始，如需要设置开始时间点，数组的值对应param参数的对应值。
            endTime: DateSelectorEndTime,//如空数组默认设置成次年12月31日23时59分结束，如需要设置结束时间点，数组的值对应param参数的对应值。
            recentTime: DateSelectorToDayTime,//如不需要设置当前时间，被为空数组，如需要设置的开始的时间点，数组的值对应param参数的对应值。
            beforeBack:function(){$('.result_menu').hide();},
            success: function (numArr,strArr) {
                //回调
                var ys_time = strArr.join('-');
                AjaxEvent('today',userxz,ys_time);
            }
        });
        // 运势数据分类
        function AjaxEvent(xzType,userxz,ys_time){
            $('.js_day_ys_xz').html(userxz.xz_time);
            $('.js_day_ys_icon').attr('src',userxz.xz_icon)
            if(xzType == "today"){
                console.log(ys_time+'今日运势')
                $('.loadingBox').show();
                $.post("<?php echo U('Zodiac/xzYunshiObtainRi','',false);?>",{ymd:ys_time,stars:userxz.xz_name},function(result){
                    var data = JSON.parse(result);
                    $('.js_day_ys_title').html(ys_time.split('-').join('.')+'&nbsp;-&nbsp;'+getDayTime(ys_time));
                    $('.aq_num').text(data.aiqing_num);
                    $('.cf_num').text(data.caifu_num);
                    $('.jk_num').text(data.jiankang_num);
                    $('.gz_num').text(data.shiye_num);
                    $('.lk_num').text(data.lucky_number)
                    $('.sp_xz').text(data.supei);
                    $('.lk_color').text(data.lucky_colour);
                    $('.zh_pj').text(data.zonghe);
                    var zh_num = Math.round((Number(data.shiye_num)+Number(data.jiankang_num)+Number(data.caifu_num)+Number(data.aiqing_num))/4);
                    $('.zh_num').text(zh_num);
                    startConstellationFX('#js_day_ys')
                })
            }if(xzType == "tomorrow"){
                console.log(ys_time+'明日运势')
                $('.loadingBox').show();
                $('.js_day_ys_title').html(ys_time.split('-').join('.')+'&nbsp;-&nbsp;'+getDayTime(ys_time));
                $.post("<?php echo U('Zodiac/xzYunshiObtainRi','',false);?>",{ymd:ys_time,stars:userxz.xz_name},function(result){
                    var data = JSON.parse(result);
                    $('.js_day_ys_title').html(ys_time.split('-').join('.')+'&nbsp;-&nbsp;'+getDayTime(ys_time));
                    $('.aq_num').text(data.aiqing_num);
                    $('.cf_num').text(data.caifu_num);
                    $('.jk_num').text(data.jiankang_num);
                    $('.gz_num').text(data.shiye_num);
                    $('.lk_num').text(data.lucky_number)
                    $('.sp_xz').text(data.supei);
                    $('.lk_color').text(data.lucky_colour);
                    $('.zh_pj').text(data.zonghe);
                    var zh_num = Math.round((Number(data.shiye_num)+Number(data.jiankang_num)+Number(data.caifu_num)+Number(data.aiqing_num))/4);
                    $('.zh_num').text(zh_num);
                    startConstellationFX('#js_day_ys')
                })
            }if(xzType == "week"){
                console.log('第'+ys_time+'周运势')
                $('.loadingBox').show();
                $('.wm_compre_wrap').hide();
                $.post("<?php echo U('Zodiac/xzYunshiObtainZhou','',false);?>",function(result){
                    var data = JSON.parse(result);
                    $('.js_day_ys_title').html('第'+'&nbsp'+ys_time+'&nbsp'+'周');
                    $('.jk_p').text(data.jiankang);
                    $('.gz_p').text(data.gongzuo);
                    $('.aq_p').text(data.ganqing);
                    $('.cy_p').text(data.caiyun);
                    startConstellationFX('#js_wm_ys')
                })
            }if(xzType == "month"){
                console.log(ys_time+'月运势')
                $('.loadingBox').show();
                $('.wm_compre_wrap').show();
                $.post("<?php echo U('Zodiac/xzYunshiObtainYue','',false);?>",function(result){
                    var data = JSON.parse(result);
                    $('.js_day_ys_title').html(ys_time.split('-')[0]+'年'+ys_time.split('-')[1]+'月');
                    $('.jk_p').text(data.jiankang);
                    $('.gz_p').text(data.gongzuo);
                    $('.aq_p').text(data.ganqing);
                    $('.cy_p').text(data.caiyun);
                    $('.wm_compre_c').text(data.zhengti);
                    startConstellationFX('#js_wm_ys')
                })
            }
        }
    </script>
</body>
</html>