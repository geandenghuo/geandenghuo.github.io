<?php

define('SYSTEM_ROOT_E', dirname(__FILE__) . '/');
include '../if/common.php';
require_once dirname(__FILE__) . '/core/PtSdk.php';
require_once dirname(__FILE__) . '/core/ptpay_config.php';

$request_data = get_notify_parameter();
//商户订单号
$out_trade_no = $request_data['payId'];
//支付宝交易号
$trade_no = $request_data['orderId'];

$sql = "SELECT * FROM if_order WHERE out_trade_no='{$out_trade_no}' limit 1";
$res = $DB->query($sql);
$srow = $DB->fetch($res);
$number = $srow['number'];

wsyslog("交易成功！[回调处理]", "订单编号：" . $out_trade_no . ";数量：" . $number . ";成功提取数量：" . $number . "");
showalert('您所购买的商品已付款成功，感谢购买！', 1, $out_trade_no);


function showalert($msg, $status, $orderid = null)
{
    global $ereturn;
    echo '<meta charset="utf-8"/><script>window.location.href="' . $ereturn . $orderid . '";</script>';
}

?>