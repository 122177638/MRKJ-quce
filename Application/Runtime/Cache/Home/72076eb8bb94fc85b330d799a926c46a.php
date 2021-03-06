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
	<!--[if lt IE 9]>  
		<script src="http://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
		<script src="https://cdn.bootcss.com/respond./quce/Public/js/1.4.2/respond.min.js"></script>    
    <![endif]-->
    <script src="/quce/Public/js/rem.js"></script>
    <style>
        *{margin:0;padding:0;}
        html,body{height: 100%;}
        .answer {
            position: relative;
            min-height: 100%;
            min-height: 100vh;
        }
        .answer_container{
            padding:0.7rem 0.4rem 0;
            min-height:100%;
            min-height:100vh;
            box-sizing: border-box;
            background: #ffffff url('/quce/Public/images/answer_bg.png') repeat;
            background-size: 0.7rem;
        }
        .answer_title{text-align: center;color:#333333;font-size:0.46rem;line-height: 1.63;}
        .answer_promt{text-align: center;color:#999999;font-size:0.24rem;padding: .2rem 0 .4rem;}
        .answer_content{
            color: #666;
            line-height: 1.5!important;
            margin-bottom: .56rem;
            padding: 0.5rem 0.3rem 0;
            background: #fff;
            border: 0.03rem solid #dddddd;
            border-radius: 4px;
        }
        .a_color{background-color:#ffdd2b;color:#000000;font-size: 0.32rem;}
        .answer_content p{margin-bottom:0.4rem;font-size:0.28rem;color:#666666}
        .answer_content .a_f_promt{color:#b2b2b2;font-size:0.24rem;}
        .answerGo{
            width:60%;
            background-color:#FFDD2B;
            font-size:0.32rem;
            color:#333333;
            height:0.9rem;
            line-height: 0.9rem;
            text-align: center;
            border-radius:4px;
            margin:0 auto 0.5rem;
            -webkit-tap-highlight-color: transparent;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="answer">
            <div class="answer_container">
                <h2 class="answer_title">专业爱情测评&nbsp;|&nbsp;壹<br>心理版</h2>
                <p class="answer_promt">测前须知</p>
                <div class="answer_content">
                    <p>在做题过程中，请注意一下几点：</p>
                    <p>1. 测试一共<span class="a_color">44题</span>，请尽量在<span class="a_color">30分钟内</span>完成，否则数据可能无法保存（右上方有时间进度条）；</p>
                    <p>2. 答案没有对错之分，如实作答即可，若遇到难以抉择的问题，请根据第一感觉作答，你的作答将得到严格保密；</p>
                    <p>3. 如遇电话，死机等导致测试中断，可到公众号找回，系统将保留你的答案记录。</p>
                    <div class="answerGo">好的，Go!</div>
                    <p class="a_f_promt">温馨提示：可到 “我的测评” 查看所有付费测试的订单状态。</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.answerGo').onclick = function(){
            location.href = "payEndtesting.html";
        }
    </script>
</body>
</html>