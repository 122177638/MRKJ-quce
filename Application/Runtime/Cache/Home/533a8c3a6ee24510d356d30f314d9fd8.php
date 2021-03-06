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
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/echarts.min.js"></script>
    <style>
        /* shenti */
        .result_container{background-color:#f6f0ea;}
        .order_top_info{font-size:0.28rem;color: #989898;text-align: center;padding:0.2rem;background-color:#ffffff;}
        .order_top_info span{color:#333333;}
        .result_wrap{
            margin:0.2rem;
            background-color:#ffffff;
            border-radius: 0.1rem;
        }
        #pie_echart_wrap{
            min-height:3.35rem;
            background:url('/quce/Public/images/cstest/pirBg.png') no-repeat;
            background-size:contain;
        }
        .pie_more{
            font-size:0.26rem;
            color:#999999;
            text-align: center;
            padding:0.32rem 0;
            position: relative;
        }
        .pie_more::after{
            content:'';
            border:0.1rem solid transparent;
            border-top-color: #989898;
            position: absolute;
            left:50%;
            bottom:0;
            margin-left:-0.1rem;
        }
        .result_p{
            font-size:0.3rem;
            color:#333333;
            padding:0.1rem 0.2rem 0.2rem;
        }
        .dashedHr{
            border-top:1px dashed #585558;
            margin:0 0.2rem 0.6rem;
            padding-top:0.2rem;
            font-size:0.3rem;
            color:#333333;
        }
        .result_list{list-style: none;}
        .result_item{
            margin-bottom:0.3rem;
        }
        .result_item:nth-last-child(1){margin-bottom:0;}
        .result_title{
            font-size:0.36rem;
            color: #ffffff;
            width:4.6rem;
            height:0.8rem;
            line-height: 0.8rem;
            margin:0 auto;
            text-align: center;
            background:url('/quce/Public/images/cstest/bj.png') no-repeat;
            background-size: 100% 100%;
        }
        .result_index{
            display: inline-block;
            background-color:#ffffff;
            width:0.5rem;
            height:0.5rem;
            line-height: 0.5rem;
            border-radius: 50%;
            color:#FF5500;
            margin-right:0.2rem;
        }
        .result_content{
            font-size:0.3rem;
            color:#333333;
            padding:0.3rem 0.2rem;
            line-height: 1.5;
        }
        .qszs_wrap{
            font-size:0.3rem;
            color:#333333;
            padding:0.4rem 0.24rem;
            display: flex;
            align-items: center;
        }
        .qszs_wrap .qszs_l{display: block;}
        .qszs_wrap .qszs_r{margin-left:0.4rem;} 
        .qszs_r .xing{
            display: inline-block;
            width:0.56rem;
            height:0.52rem;
            background:url('/quce/Public/images/qstest/icon_xx1.png') no-repeat;
            background-size:100% 100%;
            margin-right:0.2rem;
        }
        .qszs_r .xing:nth-last-child(1){margin-right:0}
        .qszs_r .xing.on{
            background:url('/quce/Public/images/qstest/icon_xx.png') no-repeat;
            background-size:100% 100%;
        }
        .qszs_c{padding:0 0.24rem;font-size:0.3rem;color:#333333;}
        .result_jy{margin:0.2rem 0;}
        .result_jy_c{margin-bottom:0.2rem;font-size:0.28rem;}
        .result_jy_c:nth-last-child(1){margin-bottom: 0;}
        .result_jy_c p:nth-child(1){font-size:0.28rem;font-weight: 700;}
    </style>
</head>
<body>
    <div id="app">
        
<!-- header -->
<header class="public_header_container">
    <nav class="public_header_nav">
        <a href="<?php echo U('Index/index','',false);?>" class="public_header_home"></a>
        <h1 class="public_header_title"><?php echo (cookie('titleName')); ?></h1>
        <a href="<?php echo U('Index/mytest','',false);?>" class="public_header_mytest">我的测算</a>
    </nav>
</header>
        <div class="result_container">
            <div class="order_top_info">订单号：<span>{{result.orderid}}</span></div>
            <section class="result_wrap">
                <div id="pie_echart_wrap"></div>
                <div class="qszs_wrap">
                    <label class="qszs_l">你的情商指数：</label>
                    <div class="qszs_r"><span :class="['xing',result.zongfenArr.star>index?'on':'']" v-for="(item,index) in 5"></span></div>
                </div>
                <p class="qszs_c">{{result.zongfenArr.text}}</p>
                <div class="pie_more">详情见以下图表</div>
            </section>
            <section class="result_wrap">
                <div id="x_echart_wrap" style="height:4.5rem;"></div>
                <p class="result_p">您在本测试中控制情绪的能力为<span style="color:#ff5500">{{result.kongzhiQXfen}}分</span>,处在人群中{{numIf(result.kongzhiQXfen)}}的位置</p>
                <p class="result_p">你在本测试中处理情绪的能力为<span style="color:#00aaff">{{result.chuliQXfen}}分</span>，处在人群{{numIf(result.chuliQXfen)}}的位置</p>
            </section>
            <section class="result_wrap">
                <div id="radar_eachart" style="width:100%;height:4.5rem;"></div>
                <p class="result_p">您在本测试中认识自己的得分为<span style="color:#ff5500">{{result.rszj.fraction}}分</span>。</p>
                <p class="result_p">您在本测试中激励自己的得分为<span style="color:#ff5500">{{result.jlzj.fraction}}分</span>。</p>
                <p class="result_p">您在本测试中管理自己的得分为<span style="color:#ff5500">{{result.glzj.fraction}}分</span>。</p>
                <p class="result_p">您在本测试中认识别人的得分为<span style="color:#ff5500">{{result.rsbr.fraction}}分</span>。</p>
                <p class="result_p">您在本测试中管理别人的得分为<span style="color:#ff5500">{{result.glbr.fraction}}分</span>。</p>
                <p class="dashedHr">本次情商报告的解读分为认识自己、激励自己、管理自己、认识别人、管理别人5个分能力模型。</p>
                <ul class="result_list">
                    <li class="result_item">
                        <div class="result_title"><span class="result_index">01</span>{{result.rszj.title}}</div>
                        <div class="result_content">
                            <p>{{result.rszj.text}}</p>
                            <div class="result_jy_content" v-if="result.rszj.gsjy">
                                <h4 class="result_jy">{{result.rszj.gsjy.Btitle}}</h4>
                                <div class="result_jy_c" v-for="item in result.rszj.gsjy.data">
                                    <p>{{item.title}}</p>
                                    <p>{{item.text}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="result_item">
                        <div class="result_title"><span class="result_index">02</span>{{result.jlzj.title}}</div>
                        <div class="result_content">
                            <p>{{result.jlzj.text}}</p>
                            <div class="result_jy_content" v-if="result.jlzj.gsjy">
                                <h4 class="result_jy">{{result.jlzj.gsjy.Btitle}}</h4>
                                <div class="result_jy_c" v-for="item in result.jlzj.gsjy.data">
                                    <p>{{item.title}}</p>
                                    <p>{{item.text}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="result_item">
                        <div class="result_title"><span class="result_index">03</span>{{result.glzj.title}}</div>
                        <div class="result_content">
                            <p>{{result.glzj.text}}</p>
                            <div class="result_jy_content" v-if="result.glzj.gsjy">
                                <h4 class="result_jy">{{result.glzj.gsjy.Btitle}}</h4>
                                <div class="result_jy_c" v-for="item in result.glzj.gsjy.data">
                                    <p>{{item.title}}</p>
                                    <p>{{item.text}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="result_item">
                        <div class="result_title"><span class="result_index">04</span>{{result.rsbr.title}}</div>
                        <div class="result_content">
                            <p>{{result.rsbr.text}}</p>
                            <div class="result_jy_content" v-if="result.rsbr.gsjy">
                                <h4 class="result_jy">{{result.rsbr.gsjy.Btitle}}</h4>
                                <div class="result_jy_c" v-for="item in result.rsbr.gsjy.data">
                                    <p>{{item.title}}</p>
                                    <p>{{item.text}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="result_item">
                        <div class="result_title"><span class="result_index">05</span>{{result.glbr.title}}</div>
                        <div class="result_content">
                            <p>{{result.glbr.text}}</p>
                            <div class="result_jy_content" v-if="result.glbr.gsjy">
                                <h4 class="result_jy">{{result.glbr.gsjy.Btitle}}</h4>
                                <div class="result_jy_c" v-for="item in result.glbr.gsjy.data">
                                    <p>{{item.title}}</p>
                                    <p>{{item.text}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- footer -->
            <!-- footer -->
<footer class="public_fonter_container">
    <div class="public_fonter_content">
        <img src="/quce/Public/images/QR_core.png" width="30%" class="public_QRicon" alt="">
        <p>长按二维码添加客服微信</p>
        <p>在线服务时间：周一至周五9:00-18:00</p>
        <p><small>(以上测试纯属测试本身，不作为证明任何人财商能力的依据)</small></p>
    </div>
</footer>
        </div>
        
    </div>
    <script>
        var vm = new Vue({
            el:'#app',
            data:{
                result:{
                    glbr:'',
                    orderid:'',
                    chuliQXfen:'',
                    glzj:'',
                    jlzj:'',
                    rsbr:'',
                    rszj:'',
                    kongzhiQXfen:'',
                    zongfen:'',
                    zongfenArr:''
                }
            },
            mounted() {
                this.ajaxData();
            },
            methods:{
                numIf(num){
                    if(num <= 4){
                        return '较高'
                    }else if(num > 4 && num <= 8){
                        return '很高'
                    }else if(num > 8){
                        return '非常高'
                    }
                },
                numIf2(num){
                    if(num <= 40){
                        return '较高'
                    }else if(num > 40 && num <= 80){
                        return '很高'
                    }else if(num > 80){
                        return '非常高'
                    }
                },
                ajaxData(){
                    var _self = this;
                    $.post("<?php echo U('Paycs/jieguoyeJson','',false);?> ",function(data){
                        _self.result = JSON.parse(data);
                        console.log(_self.result)
                        _self.$nextTick(function(){_self.echartsInit();})
                    })
                },
                echartsInit(){
                    var _self  = this;
                    let pie_echart_wrap = echarts.init(document.getElementById('pie_echart_wrap'));
                    let option1 = {
                        title:[
                            {
                                text:'本次测试中的得分',
                                x:'8.5%',
                                y:'bottom',
                                textStyle:{
                                    fontSize:15,
                                    color:'#333333',
                                    fontWeight:'normal'
                                }
                            },
                            {
                                text:'人群中的位置',
                                x:'58%',
                                y:'bottom',
                                textStyle:{
                                    fontSize:15,
                                    color:'#333333',
                                    fontWeight:'normal'
                                }
                            }
                        ],
                        series: [
                            {
                                name:'本次测试中的得分',
                                type:'pie',
                                radius: ['58%', '65%'],
                                center:['27%','45%'],
                                avoidLabelOverlap: false,
                                hoverAnimation:false,
                                left:'50%',
                                label: {
                                    normal: {
                                        show: true,
                                        position:'center',
                                        fontSize:27,
                                    },
                                },
                                labelLine: {
                                    normal: {
                                        show: false
                                    }
                                },
                                data:[
                                    {value:_self.result.zongfen, name:`${_self.result.zongfen}分`,},
                                    {value:(100-_self.result.zongfen),name:''},
                                ],
                                color:['#FF5500','#cccccc']
                            },
                            {   
                                name:'人群中的位置',
                                type:'pie',
                                radius: ['58%', '65%'],
                                center:['73%','45%'],
                                avoidLabelOverlap: false,
                                hoverAnimation:false,
                                label: {
                                    normal: {
                                        show: true,
                                        position:'center',
                                        fontSize:27
                                    },
                                }, 
                                labelLine: {
                                    normal: {
                                        show: false
                                    },
                                },
                                data:[
                                    {value:_self.result.zongfen, name:_self.numIf2(_self.result.zongfen)},
                                    {value:(100-_self.result.zongfen),name:''},
                                ],
                                color:['#00AAFF','#cccccc']
                            }
                        ]
                    };
                    pie_echart_wrap.setOption(option1)
                    
                    let x_echart_wrap = echarts.init(document.getElementById('x_echart_wrap'));
                    let option2 = {
                        title:{
                            text:'控制情绪能力与处理情绪的能力',
                            left:'50%',
                            top:'5%',
                            textAlign:'center',
                            textStyle: {
                            }
                        },
                      
                        tooltip : {
                            trigger: 'axis',
                            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                                type : 'line',        // 默认为直线，可选为：'line' | 'shadow'
                            }
                        },
                        grid: {
                            show:true,
                            left: '4%',
                            right: '8%',
                            bottom: '3%',
                            containLabel: true,
                            tooltip:{
                                show:'axis',
                            }
                        },
                        xAxis : [
                            {
                                min:0,
                                max:10,
                                // interval:0.2
                            }
                        ],
                        yAxis : [
                            {
                                type : 'category',
                                data : ['处理\n情绪的能力','控制\n情绪的能力'],
                            }
                        ],
                        series : [
                            {
                                name:'得分',
                                type:'bar',
                                barWidth: '10%',
                                data:[_self.result.chuliQXfen, _self.result.kongzhiQXfen],
                                tooltip:{
                                    fromatter:'13'
                                },
                                itemStyle:{
                                    normal: {
                                        // 随机显示
                                        // color:function(d){return "#"+Math.floor(Math.random()*(256*256*256-1)).toString(16);}
                                        // 定制显示（按顺序）
                                        color: function(params) { 
                                            var colorList = ['#00AAFF','#FF5500']; 
                                            return colorList[params.dataIndex] 
                                        }
                                    },
                                },
                            },
                        ]
                    };
                    x_echart_wrap.setOption(option2)

                    let radar_eachart = echarts.init(document.getElementById('radar_eachart'));
                    let option3 = {
                        color: ['#FF5500'],
                        title:{
                            text:'情商分能力模型',
                            left:'50%',
                            top:'5%',
                            textAlign:'center'
                        },
                        tooltip : {
                            trigger: 'axis',
                        },
                        radar: [
                            {
                                indicator: [
                                    {text: '管理别人的能力', max: 10,color:'#333333'},
                                    {text: '认识自己的能力', max: 10,color:'#333333'},
                                    {text: '激励自己的能力', max: 10,color:'#333333'},
                                    {text: '管理自己的能力', max: 10,color:'#333333'},
                                    {text: '认识别人的能力', max: 10,color:'#333333'}
                                ],
                                center: ['50%','58%'],
                                radius:60,
                            },
                        ],
                        series : [
                            {
                                type: 'radar',
                                tooltip: {
                                    trigger: 'item'
                                },
                                itemStyle: {normal: {areaStyle: {type: 'default'}}},
                                data: [
                                    {
                                        value: [_self.result.glbr.fraction,_self.result.rszj.fraction,_self.result.jlzj.fraction,_self.result.glzj.fraction,_self.result.rsbr.fraction],
                                        name: '情商能力'
                                    }
                                ]
                            },
                        ]
                    };
                    radar_eachart.setOption(option3)
                }
            }
        })
        window.history.pushState(null,null,location.href);
        window.addEventListener('popstate',function(){
            window.location.href="<?php echo U('Index/mytest','',false);?>"
        })
    </script>
</body>
</html>