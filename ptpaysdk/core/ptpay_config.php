<?php


$ptpay_config = array();

//派特支付的用户通讯秘钥
$ptpay_config['paykey']='派特秘钥';
//派特支付的用户id
$ptpay_config['payUserID']='派特ID';
//同步地址 替换为你的同步地址
$ptpay_config['returnUrl']='http://'.$_SERVER['HTTP_HOST'].'/ptpaysdk/pay_return.php';
//异步地址 替换为你的异步地址
$ptpay_config['notifyUrl']='http://'.$_SERVER['HTTP_HOST'].'/ptpaysdk/pay_notify.php';
//微信用户信息获取的地址
$ptpay_config['weChat_userInfo_returnUrl']='';
//是否返回页面,1是返回HTML,0是JSON数据
$ptpay_config['isHtml']='1';
//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$ptpay_config['transport'] = 'https://';
//派特支付的支付apiurl
$ptpay_config['apiurl'] = 'pay.xdqj.net/createOrder';
//获取订单api
$ptpay_config['getOrderApiUrl'] = 'pay.xdqj.net/getOrder';
//关闭订单api
$ptpay_config['closeOrderApiUrl']  = 'pay.xdqj.net/closeOrder';
//获取微信用户信息
$ptpay_config['getWeChatInfoApiUrl']  = 'pay.xdqj.net/welcome';