<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){//我的
        $userData=cookie('userText');

        $this->assign('userData',$userData);
        $this->assign('head','login');
        //$this->display("Index/login");
        $this->display("Index/userinfo");
    }
    public function wxLogin(){//微信登录
        getToken();
        getTicket();
        $wzurl=wxJsdkData();
        if(!empty($_REQUEST['code'])){
            cookie('code',$_REQUEST['code'],7100);
        }
        wxGetCode($wzurl);
        Caccess_token();
        $user=wxgetUsertext();
        $nickname=$user['nickname'];
        $openid=$user['openid'];
        $city=$user['city'];
        $province=$user['province'];
        $headimgurl=$user['headimgurl'];

        if($openid){
            $userText=array(
                'nickname'=>$nickname,
                'headimgurl'=>$headimgurl
            );
            cookie('userText',$userText);
            cookie('uid',$user['openid']);
            cookie('headimgurl',$headimgurl);
            cookie('nickname',$nickname);

            $userArr=M()->query("select id from qc_user where  wx_openid='{$openid}' limit 1");
            if(empty($userArr)){
                M()->query("insert into qc_user (nickname,address,head_img,wx_openid)values(
                                                '{$nickname}','{$province},{$city}','{$headimgurl}','{$openid}')");
            }
            redirect(U('Login/index',',false'));
        }else{
            cookie('code',null);
            echo '微信登录失败,请重新尝试';
        }
    }
    public function login(){//登录页
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//用户使用的浏览器，操作系统等信息。
        if (strpos($user_agent, 'MicroMessenger') == false) {
            //非微信浏览器访问
            cookie('wxlogin',0);
        }else{
            cookie('wxlogin',1);
            $this->assign('wxlogin',1);
        }
        $this->display("Index/login");
    }
    public function loginOut(){//退出
        cookie('userText',null);
        cookie('headimgurl',null);
        cookie('nickname',null);
        $userData=cookie('userText');
        $this->assign('userData',$userData);
        $this->assign('head','login');
        $this->display("Index/userinfo");
    }
    public function loginSelect(){//查询用户登录信息
        $username=$_REQUEST['user'];
        $password=md5($_REQUEST['password']);
        $arr=M()->query("select id,username,head_img from qc_user where username='{$username}' and password='{$password}'");

        if($arr){
            $userText=array(
                'nickname'=>$arr[0]['username'],
                'headimgurl'=>$arr[0]['head_img']
            );
            cookie('uid',$username);
            cookie('nickname',$arr[0]['username']);
            cookie('userText',$userText);
            echo 1;
        }else{
            echo 0;
        }
    }
    public function register(){//注册页
        $this->display("Index/register");
    }
    public function registerSubmission(){//注册提交
        $user=I('request.username');
        $password=md5(I('request.password'));
        $phone=$_REQUEST['phone'];
        $img='https://www.yixueqm.com/quce/Public/images/user_avatar.png';
        M()->query("insert into qc_user (username,password,phone,head_img)values('{$user}','{$password}','{$phone}','{$img}')");

        $userText=array(
            'nickname'=>$user,
            'headimgurl'=>$img
        );
        cookie('userText',$userText);
        redirect(U('Login/index',',false'));
    }
    public function userSelect(){//查询用户是否注册
        $username=$_REQUEST['user'];
        $arr=M()->query("select id from qc_user where username='{$username}'");
        if($arr){
            echo 1;
        }else{
            echo 0;
        }
    }

}