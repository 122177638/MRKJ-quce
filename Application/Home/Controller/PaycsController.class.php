<?php
namespace Home\Controller;
use Think\Controller;
class PaycsController extends Controller {
    public function paypage(){//计分付费测算
        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
            cookie('subject',$subject);
        }else{
            $subject=cookie('subject');
        }
        if($_REQUEST['id']){
            $id=$_REQUEST['id'];
            if(empty($_REQUEST['subject'])&&empty($subject)){
                $subject=$id;
            }
        }else{
            $id=cookie('id');
        }

        $data=cookie('orderid');//获取订单号
        if(empty($data)){
            $orderid=$subject.date('Ymd').mt_rand(1000,9999).date('His');
            cookie('orderid',$orderid);
        }

        //创建订单
        $orderid=cookie('orderid');
        $znickname=cookie('znickname');if($znickname=='')$znickname='匿名';
        $zsex=cookie('zsex');if($zsex=='')$zsex=1;
        $channel=cookie('channel');
        $uid=cookie('uid');
        cookie('price',19);//价格

        if($channel=='qudao100'){
            cookie('price',0.01);
        }

        $price=cookie('price');
        if(empty($_REQUEST['ordernum'])){
            $arrdata=M()->query("select id from qc_pay_order where ordernum='{$orderid}' limit 1");
            if(empty($arrdata)){
                M()->query("delete from qc_pay_order where appuserid='{$uid}' and subject='{$subject}' and status=-1");//删除未支付数据
                M()->query("insert into qc_pay_order (ordernum,price,username,typeid,sex,status,paykind,appuserid,ip,channel,subject)values(
                                              '{$orderid}','{$price}','{$znickname}',0,{$zsex},-1,-1,'{$uid}','{$_SERVER['REMOTE_ADDR']}','{$channel}','{$subject}')");
            }
        }

        $answerArr=M()->query("select title,content,cs_num from qc_choiceti_answer where id='{$id}' limit 1");
        $topicCount=M()->query("select count(id) count from qc_choiceti_topic_f where answerId='{$id}'");
        $answerArr[0]['count']=$topicCount[0]['count'];

        $user_agent = $_SERVER['HTTP_USER_AGENT'];//用户使用的浏览器，操作系统等信息。
        if (strpos($user_agent, 'MicroMessenger') == false) {
            //非微信浏览器访问
            cookie('wxlogin',0);
        }else{
            cookie('wxlogin',1);
            $this->assign('wxlogin',1);
            $xml=wxgzhzf($subject,'专业测试',cookie('orderid'));//公众号支付回调参数
            $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
            $val = json_decode(json_encode($xmlstring),true);
            $noncestr=noncestr(15);//随机字符串
            $timestamp=time();//时间戳
            $stringA="appId=".C('APPID')."&nonceStr={$noncestr}&package=prepay_id={$val['prepay_id']}&signType=MD5&timeStamp={$timestamp}";
            $stringSignTemp=$stringA."&key=".C('KEY');
            $sign=strtoupper(md5($stringSignTemp));

            $this->assign('timeStamp',$timestamp);
            $this->assign('nonceStr',$noncestr);
            $this->assign('package','prepay_id='.$val['prepay_id']);
            $this->assign('signType','MD5');
            $this->assign('paySign',$sign);
            $this->assign('appId',C('APPID'));
        }

