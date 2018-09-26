<?php
//拿到access_token
function getToken(){
    if(S('token')!=''){
        return S('token');
    }else {
        $id = C("APPID");
        $secret = C("APPSECRET");
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$id}&secret={$secret}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//设置请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不需要证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不需要主机验证
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $arr = json_decode($json, true);
        S('token',$arr['access_token'],7100);
        return $arr['access_token'];
        curl_close($ch);
    }
}
//拿到jsapi_ticket
function getTicket(){
    if(S('ticket')!=''){
        return S('ticket');
    }else{
        $token = S('token');
        $url ="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$token}&type=jsapi";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($ch);
        $arr=json_decode($json,true);
        S("ticket",$arr['ticket'],7100);
        return $arr['ticket'] ;
        curl_close($ch);
    }
}
function getCode($url){ //不用授权获取code
    if(cookie('code')!=''){
        return cookie('code');
    }else{
        $APPID = C("APPID");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$APPID}&redirect_uri={$url}&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        redirect($url);
    }
}
function getOopenid($wzurl){ //不用授权获取openid
    if(cookie('openid')){
        return cookie('openid');
    }else {
        $APPID = C("APPID");
        $APPSECRET = C("APPSECRET");
        $code = cookie('code');
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$APPID}&secret={$APPSECRET}&code={$code}&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//设置请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//不需要证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//不需要主机验证
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $arr = json_decode($json, true);
        if($arr['openid']){
            cookie("openid",$arr['openid']);
        }else{
            cookie('code',null);
            redirect($wzurl);exit;
        }
        return $arr['openid'];
    }
}

function wxGetCode($url){ //授权获取code
    if(cookie('code')!=''){
        return cookie('code');
    }else{
        $APPID = C("APPID");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$APPID}&redirect_uri={$url}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        redirect($url);
    }
}
function Caccess_token(){//使用code换取access_token
    if(cookie("openid")&&cookie('accessToken')){

    }else{
        $APPID = C("APPID");
        $secret = C("APPSECRET");
        $code = cookie('code');
        $url ="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$APPID}&secret={$secret}&code={$code}&grant_type=authorization_code";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($ch);
        $arr=json_decode($json,true);
        if($arr['openid']){
            cookie('accessToken',$arr['access_token'],7100);
            cookie("openid",$arr['openid']);
            cookie('uid',$arr['openid']);
        }
    }
}
function wxgetUsertext(){  //授权获取微信用户的信息
    $accessToken=cookie('accessToken');
    $openid=cookie('openid');
    $url ="https://api.weixin.qq.com/sns/userinfo?access_token={$accessToken}&openid={$openid}&lang=zh_CN";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//不需要主机验证
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($ch);
    $arr=json_decode($json,true);
    return $arr;
}

function wxgzhzf($nick,$name,$orderid){//微信公众号支付
    if(empty($nick)){echo 'nike';exit;}
    $arrdata=M()->query("select id from qc_pay_order where ordernum='{$orderid}' and status=-1 limit 1");
    if(!empty($arrdata)){
        if(cookie('wxzfNum')!=''){
            $orderid=$nick.date('Ymd').mt_rand(1000,9999).date('His');//重新生成订单
            cookie('orderid',$orderid);
            M()->query("update qc_pay_order set ordernum='{$orderid}' where id='{$arrdata[0]['id']}'");
        }
        cookie('wxzfNum',1);
    }else{
        echo '没有订单';exit;
    }
    $price=cookie('price');
    if(empty($price)){$price=8.8;}
    $price*=100;

    $noncestr=noncestr(15);
    $MCHID=C('GMCHID');
    $body=$name;
    $notifyUrl='https://www.yixueqm.com/quce/index.php/Home-Index-return_urlwxx';
    $stringA="appid=".C('APPID')."&body={$body}&mch_id={$MCHID}&nonce_str={$noncestr}&notify_url={$notifyUrl}&openid=".cookie("openid")."&out_trade_no={$orderid}&spbill_create_ip={$_SERVER['REMOTE_ADDR']}&total_fee={$price}&trade_type=JSAPI";
    $stringSignTemp=$stringA."&key=".C('KEY'); //注：key为商户平台设置的密钥key
    $sign=strtoupper(md5($stringSignTemp));

    $strData=array(
        'appid'=>C('APPID'),
        'mch_id'=>$MCHID,
        'nonce_str'=>$noncestr,
        'sign'=>$sign,
        'body'=>$body,
        'out_trade_no'=>$orderid,
        'total_fee'=>$price,
        'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],
        'notify_url'=>$notifyUrl,
        'trade_type'=>'JSAPI',
        'openid'=>cookie("openid"),
    );
    $xml = "<xml>";
    foreach ($strData as $key=>$val)//数组转xml
    {
        if (is_numeric($val)){
            $xml.="<".$key.">".$val."</".$key.">";
        }else{
            $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
    }
    $xml.="</xml>";
    $strData=$xml;
    //$json=json_encode($data,JSON_UNESCAPED_UNICODE);
    $headers=array(
        'Content-Type:text/xml;charset=utf-8',
    );
    $url="https://api.mch.weixin.qq.com/pay/unifiedorder";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_URL,$url); //设置请求地址
    curl_setopt($ch,CURLOPT_POST,true); //post请求
    curl_setopt($ch,CURLOPT_POSTFIELDS,$strData);// post请求的数据
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出到页面
    $json = curl_exec($ch);
    return $json;
    curl_close($ch);
}

