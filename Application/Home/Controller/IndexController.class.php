<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//用户使用的浏览器，操作系统等信息。
        if (strpos($user_agent, 'MicroMessenger') == false) {
            //非微信浏览器访问
            cookie('wxlogin',0);
        }else{
            cookie('wxlogin',1);
            getToken();
            getTicket();
            $wzurl=wxJsdkData();

            if(!empty($_REQUEST['code'])){
                cookie('code',$_REQUEST['code'],7100);
            }
            wxGetCode($wzurl);
            Caccess_token();
            cookie('uid',cookie('openid'));
        }

        cookie('orderid',null);
        if(!empty($_REQUEST['uid'])){
            cookie('uid',$_REQUEST['uid']);
        }else{
            $uid=cookie('uid');
            if(empty($uid)){//生成唯一标识
                $imei=date('Ymd').mt_rand(10000,99999).date('His');
                cookie('uid',$imei);}
        }
        if($_REQUEST['channel']!=''){
            cookie('channel',$_REQUEST['channel']);//获取渠道号
        }

        $channel=cookie('channel');
        if($channel=='qudao150'){
            $zhimingArr=M()->query("select * from qc_zhiming_link where type='zhiming' and id<=8");
        }else{
            $zhimingArr=M()->query("select * from qc_zhiming_link where type='quce' limit 8");
        }
        $this->assign("zhimingArr",$zhimingArr);
        $this->assign('channel',$channel);

        //banner
        $bannerArr=M()->query("select * from qc_zhiming_link where type='banner' ");
        $this->assign("bannerArr",$bannerArr);


        $newArr=M()->query("select title,subject from qc_choiceti_answer where id>1 order by id desc limit 5");//弹窗最新数据
        $this->assign("newArr",$newArr);
        $choiceArr=M()->query("select name,type from qc_choiceti_type where id>0 order by sort ");//测试分类
        $this->assign('choiceArr',$choiceArr);

        //打乱排序
        $anserArr=M()->query("select id from qc_choiceti_answer where id<72 or id>79");
        foreach($anserArr as $key=>$value){
            $numX=mt_rand(0,90);$numY=mt_rand(0,90);
            M()->query("update qc_choiceti_answer set sort_new={$numX},sort_hot={$numY} where id={$value['id']}");
        }

        $this->assign('head','index');
        $this->display("Index/index");
    }
    public function zhimingLink(){//
        $zhimingArr=M()->query("select * from qc_zhiming_link where id<9");
        echo json_encode($zhimingArr);
    }
    public function answer(){//接口答案
        $subject=cookie('subject');
        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
        }
        $totalnum=$_REQUEST['totalnum'];
        if($totalnum){
            if(is_numeric($subject)){
                $arr=M()->query("select * from qc_choiceti_answer where id='{$subject}' LIMIT 1");
            }else{
                $arr=M()->query("select * from qc_choiceti_answer where subject='{$subject}' LIMIT 1");
            }
             for($i=1;$i<=6;$i++){
                  $answerF='answer'.$i.'_fen';
                 $answer='answer'.$i;
                 $answerT='answer'.$i.'_text';
                 if($totalnum<=$arr[0][$answerF]){
                     $arrF['title']=$arr[0][$answer];
                     $arrF['text']=$arr[0][$answerT];
                     echo json_encode($arrF);exit;
                 }
             }
        }else{
            if(is_numeric($subject)){
                $arr=M()->query("select * from qc_choiceti_answer where id='{$subject}' LIMIT 1");
            }else{
                $arr=M()->query("select * from qc_choiceti_answer where subject='{$subject}' LIMIT 1");
            }
        }
        echo json_encode($arr[0]);
    }
    public function topic($paySubject=null){//接口题目
        $subject=cookie('subject');
        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
        }
        if($paySubject!=''){
            $subject=$paySubject;
        }
        $subjectStr=mb_substr($subject,-1,1);
       if($subjectStr=='F'){
           if(is_numeric($subject)){
               $arr=M()->query("select * from qc_choiceti_topic_f where answerId='{$subject}'");
           }else{
               $arr=M()->query("select * from qc_choiceti_topic_f where subject='{$subject}'");
           }
           $count=count($arr);
           for($k=0;$k<$count;$k++){
               for($i=1;$i<5;$i++){
                   $dataTimu="timu_answer{$i}";
                   $timu_fen='timu_answer'.$i.'_fen';
                   if($arr[$k][$dataTimu]){
                       $arr[$k]['timu'][$i]['title']=$arr[$k][$dataTimu];
                       $arr[$k]['timu'][$i]['fen']=$arr[$k][$timu_fen];
                       $arr[$k][$dataTimu]='';
                       $arr[$k][$timu_fen]='';
                   }
               }
               $arr[$k]=array_filter($arr[$k]);
           }
       }else{
           if(is_numeric($subject)){
               $arr=M()->query("select * from qc_choiceti_topic where answerId='{$subject}'");
           }else{
               $arr=M()->query("select * from qc_choiceti_topic where subject='{$subject}'");
           }

           $count=count($arr);
           for($k=0;$k<$count;$k++){
               for($i=1;$i<5;$i++){
                   $dataTimu="timu_answer{$i}";
                   if($arr[$k][$dataTimu]){
                       $arr[$k]['timu'][$i]=$arr[$k][$dataTimu];
                       $arr[$k][$dataTimu]='';
                   }
               }
               $arr[$k]=array_filter($arr[$k]);
           }
       }

        if($paySubject!=''){
            return $arr;
        }
        echo json_encode($arr);
    }

    public function classlist(){//更多分类
        $this->display('index/classlist');
    }
    public function indexAnswer(){//首页数据-最热
        $page=$_REQUEST['page'];//页数
        $number=10;//条数
        $lt=$number*$page-$number;
        $gt=$number*$page;
//        $arr=M()->query("select id,title,content,subject,title_img,hotstar from qc_choiceti_answer where  id<{$gt} and id>{$lt}");
        $arr=M()->query("select id,title,content,subject,title_img,hotstar,type_img from qc_choiceti_answer where  id>0 and title_img is not null and title_img!=' '  order by sort_hot desc limit {$lt},{$number}");
        $arr[0]['page']=$_REQUEST['page'];
        foreach($arr as $key=>$value){
            if($value['type_img']==1){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }else if($value['type_img']==2){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/original.png';
            }else if($value['type_img']==3){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }
        }

        echo json_encode($arr);
    }
    public function indexAnswerNew(){//首页数据-最新
        $page=$_REQUEST['page'];//页数
        $number=10;//条数
        $lt=$number*$page-$number;
        $arr=M()->query("select id,title,content,subject,title_img,hotstar,type_img from qc_choiceti_answer where id>0 and title_img is not null and title_img!=' '  order by sort_new desc limit {$lt},10 ");
        $arr[0]['page']=$_REQUEST['page'];
        foreach($arr as $key=>$value){
            if($value['type_img']==1){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }else if($value['type_img']==2){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/original.png';
            }else if($value['type_img']==3){
                $arr[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }
        }
        echo json_encode($arr);
    }
    public function AnswerPalace(){//输出结果
        $data=$_REQUEST['Answer'];

        $subject=cookie('subject');
        $totalnum=$_REQUEST['totalnum'];
        if($totalnum){//计分类型
            $arr=M()->query("select * from qc_choiceti_answer where subject='{$subject}' LIMIT 1");
            for($i=1;$i<=6;$i++){
                $answerF='answer'.$i.'_fen';
                $answer='answer'.$i;
                $answerT='answer'.$i.'_text';
                if($totalnum<=$arr[0][$answerF]){
                    $arrF['title']=$arr[0][$answer];
                    $arrF['text']=$arr[0][$answerT];
                    echo json_encode($arrF);
                    exit;
                }
            }
        }

        //跳转类型
        if($data=='A'){$number=1;
        }else if($data=='B'){$number=2;
        }else if($data=='C'){$number=3;
        }else if($data=='D'){$number=4;
        }else if($data=='E'){$number=5;
        }else if($data=='F'){$number=6;
        }
        $subject=cookie('subject');
        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
        }

        if(is_numeric($subject)){
            $arr=M()->query("select title,answer{$number},answer{$number}_text,answer{$number}_img from qc_choiceti_answer where id='{$subject}' LIMIT 1");
        }else{
            $arr=M()->query("select title,answer{$number},answer{$number}_text,answer{$number}_img from qc_choiceti_answer where subject='{$subject}' LIMIT 1");
        }
        $answerimg=$arr[0]["answer{$number}_img"];
        $strData=mb_substr($answerimg,-3);
        if($strData=='jpg'){
            $returnPath= __ROOT__."/Public/images/answer/{$answerimg}";
        }else{
            $returnPath=$this->imgMerge($answerimg,$arr[0]['title']);
        }

        $arrAnswer=array();
        $arrAnswer['title']=$arr[0]['title'];
        $arrAnswer['answer']=$arr[0]["answer{$number}"];
        $arrAnswer['text']=$arr[0]["answer{$number}_text"];
        $arrAnswer['img']=$returnPath;
        $arrAnswer['data']=$data;

        echo json_encode($arrAnswer);
    }
    public function palace(){//测算页面
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//用户使用的浏览器，操作系统等信息。
        if (strpos($user_agent, 'MicroMessenger') == false) {
            //非微信浏览器访问
            cookie('wxlogin',0);
        }else{
            cookie('wxlogin',1);
            $openid=cookie('openid');
            if(empty($openid)){
                getToken();
                getTicket();
                $wzurl=wxJsdkData();
                if(!empty($_REQUEST['code'])){
                    cookie('code',$_REQUEST['code'],7100);
                }
                getCode($wzurl);
                getOopenid($wzurl);
            }
            cookie('uid',cookie('openid'));
        }
        if($_REQUEST['channel']!=''){
            cookie('channel',$_REQUEST['channel']);//获取渠道号
        }

        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
            cookie('subject',$subject);
        }else if(cookie('subject')){
            $subject=cookie('subject');
        }
        if($_REQUEST['id']){
            $id=$_REQUEST['id'];
            cookie('id',$id);
            if(empty($_REQUEST['subject'])){
                $subject=$id;
            }
        }

        //点击次数累积
        $answerArr=M()->query("select id,hotstar,click,type_img,subject from qc_choiceti_answer where id='{$id}' limit 1");
        $click=$answerArr[0]['click'];
        if($click>=100){
            M()->query("update qc_choiceti_answer set hotstar={$answerArr[0]['hotstar']}+0.1,click=1 where id='{$answerArr[0]['id']}'");
        }else{
            M()->query("update qc_choiceti_answer set click='{$answerArr[0]['click']}'+1 where id='{$answerArr[0]['id']}'");
        }
        //查询是否是超链接
        $dataStr=mb_substr($subject,0,7);
        if($dataStr=='zhiming'){
            $zhimingArr=M()->query("select link,type from qc_zhiming_link where subject='{$subject}'");
        }

        if($zhimingArr){
            if($zhimingArr[0]['type']=='jiance'){
                $url=$zhimingArr[0]['link'].'&channel='.cookie('channel');
            }else{
                $url=$zhimingArr[0]['link'].'?channel='.cookie('channel');
            }
            header("location:".$url);exit;
        }

        $uid=cookie('uid');
        $channel=cookie('channel');
        M()->query("insert into qc_click_order (subject,uid,channel)values('{$subject}','{$uid}','{$channel}')");

        if($answerArr[0]['type_img']=='3'){//跳转专业测算
            //渠道获取ID
            $channelID=obtain_channelID($subject);
            $this->assign('channelID',$channelID);

            $subject=$answerArr[0]['subject'];
            if($subject=='QWCS20F'||$subject=='QWCS21F'){
                if(cookie('jploginHC')==''){
                    cnzz_pvuv($subject);//执行统计
                    cookie('jploginHC',1,15);
                }
            }

            if($subject=='QWCS20F'){
                cookie('titleName','财商测试');
                $this->display('Payorder/csIndex');exit;
            }else if($subject=='QWCS21F'){
                cookie('titleName','情商测试');
                $this->display('PayorderQs/qsIndex');exit;
            } else{
                redirect(U('Paycs/paypage','',false)."?subject={$subject}&id={$id}");
            }
            exit;
        }

        //我的测算记录
        $freeOrder=M()->query("select id from qc_free_order where answerId='{$id}' and uid='{$uid}' limit 1");
        $freeOrderArr=M()->query("select id from qc_free_order where uid='{$uid}' order by id desc limit 1");
        if($freeOrder&&$freeOrderArr[0]['id']>$freeOrder[0]['id']){
           M()->query("delete from qc_free_order where answerId='{$id}' and uid='{$uid}'");
            M()->query("insert into qc_free_order (answerId,subject,uid)values('{$id}','{$subject}','{$uid}')");
        }
        if(empty($freeOrder)){
            M()->query("insert into qc_free_order (answerId,subject,uid)values('{$id}','{$subject}','{$uid}')");
        }

        cookie('subject',$subject);
        $userData=cookie('userText');
        $this->assign('userData',$userData);

        $subjectStr=mb_substr($subject,-1,1);
        if($subjectStr=='F'){
            $this->display("Index/palace02");
        }else{
            if($id==129){
                $this->assign('CNZZid',1274779817);
            }
            $this->display("Index/palace");
        }
    }

    public function listdetails(){
        $this->display("Index/listdetails");
    }
    public function payEndtest(){
        $this->display("Index/payEndtest");
    }
    public function mytest(){//我的测算
        if($_REQUEST['orderid']){
            $orderid=$_REQUEST['orderid'];
            $this->assign('orderid',$orderid);
        }
        $this->assign('head','mytest');
        $this->display("Index/mytest");
    }
    public function selectOrder(){//查询订单是否支付
        $ordernum=$_REQUEST['ordernum'];
        $arr=M()->query("select id,status from qc_pay_order where ordernum='{$ordernum}' and status=1 limit 1");
        if($arr[0]['id']){echo 1;
        }else{echo 0;
        }
    }
    public  function mytest_free(){//免费订单
        $uid=cookie('uid');
        if($_REQUEST['uid']){
            $uid=$_REQUEST['uid'];
        }
        $page=$_REQUEST['page'];//页数
        $number=10;//条数
        $lt=$number*$page-$number;
        $freeArr=M()->query("select subject,createtime from qc_free_order where uid='{$uid}' order by id desc limit {$lt},{$number}");
        $freeDara=array();
        foreach($freeArr as $key=>$value){
            $arr=M()->query("select id,title,content,subject,title_img,hotstar,type_img from qc_choiceti_answer where subject='{$value['subject']}'");
            $freeDara[$key]=$arr[0];
            $freeDara[$key]['createtime']=strtotime($freeArr[$key]['createtime']);
        }
        foreach($freeDara as $key=>$value){
            if($value['type_img']==1){
                $freeDara[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }else if($value['type_img']==2){
                $freeDara[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/original.png';
            }
        }
        echo json_encode($freeDara);
    }
    public function mytest_pay(){
        $uid=cookie('uid');
        $page=$_REQUEST['page'];//页数
        $number=10;//条数
        $lt=$number*$page-$number;
        $freeArr=M()->query("select subject,answer,ordernum,createtime from qc_pay_order where appuserid='{$uid}' and status=1 order by id desc limit {$lt},{$number}");
        $freeDara=array();
        foreach($freeArr as $key=>$value){
            $arr=M()->query("select id,title,content,subject,title_img,hotstar,type_img from qc_choiceti_answer where subject='{$value['subject']}'");
            $freeDara[$key]=$arr[0];
            $freeDara[$key]['answer']=$value['answer'];
            $freeDara[$key]['orderid']=$value['ordernum'];
            $freeDara[$key]['createtime']=strtotime($freeArr[$key]['createtime']);
        }
        foreach($freeDara as $key=>$value){
            if($value['type_img']==1){
                $freeDara[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/major.png';
            }else if($value['type_img']==2){
                $freeDara[$key]['typeImg']='https://www.yixueqm.com/quce/Public/images/public/original.png';
            }
        }
        echo json_encode($freeDara);
    }

    public function imgMerge($imgName,$title){//图片合成
        // 图片一
        $path_1 = mb_substr(THINK_PATH,0,-9)."Public/images/answer/{$imgName}";
        // 图片二
        $path_2 = mb_substr(THINK_PATH,0,-9)."Public/images/cs/mingli.jpg";
        // 创建图片对象
        $image_1 = imagecreatefrompng($path_1);
        $image_2 = imagecreatefromjpeg($path_2);
        // 合成图片
        imagecopymerge($image_1, $image_2, imagesx($image_1)-710, imagesy($image_1)-120, 0, 0, imagesx($image_2), imagesy($image_2), 100);
        // 添加文字水印
        $black = imagecolorallocate($image_1, 80, 80, 80);
        $red = imagecolorallocate($image_1, 150, 0, 0);
        $font = mb_substr(THINK_PATH,0,-9).'Public/font/simhei.ttf';
        imagettftext($image_1, 20, 0, imagesx($image_1)-600, imagesy($image_1)-40, $black, $font,"长按识别二维码，快来测测吧~");
        imagettftext($image_1, 23, 0, imagesx($image_1)-150, imagesy($image_1)-50, $black, $font,"——知命");
        imagettftext($image_1, 20, 0, imagesx($image_1)-600, imagesy($image_1)-80, $red, $font,"{$title}");

        // 输出合成图片
        $name=mb_substr($imgName,0,-4);
        $returnPath=mb_substr(THINK_PATH,0,-9)."Upload/MG{$name}.png";
        $boole=imagepng($image_1,$returnPath);
        if($boole){
            return __ROOT__."/Upload/MG{$name}.png";
        }else{
            return '';
        }
    }

    public function return_url(){//支付同步回调
        //商户订单号
        if($_REQUEST['orderid']){
            $ordernum=$_REQUEST['orderid'];
            sleep(5);
        }else{
            $ordernum=$_REQUEST['out_trade_no'];
        }
        sleep(5);
        $arr=M()->query("select * from qc_pay_order where ordernum='{$ordernum}'");
        $subject=$arr[0]['subject'];
        $answerArr=M()->query("select type_img from qc_choiceti_answer where subject='{$subject}'");

        if($answerArr[0]['type_img']==3){
            if(empty($arr)){sleep(5);$arr=M()->query("select * from qc_pay_order where ordernum='{$ordernum}'");}
            if(empty($arr)){sleep(5);$arr=M()->query("select * from qc_pay_order where ordernum='{$ordernum}'");}
            if(empty($arr)){sleep(5);$arr=M()->query("select * from qc_pay_order where ordernum='{$ordernum}'");}

            if($arr[0]['status']==1){
                cookie('subject',$subject);
                if($subject=='QWCS20F'||$subject=='QWCS21F'){//财商测算
                    redirect(U('Paycs/jieguoye','',false));
                }else{
                    header('location:'.U('Paycs/payEndtesting','',false));
                }
            }
        }
        header('location:'.U('Index/mytest','',false).'?orderid=$ordernum');
    }
    public function notify_url(){//异步支付宝回调
//        file_put_contents('./zhiming_notify.txt',$_REQUEST);
        $ordernum=$_REQUEST['out_trade_no'];
        $updateTime=date("Y-m-d H:i:s");
        M()->query("update qc_pay_order set status=1,paykind=1,updatetime='{$updateTime}' where ordernum='{$ordernum}'");//改变订单为支付成功
    }
    public function return_urlwxx(){//微信异步回调
        if ($_REQUEST['orderid']) {
            $ordernum = $_REQUEST['orderid'];
        }else{
            $strData = $GLOBALS["HTTP_RAW_POST_DATA"];//接收到xml数据
            $obj = simplexml_load_string($strData);//把xml字符串解析成对象
            $ordernum = $obj->out_trade_no;
        }
        $updateTime=date("Y-m-d H:i:s");
        M()->query("update qc_pay_order set status=1,paykind=0,updatetime='{$updateTime}' where ordernum='{$ordernum}'");
    }

    public function cs(){

    }

}