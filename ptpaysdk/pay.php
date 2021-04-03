<?php

require_once dirname(__FILE__).'/core/PtSdk.php';
require_once dirname(__FILE__).'/core/ptpay_config.php';

$request_parameter = get_notify_parameter();

//print_r($request_parameter);
//实例化SDK
$pay = new PtSdk($ptpay_config);


$type = $request_parameter['type'];
if($type == "alipay")
{
    $pay_type = 2;
}else
{
    $pay_type = 1;
}

//创建订单需要构建的参数
$parameter = array(
    //支付方式 1.是微信，2是支付宝
    "type" => $pay_type,
    //商户订单号
    "payId" => $request_parameter['out_trade_no'],
    //自定义参数
    "param" => $request_parameter['name'],
    //金额
    "price" => $request_parameter['money'],

);

//print_r($parameter);
//创建订单,会自动跳转页面
$pay->createOrder($parameter);


