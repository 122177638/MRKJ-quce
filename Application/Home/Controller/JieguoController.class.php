<?php
namespace Home\Controller;
use Think\Controller;
class JieguoController extends Controller {
    public function QWCS22F(){
        $arr=array('1'=>35, '2'=>20, '3'=>13, '4'=>15, '5'=>14, '6'=>13, '7'=>14, '8'=>16, '9'=>15,);//�÷�
        $number=array('1'=>8, '2'=>8, '3'=>7, '4'=>8, '5'=>8, '6'=>7, '7'=>8, '8'=>7, '9'=>7,);//����
        $name=array('1'=>'phz', '2'=>'qxz', '3'=>'yangxz', '4'=>'yinxz', '5'=>'tsz', '6'=>'srz', '7'=>'xyz', '8'=>'qyz', '9'=>'tbz',);//����
        $zhuanhuaArr=array();
        foreach ($arr as $key=>$value) {
            $zhuanhuaArr[$key]=round(($value-$number[$key])/($number[$key]*4)*100);
        }

        if($zhuanhuaArr[1]>=60){//������ƽ����
          foreach($zhuanhuaArr as $key=>$value){
              if($key>=9&&$value<30){
                $dataNumber=1;//��ƽ����
                  break;
              }else if($key>=2&&$value>=40){//ƫ������
                  $zhuanhuaArr[1]=0;
                  arsort($zhuanhuaArr);
                  foreach($zhuanhuaArr as $k=>$v){
                      $dataNumber=$k;
                      break;
                  }
                  break;
              }
          }
        }else{//ƫ������
            $zhuanhuaArr[1]=0;
            arsort($zhuanhuaArr);
            foreach($zhuanhuaArr as $k=>$v){
                $dataNumber=$k;
                break;
            }
        }

        $tizhiKey=$name[$dataNumber];
        $arr=QWCS22F($tizhiKey);

        dump($arr);
    }
}