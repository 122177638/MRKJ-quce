<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no">
    <title>周公解梦</title>
    <!--[if lt IE 9]>  
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
        <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/_zgjm.css">

    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan style='display:none;' id='cnzz_stat_icon_1275307351'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1275307351' type='text/javascript'%3E%3C/script%3E"));</script>

    <script src="/quce/Public/js/rem.js"></script>
</head>
<body>
    <!-- 主页 -->
    <div class="namenum_container">
        <div class="namenum_title"><img src="/quce/Public/images/zgjm/header.png" width="100%" alt=""></div>
        <div class="jm_seach_wrap">
            <input type="text" class="jm_ipt" placeholder="请输入梦境关键词">
            <span class="start_jm">开始解梦</span>
        </div>
        <div class="jm_promt">
            <p class="promt_t">常见的梦</p>
            <ul class="promt_c">
                <li>蛇</li>
                <li>女人</li>
                <li>死人</li>
                <li>鱼</li>
                <li>小孩</li>
                <li>打架</li>
            </ul>
        </div>
    </div>
    <!-- 搜索详情页 -->
    <div class="jm_container">
        <div class="jm_header">
            <div class="jm_seach_ipt">
                <input type="text" class="seach_c" oninput="importEvent(this)" placeholder="请输入梦境关键词">
                <span class="delete_ipt" onclick="deletevalueEvent()"></span>
            </div>
            <div class="start_jm2">解梦</div>
        </div>
        <div class="jm_seach_promt">与<span class="keyWord" style="color:#c80114"></span>相关的周公解梦</div>
        <ul class="jm_seach_list"></ul>
    </div>
    <!-- 查找失败 -->
    <div class="seach_fail_container">
        <div class="seach_icon"><img src="/quce/Public/images/zgjm/search.png" width="100%" alt=""></div>
        <div class="seach_fail_promt">
            <p>没有找到与</p>
            <p>【<span class="keyWord"></span>】</p>
            <p>有关的周公解梦</p>
            <p class="nextjm">再次解梦</p>
        </div>
    </div>
    <!-- 测算结果 -->
    <div class="result">
        <div class="result_container">
            <div class="result_wrap">
                <div class="result_wrap_t">梦见喜欢的女人</div>
                <div class="result_wrap_c">
                    <div class="result_wrap_tt">寓意是</div>
                    <div class="result_wrap_cc"></div>
                </div>

                <?php if($wxlogin == 1): ?><div class="QR_wrap">
                        <img src="/quce/Public/images/zgjm/qrcode_bx.png" width="100%" class="QR_icon" alt="">
                        <p>长按识别二维码，测测你的梦有什么寓意</p>
                    </div>
                    <?php else: endif; ?>

            </div>
        </div>
        <!-- 切换 -->
        <div class="result_img_container">
            <div class="result_img_center">
                <div class="result_imgwrap"><img src="" class="result_img" width="100%" alt="结果图片"></div>
                <div class="result_t_f">
                    <img src="/quce/Public/images/zgjm/backBtn.jpg" alt="返回" class="again">
                    <img src="/quce/Public/images/zgjm/saveBtn.png" alt="保存解梦卡" class="show">
                </div>
            </div>
        </div>
    </div>
    <!-- 提示保存 -->
    <div class="zwfy-report-cartoonBox">
        <div class="zwfy-report-cartoonBox-filter"></div>
        <img src="/quce/Public/images/zgjm/hand1.png" alt="" class="zwfy-report-cartoon zwfy-report-cartoon-active">
        <img src="/quce/Public/images/zgjm/hand2.png" alt="" class="zwfy-report-cartoon">
        <img src="/quce/Public/images/zgjm/hand3.png" alt="" class="zwfy-report-cartoon">
        <p>长按图片<br>即可保存到相册</p>
    </div>

    <!-- 加载 -->
    <div class="loadingBox">
        <div class="loading_wrap">
            <img src="/quce/Public/images/zgjm/loading.png" alt="" class="loading">
            <p>请稍等，加载中...</p>
        </div>
    </div>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/html2canvas2016.js"></script>
    <script src="/quce/Public/js/layer_mobile/layer.js"></script>
    <script src="/quce/Public/js/_zgjm.js"></script>
    <script>
        
        var iswx = "<?php echo ($wxlogin); ?>";
        if(iswx != 1){$('.show').hide()}
        // 数据
        var zgjmdata = []
        
        // 输入监听
        function importEvent(ele){
            var svalue = ele.value; 
            if(svalue == ""){
                $('.delete_ipt').css('display','none');
                $('.start_jm2').css('backgroundColor','rgba(0,0,0,0.4)')
            }else{
                $('.delete_ipt').css('display','block');
                $('.start_jm2').css('backgroundColor','#CF0131');
            }
        }
        // 清空输入框
        function deletevalueEvent(){
            $('.seach_c').val('');
            $('.delete_ipt').css('display','none');
            $(this).css('display','none');
            $('.start_jm2').css('backgroundColor','rgba(0,0,0,0.4)')
        }
        
        // 搜索解梦关键词
        $('.start_jm').on('click',function(){
            if($('.jm_ipt').val() == ""){
                layer.open({
                    content:'请输入梦境关键词',
                    skin:'msg',
                    time:2
                })
                return;
            }
            $('.seach_c').val($('.jm_ipt').val().trim());
            //显示等待界面
            $(".loadingBox").show();
            setTimeout(function(){
                ajaxServer($('.seach_c').val().trim())
            },1000)
        })
        
        // 主页点击关键词搜索
        $('.promt_c').find('li').on('click',function(){
            $(".loadingBox").show();
            let _self = $(this);
            setTimeout(function(){
                ajaxServer(_self.html())
            },1000)
        })

        // 搜索页解梦关键词
        $('.start_jm2').on('click',function(){
            if($('.seach_c').val() != ""){
               //显示等待界面
                $(".loadingBox").show();
                setTimeout(function(){
                    ajaxServer($('.seach_c').val().trim())
                },1000)
            }else{
                layer.open({
                    content:'请输入梦境关键词',
                    skin:'msg',
                    time:2
                })
            }
        })

        // 再次搜索解梦
        $('.nextjm').on('click',function(){
            $('.namenum_container').show();
            $('.seach_fail_container').hide();
            $('.jm_ipt').val('');
        })
        
        // 开始解梦
        function startjmEvent(ele){
            var zid = $(ele).attr('data-id');
            zgjmdata.forEach(function(item){
                if(item.zid == zid){
                    onStartHandle(item);
                }
            })
        }
        
        // 搜索
        function ajaxServer(keyWord){
            $.post("<?php echo U('Zodiac/zgjmSelect','',false);?>",{data:keyWord},function(data){
                var data = JSON.parse(data);
                zgjmdata = data;
                $('.seach_c').val(keyWord);
                $('.keyWord').text(keyWord);
                $('.jm_seach_list').html('');
                if(zgjmdata.length == ""){
                    $('.jm_container').hide();
                    $('.namenum_container').hide();
                    $('.seach_fail_container').show();
                }else{
                    zgjmdata.forEach(function(item){
                        var liStr = `
                            <li data-id="${item.zid}" onclick="startjmEvent(this)">
                                <div class="jm_scach_c">
                                    <p>${item.name}</p>
                                    <p>${item.text[0]}</p>
                                </div>
                                <div class="to_icon"></div>
                            </li>
                        ` 
                        $('.jm_seach_list').append(liStr)
                    });
                    $('.jm_container').show();
                    $('.namenum_container').hide();
                }
                $(".loadingBox").hide();     
            })
        }
    </script>
</body>
</html>