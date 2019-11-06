<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WechatController extends Controller
{
    public function index(Request $request){
        if($this->checksignature($request)){
            echo $request->echostr;//验证signnature是否验证成功,原样输出str
        }else{
            echo "error";
        }
//        echo"111";
    }
    //上面调用 此方法
    private function  checksignature($request){
        $signature = $request->signature;
        $nonce = $request->nonce;
        $timestamp = $request->timestamp;
        $token = env("WXTOKEN");
        $arr = array($token, $timestamp, $nonce);
        sort($arr, SORT_STRING);
        $str = implode( $arr );
        $sign = sha1( $str );

        if( $sign ==$signature ){
            return true;
        }else{
            return false;
        }
    }
    public function

}