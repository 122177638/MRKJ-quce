<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="format-detection" content="telephone=no">
	<title>趣味心理测试</title>
	<!-- <link rel="Shortcut Icon" href="网站.ico图标路径" /> -->
	<!--[if lt IE 9]>  
		<script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
		<script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
	<![endif]-->
    <link rel="stylesheet" href="/quce/Public/css/common.css">
    <link rel="stylesheet" href="/quce/Public/css/_listdetails.css">
    <script src="/quce/Public/js/rem.js"></script>
    <script src="/quce/Public/js/vue.min.js"></script>
    <script src="/quce/Public/js/jquery.min.js"></script>
    <script src="/quce/Public/js/Headroom.js"></script>
    <style>
        .H_time{font-size:0.24rem;color:#8f8f94;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;margin-bottom:0.1rem;}
		.H_right .navigate_btn:nth-child(2){margin-top:0.3rem;}
		.major_promt{font-size:0.24rem;color:#3c3c3c;text-align: center;padding-top:0.2rem;}
		.major_promt a{text-decoration: none;color:#007aff;}
    </style>
</head>
<body>
    <div id="app">
		<header class="animated">
    <nav>
        <a href="<?php echo U('Index/index','',false);?>" class="navigate <?php echo ($head=='index' ? 'active':''); ?>">首页</a>
        <a href="<?php echo U('Index/mytest','',false);?>" class="navigate <?php echo ($head=='mytest' ? 'active':''); ?>">我的历史</a>
        <?php if($channel == 'qudao150'): else: ?>
            <a href="<?php echo U('Login/index','',false);?>" class="navigate <?php echo ($head=='login' ? 'active':''); ?>">我的</a><?php endif; ?>
    </nav>
</header>
        <!-- 全部测试 -->
        <main>
            <div class="major">
                <!-- <h3 class="public_title"><span class="p_text">全部测试</span></h3> -->
                <div class="tab">
                    <div :class="currtab==0?'curr':'navigatetwo'"  @click="setTapEvent(0)">我测过的</div>
                    <div :class="currtab==1?'curr':'navigatetwo'"  @click="setTapEvent(1)">我购买的</div>
				</div>
	
                <div v-show="currtab==0" class="qc_classlist">
                    <!-- 我测过的 -->
                    <ul v-if="HottestData.length != 0">
                        <li v-for="item in HottestData" :key="item.id" >
                            <a :href="subject+'?subject='+item.subject+'&id='+item.id" target="_blank" class="Hot_item">
                                <div class="H_left">
                                    <figure><img :src="'/quce/Public/images/quce/'+item.title_img" alt=""></figure>
                                    <div class="H_center">
                                        <p class="H_title">{{item.title}}</p>
                                        <p class="H_time">{{timeago(item.createtime*1000)}}</p>
                                        <p class="H_direction">{{item.content}}</p>
                                    </div>
                                </div>
                                <div class="H_right">
                                    <button class="navigate_btn">重测 ></button>
                                </div>
                            </a>
                        </li>
					</ul>
					<div v-else class="major_promt">亲，你做的测试去哪了？<a href="<?php echo U('Index/index','',false);?>">快来这里看看吧</a></div> 
                    <!-- 加载 -->
                    <div class="loadPoint" v-show="loadPoint">
                        <img src="/quce/Public/images/loading.gif" v-if="loadtext=='加载中...'" class="load_gif" alt="">{{loadtext}}
                    </div>
				</div>
                
                <div v-show="currtab==1" class="qc_classlist">
                    <!-- 我购买的 -->
                    <ul v-if="NewesttData.length != 0">
                        <li v-for="item in NewesttData" :key="item.id" >
                            <div class="Hot_item" >
                                <div class="H_left">
                                    <figure><img :src="'/quce/Public/images/quce/'+item.title_img" alt=""></figure>
                                    <div class="H_center">
                                        <p class="H_title">{{item.title}}</p>
                                        <p class="H_time">{{timeago(item.createtime*1000)}}</p>
                                        <p class="H_direction">{{item.content}}</p>
                                    </div>
                                </div>
                                <div class="H_right">
                                    <a :href="testEnd+'?orderid='+item.orderid" target="_blank" class="navigate_btn">查看结果 ></a>
                                    <a :href="subject+'?subject='+item.subject+'&id='+item.id" target="_blank" class="navigate_btn">再次测试 ></a>
                                </div>
                            </div>
                        </li>
					</ul> 
					<div v-else class="major_promt">亲，你做的测试去哪了？<a href="<?php echo U('Index/index','',false);?>">快来这里看看吧</a></div> 
                    <!-- 加载 -->
                    <div class="loadPoint" v-show="loadPoint1">
                        <img src="/quce/Public/images/loading.gif" v-if="loadtext1=='加载中...'" class="load_gif" alt="">{{loadtext1}}
                    </div>
                </div>
            </div>
            <!-- gotop -->
			<div id="goTop" @click="scrollTopEvent()"></div>
        </main>
    </div>
    <script>
        var vm = new Vue({
			el:'#app',
			data:{
				indexNavito:'',
				Hotpage:1,
				NewPage:1,
				currtab:0,
				HottestData:[],
				NewesttData:[],
				subject:"<?php echo U('Index/palace','',false);?>",
                testEnd:"<?php echo U('Paycs/jieguoye','',false);?>",
				loadPoint:false,
				loadPoint1:false,
				throttleB:true,
				loadtext:'加载中...',
				loadtext1:'加载中...',
			},
			mounted(){
				this.getsubjectData();
				this.loadpluginEvent();
				window.addEventListener('scroll',this.scrollBottomEvent,true);
			},
			methods:{
				// 获取数据
				getsubjectData(){
					var _self = this;
					$.get("<?php echo U('Index/mytest_free','',false);?>",{page:_self.Hotpage},function(data){
						var data = JSON.parse(data);
						_self.HottestData = data;
					});
					$.get("<?php echo U('Index/mytest_pay','',false);?>",{page:_self.NewPage},function(data){
						var data = JSON.parse(data);
						_self.NewesttData = data;
					});
				}, 
				// loadplugin
				loadpluginEvent(){
					// headroom     
					var headroom = new Headroom(document.querySelector('.tab'), {
						"tolerance": 8,
						"offset": 205,
						"classes": {
							"initial": "animated",
							"pinned": "slideInDown",
							"unpinned": "slideOutUp"
						}
					});
					headroom.init();// headroom.destroy(); 销毁实例

					var headroom1 = new Headroom(document.querySelector('#goTop'), {
						"tolerance": 8,
						"offset": -205,
						"classes": {
							"initial": "animated",
							"pinned": "bounceIn",
							"unpinned": "bounceOut"
						}
					});
					headroom1.init();// headroom.destroy(); 销毁实例
				},
				// tab切换
				setTapEvent(index){this.currtab = index;},
				// 返回顶部
				scrollTopEvent(){$('html,body').animate({scrollTop:0},700)},
				// 上拉加载
				scrollBottomEvent(){
					var _self = this;
					var scrollTop = document.documentElement.scrollTop || window.pageYOffset|| document.body.scrollTop;
					var scrollHeight = document.body.scrollHeight;
					var screenHeight = window.screen.height;
					if(scrollHeight - scrollTop < screenHeight+1){
						if(_self.currtab == "0"){
							_self.loadPoint = true;
							if(!_self.throttleB){ return;}
							if(_self.throttleB){
								_self.throttleB = false;
								setTimeout(function(){
									_self.Hotpage++;
									$.get("<?php echo U('Index/indexAnswer','',false);?>",{page:_self.Hotpage},function(data){
										var data = JSON.parse(data);
										if(data[0].content != undefined){
											data.forEach(function (item){
												_self.HottestData.push(item)
											});
										}else{
											_self.loadtext = "没有更多了"
										}
									}); 
									_self.throttleB =true;
								},200)
							}
						}else if(_self.currtab == "1"){
							_self.loadPoint1 = true;
							if(!_self.throttleB){ return;}
							if(_self.throttleB){
								_self.throttleB = false;
								setTimeout(function(){
									_self.NewPage++;
									$.get("<?php echo U('Index/mytest_pay','',false);?>",{page:_self.NewPage},function(data){
										var data = JSON.parse(data);
										if(data[0].content != undefined){
											data.forEach(function (item){
												_self.NewesttData.push(item)
											});
										}else{
											_self.loadtext1 = "没有更多了"
										}
									}); 
									_self.throttleB =true;
								},200)
							}
						}
					}
				},
				// 时间转文字时间
				timeago(dateTimeStamp){   //dateTimeStamp是一个时间毫秒，注意时间戳是秒的形式，在这个毫秒的基础上除以1000，就是十位数的时间戳。13位数的都是时间毫秒。
					var minute = 1000 * 60;      //把分，时，天，周，半个月，一个月用毫秒表示
					var hour = minute * 60;
					var day = hour * 24;
					var week = day * 7;
					var halfamonth = day * 15;
					var month = day * 30;
					var now = new Date().getTime();   //获取当前时间毫秒

					var diffValue = now - dateTimeStamp;//时间差

					if(diffValue < 0){
						return;
					}
					var minC = diffValue/minute;  //计算时间差的分，时，天，周，月
					var hourC = diffValue/hour;
					var dayC = diffValue/day;
					var weekC = diffValue/week;
					var monthC = diffValue/month;
					if(monthC >= 1 && monthC <= 3){
						result = " " + parseInt(monthC) + "月前"
					}else if(weekC >= 1 && weekC <= 3){
						result = " " + parseInt(weekC) + "周前"
					}else if(dayC >= 1 && dayC <= 6){
						result = " " + parseInt(dayC) + "天前"
					}else if(hourC >= 1 && hourC <= 23){
						result = " " + parseInt(hourC) + "小时前"
					}else if(minC >= 1 && minC <= 59){
						result =" " + parseInt(minC) + "分钟前"
					}else if(diffValue >= 0 && diffValue <= minute){
						result = "刚刚"
					}else {
						var datetime = new Date();
						datetime.setTime(dateTimeStamp);
						var Nyear = datetime.getFullYear();
						var Nmonth = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
						var Ndate = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
						var Nhour = datetime.getHours() < 10 ? "0" + datetime.getHours() : datetime.getHours();
						var Nminute = datetime.getMinutes() < 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();
						var Nsecond = datetime.getSeconds() < 10 ? "0" + datetime.getSeconds() : datetime.getSeconds();
						result = Nyear + "-" + Nmonth + "-" + Ndate
					}
					return result;
				}
			}
		})

        var ordernum='<?php echo ($orderid); ?>';
        var serData=1;
        if(ordernum){
            var intrval= setInterval(function(){
                $.getJSON("<?php echo U('Index/selectLoop','',false);?>",{number:1,ordernum:ordernum},function(data){
                    serData++;
                   if(data==1){
                       location.href="<?php echo U('Paycs/jieguoye','',false);?>?orderid="+ordernum;
                   }
                    if(serData>80){
                        clearInterval(intrval);
                    }
                });
            },4000);
        }

	</script>
</body>
</html>