function H5ZMwxzhifu($nick,$name,$orderid){//知命H5微信支付
    if(empty($nick)){echo 'nike';exit;}
    $arrdata=M()->query("select id from qc_pay_order where ordernum='{$orderid}' and status=-1 limit 1");
    if(!empty($arrdata)){
        if(cookie('wxzfNum')!=''){
            $orderid=$nick.date('Ymd').mt_rand(1000,9999).date('His');//重新生成订单
            cookie('orderid',$orderid);
            M()->query("update qc_pay_order set ordernum='{$orderid}' where id='{$arrdata[0]['id']}'");
        }
        cookie('wxzfNum',1);
    }else{
       echo '没有订单';exit;
    }
    $price=cookie('price');
    $price*=100;

    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ip=preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
    $scene_info="{\"h5_info\": {\"type\":\"Wap\",\"wap_url\": \"https://hy.yixueqm.com\",\"wap_name\": \"知命支付\"}}";


    $noncestr=noncestr(15);
    $MCHID=C('GMCHID');
    $body=$name;
    $type='MWEB';
    $notifyUrl='https://www.yixueqm.com/quce/index.php/Home-Index-return_urlwxx';
    $stringA="appid=".C('APPID')."&body={$body}&mch_id={$MCHID}&nonce_str={$noncestr}&notify_url={$notifyUrl}&out_trade_no={$orderid}&scene_info={$scene_info}&spbill_create_ip={$ip}&total_fee={$price}&trade_type={$type}";
    $stringSignTemp=$stringA."&key=".C('KEY'); //注：key为商户平台设置的密钥key
    $sign=strtoupper(md5($stringSignTemp));

    $strData=array(
        'appid'=>C('APPID'),
        'mch_id'=>$MCHID,
        'nonce_str'=>$noncestr,
        'sign'=>$sign,
        'body'=>$body,
        'out_trade_no'=>$orderid,
        'total_fee'=>$price,
        'spbill_create_ip'=>$ip,
        'notify_url'=>$notifyUrl,
        'trade_type'=>$type,
        'scene_info'=>$scene_info,
    );

    $xml = "<xml>";
    foreach ($strData as $key=>$val)//数组转xml
    {
        if (is_numeric($val)){
            $xml.="<".$key.">".$val."</".$key.">";
        }else{
            $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
    }
    $xml.="</xml>";
    $strData=$xml;
    //$json=json_encode($data,JSON_UNESCAPED_UNICODE);
    $headers=array(
        'Content-Type:text/xml;charset=utf-8',
    );
    $url="https://api.mch.weixin.qq.com/pay/unifiedorder";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch,CURLOPT_URL,$url); //设置请求地址
    curl_setopt($ch,CURLOPT_POST,true); //post请求
    curl_setopt($ch,CURLOPT_POSTFIELDS,$strData);// post请求的数据
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//不需要证书验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//不直接输出到页面
    $json = curl_exec($ch);
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);

    $xmlstring = simplexml_load_string($json, 'SimpleXMLElement', LIBXML_NOCDATA);
    $val = json_decode(json_encode($xmlstring),true);
    curl_close($ch);
    $redirect_url='https://'.$_SERVER['HTTP_HOST']."/quce/index.php/Home-Index-return_url?orderid={$orderid}";
    $redirect_url=urlencode($redirect_url);

    header("location:".$val['mweb_url']."&redirect_url=".$redirect_url);
}