        $this->assign("answer",$answerArr[0]);
        if($subject=='QWCS20F'||$subject=='QWCS21F'){//财商测算
            if($_REQUEST['totalArr']){//答案记录
                $totalArr=$_REQUEST['totalArr'];
                cookie('totalArr',$totalArr);
                $orderid=cookie('orderid');
                M()->query("update qc_pay_order set answer=1,result='{$totalArr}' where ordernum='{$orderid}'");
            }
            M()->query("update qc_choiceti_answer set cs_num='{$answerArr[0]['cs_num']}'+1 where id='{$id}'");
            $this->assign('csNum',$answerArr[0]['cs_num']);
            if($subject=='QWCS20F'){//答题页
                $this->display("Payorder/cspay");
            }else if($subject=='QWCS21F'){
                $this->display("PayorderQs/qspay");
            }

        }else{
            $this->display("Index/paypage");
        }
    }
    public function answerPage(){//答题页
        cookie('orderid',null);
        if($_REQUEST['subject']){
            $subject=$_REQUEST['subject'];
            cookie('subject',$subject);
        }else{
            $subject=cookie('subject');
        }
        cookie('totalArr',null);
        if($subject=='QWCS20F'){//财商测算
            $this->display("Payorder/cspayEndtesting");//答题页
        }else if($subject=='QWCS21F'){
            $this->display("PayorderQs/qspayEndtesting");//答题页
        }
    }
    public function payEndtesting(){//进行测试
        $orderid=$_REQUEST['orderid'];
        if($orderid!=''){
            cookie('orderid',$orderid);
            $arr=M()->query("select subject from qc_pay_order where ordernum='{$orderid}'");
            $subject=$arr[0]['subject'];
            cookie('subject',$subject);
        }else{
            $subject=cookie('subject');
        }
        $this->assign('subject',$subject);
        if($subject=='QWCS20F'){
          $this->assign('subjectType',1);
        }
        $this->display("Index/payEndtesting");
    }
    public function jieguoye(){//结果页
        $result=$_REQUEST['totalFenNum'];
        if($_REQUEST['totalArr']){
            $totalArr=$_REQUEST['totalArr'];
            cookie('totalArr',$totalArr);
        }else{
            $totalArr=cookie('totalArr');
        }

        //$totalArr='[3,2,1,3,3,2]';
        if($_REQUEST['orderid']){//我的测算跳结果
            cookie('orderid',$_REQUEST['orderid']);
            $orderid=$_REQUEST['orderid'];
            $totalnumArr=M()->query("select answer,result,subject from qc_pay_order where ordernum='{$orderid}'");
            cookie('subject',$totalnumArr[0]['subject']);
            $subject=cookie('subject');
            if($totalnumArr[0]['answer']==0){
                header('location:'.U('Paycs/payEndtesting','',false)."?orderid={$orderid}");
            }
            $result=$totalnumArr[0]['result'];
            if(strlen($result)>3&&$result){
                $totalArr=$result;
                cookie('totalArr',$result);
            }
            if(empty($result)){
                $result=0;
            }
        }else{
            $orderid=cookie('orderid');
            $subject=cookie('subject');
            if($result){
                M()->query("update qc_pay_order set answer=1,result='{$result}' where ordernum='{$orderid}'");
            }
        }

        if($totalArr){
            //$Payorder=new \Library\PayOrder();
            //$dateArr=$Payorder->qingshangCS($totalArr);
            if($subject=='QWCS20F'){//答题页
                $this->display("Payorder/csResult");
            }else if($subject=='QWCS21F'){
                $this->display("PayorderQs/qsResult");
            }
        }else{
            $totalnum=$result;
            if($totalnum){
                $arr=M()->query("select * from qc_choiceti_answer where subject='{$subject}' LIMIT 1");
                for($i=1;$i<=6;$i++){
                    $answerF='answer'.$i.'_fen';
                    $answer='answer'.$i;
                    $answerT='answer'.$i.'_text';
                    if($totalnum<=$arr[0][$answerF]){
                        $arrF['title']=$arr[0]['title'];
                        $arrF['text']=$arr[0][$answerT];
                        break;
                    }
                }
            }
            cookie('orderid',NULL);
            $this->assign('arr',$arrF);
            $this->display("Index/testResult");
        }
    }
    public function jieguoyeJson(){//接口
        $orderid=cookie('orderid');
        if($_REQUEST['totalArr']){//答案
            echo 1;
        }else{
            $subject=cookie('subject');
            $totalArr=cookie('totalArr');
            $Payorder=new \Library\PayOrder();
            if($subject=='QWCS20F'){
                $dateArr=$Payorder->caishangCS($totalArr);
            }else if($subject=='QWCS21F'){
                $dateArr=$Payorder->qingshangCS($totalArr);
            }
            $dateArr['orderid']=$orderid;
            $dateArr=json_encode($dateArr,JSON_UNESCAPED_SLASHES);
            echo $dateArr;
        }
    }
    public function payzfb(){//支付宝
        $this->assign('ordername1','专业测试');
        $this->assign('ordername2','知命-专业测试');
        $this->display("Index/pay");
    }
    public function paywx(){//微信
        $subject=cookie('subject');
        H5ZMwxzhifu($subject,'专业测试',cookie('orderid'));//知命
    }

    public function index_cs(){//首页开始测算按钮
        $csName=cookie('subject');$channel=cookie('channel');$date=date('Ymd');
        $dataArr=M()->query("select id,index_cs from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$csName}' limit 1");
        M()->query("update qc_cnzz_pvuv set index_cs='{$dataArr[0]['index_cs']}'+1 where id='{$dataArr[0]['id']}' ");
    }
    public function index_fd(){//首页浮动开始测算按钮
        $csName=cookie('subject');$channel=cookie('channel');$date=date('Ymd');
        $dataArr=M()->query("select id,index_fd from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$csName}' limit 1");
        M()->query("update qc_cnzz_pvuv set index_fd='{$dataArr[0]['index_fd']}'+1 where id='{$dataArr[0]['id']}' ");
    }
    public function answerPage_tj(){//答题页提交按钮
        $csName=cookie('subject');$channel=cookie('channel');$date=date('Ymd');
        $dataArr=M()->query("select id,answerPage_tj from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$csName}' limit 1");
        M()->query("update qc_cnzz_pvuv set answerPage_tj='{$dataArr[0]['answerPage_tj']}'+1 where id='{$dataArr[0]['id']}' ");
    }
    public function zhifu_tj(){//支付按钮
        $csName=cookie('subject');$channel=cookie('channel');$date=date('Ymd');
        $dataArr=M()->query("select id,zhifu_tj from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$csName}' limit 1");
        M()->query("update qc_cnzz_pvuv set zhifu_tj='{$dataArr[0]['zhifu_tj']}'+1 where id='{$dataArr[0]['id']}' ");
    }
    public function zhifu_return(){//返回支付按钮
        $csName=cookie('subject');$channel=cookie('channel');$date=date('Ymd');
        $dataArr=M()->query("select id,zhifu_return from qc_cnzz_pvuv where date='{$date}' and channel='{$channel}' and csName='{$csName}' limit 1");
        M()->query("update qc_cnzz_pvuv set zhifu_return='{$dataArr[0]['zhifu_return']}'+1 where id='{$dataArr[0]['id']}' ");
    }
}