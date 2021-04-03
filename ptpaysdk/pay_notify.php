<?php

require_once dirname(__FILE__).'/core/PtSdk.php';
require_once dirname(__FILE__).'/core/ptpay_config.php';
require_once '../config.php';


$pay = new PtSdk($ptpay_config);

//验证签名
if($pay->isSign())
{
    //再次判断订单状态,如过服务器有这个订单就处理业务
    if($pay->isCheckOrder() || $pay->checkOrderState())
    {
        //签名验证成功,订单验证成功
//        //---------开始业务逻辑----------------
        $request_data =get_notify_parameter();
        $out_trade_no= $request_data['payId'];
        $trade_no= $request_data['orderId'];

        $conn = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname']);
        $sql = "SELECT * FROM if_order WHERE out_trade_no='{$out_trade_no}' limit 1";
        $res = $conn->query($sql);
        $srow = $res->fetch_array();

            if ($srow['sta'] == 0) {
                if (!srow || $srow['money'] != $request_data['price']) {
                    exit('fail');
                }
                $number = $srow['number'];
                $ok = 0;
                for ($i = 1; $i <= $number; $i++) {
                    $sql2 = "UPDATE if_km "
                        . "set endTime = now(),out_trade_no = '{$out_trade_no}',trade_no='{$trade_no}',rel ='{$srow['rel']}',stat = 1
                           where gid = {$srow['gid']} and stat = 0
                           limit  1";
                    if ($conn->query($sql2)) {
                        $ok++;
                    }
                }

                $sql = "update if_order set sta = 1, trade_no = '{$trade_no}' ,endTime = now() where out_trade_no = '{$out_trade_no}'";

                $conn->query($sql);
                echo "success";
            }
        //----------业务逻辑结束---------------
        //告诉服务器已经收到通知
    }
    else
    {
        exit('fail');
    }
}
else
{
    exit('fail');
}
