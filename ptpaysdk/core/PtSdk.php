<?php

require_once dirname(__FILE__).'/ptpay_function.php';

class PtSdk
{

    private $config;

    function __construct($config){
        $this->config = $config;
    }
    function PtSdk($config) {
        $this->__construct($config);
    }
    //创建订单
    public function createOrder($parameter)
    {
        //验证传入的参数
        if ($parameter ==null)
        {
            exit('参数列表为空');
        }else if($parameter['payId'] ==null || $parameter['payId'] =='')
        {
            exit('订单号为空');
        }else if($parameter['param'] ==null || $parameter['param'] =='')
        {
            exit('参数为空');
        }else if($parameter['price'] ==null || $parameter['price'] =='')
        {
            exit('金额为空');
        }else if($parameter['type'] ==null || $parameter['type'] =='')
        {
            exit('支付类型为空');
        }
        //补齐参数
        $parameter['sign'] = $this->createSign($parameter['payId'],$parameter['param'],$parameter['type'],$parameter['price']);
        $parameter['userID']= $this->config['payUserID'];
        //如过传递过来的同步地址为空就获取配置文件里的
        if($parameter['returnUrl'] =='' || $parameter['returnUrl'] == null)
        {
            $parameter['returnUrl']= $this->config['returnUrl'];
            if($parameter['returnUrl'] == '')
            {
                exit('未传入同步地址');
            }
        }
        if($parameter['notifyUrl'] =='' || $parameter['notifyUrl'] == null)
        {
            $parameter['notifyUrl']= $this->config['notifyUrl'];
            if($parameter['notifyUrl'] == '')
            {
                exit('未传入异步地址');
            }
        }

        $parameter['isHtml']= $this->config['isHtml'];
        $request_url = $this->config['transport'].$this->config['apiurl'];
        $content =get_cur($request_url, $parameter);

        //如过要返回页面
        if($this->config['isHtml'] == '1')
        {
            //判断是否是url
            if(is_url($content))
            {
                Header("Location:".$content);
            }else{
                exit('创建订单失败,'.$content.'自己无法解决请联系客服。');
            }
        }else
        {
            //不返回页面的$content 是json
            //转换为数组好操作
            $callback =json_decode($content,true);
            return $callback;
            //返回数据
        }

        //请求服务器创建订单
    }
    //验证签名
    public function isSign()
    {
        //异步回来的参数表
       $notify_parameter = get_notify_parameter();
       //校验签名，计算方式 = md5(payId + param + type + price + reallyPrice + 通讯密钥)
        $_sign= md5($notify_parameter['payId']
            . $notify_parameter['param']
            . $notify_parameter['type']
            . $notify_parameter['price']
            . $notify_parameter['reallyPrice']
            . $this->config['paykey']);

        if($notify_parameter['sign'] == $_sign)
        {
            return true;
        }else
        {
            return false;
        }
    }

    //查询订单状态
    public function checkOrderStateOne($orderId)
    {

        $parameter['orderId'] = $orderId;
        $request_url = $this->config['transport'].$this->config['getOrderApiUrl'];
        $parameter =json_decode(get_cur($request_url,$parameter ),true);
        //msg状态：成功或错误消息
        if($parameter['msg'] =='成功')
        {
            //订单状态：-1:订单过期 0:等待支付 1:完成 2:支付完成但通知失败
            if($parameter['data']['state'] ==-1)
            {
                return '订单过期';
            }
            if($parameter['data']['state'] ==0)
            {
                return '等待支付';
            }
            if($parameter['data']['state'] ==1)
            {
                return '支付成功';
            }
            if($parameter['data']['state'] ==2)
            {
                return '通知失败';
            }
            if($parameter['data']['state'] ==3)
            {
                return '订单过期';
            }
        }
        else
        {
            exit("订单不存在");
            return false;
        }
    }

    //判断订单是否支付成功
    public function checkOrderState()
    {
        $notify_parameter = get_notify_parameter();
        $parameter['orderId'] = $notify_parameter['orderId'];
        $request_url = $this->config['transport'].$this->config['getOrderApiUrl'];
        $parameter =json_decode(get_cur($request_url,$parameter ),true);
        if($parameter['msg'] =='成功')
        {
            //订单状态：-1:订单过期 0:等待支付 1:完成 2:支付完成但通知失败
            if($parameter['data']['state'] ==1)
            {
                //echo "支付成功";
                return true;
            }
            else
            {
                return false;
            }
            //echo "支付失败";
        }
        else
        {
            //echo "请求失败";
            return false;
        }
    }

    //判断是否有此订单
    public function isCheckOrder()
    {
        $notify_parameter = get_notify_parameter();
        $parameter['orderId'] = $notify_parameter['orderId'];
        $request_url = $this->config['transport'].$this->config['getOrderApiUrl'];
        $parameter =json_decode(get_cur($request_url,$parameter ),true);
        //msg状态：成功或错误消息
        if($parameter['msg'] =='成功')
        {
            //echo "支付成功";
            return true;
        }
        else
        {
            //echo "请求失败";
            return false;
        }
    }

    //关闭订单
    public function closeOrder($orderId)
    {
        $parameter['orderId'] = $orderId;
        $parameter['sign'] = md5Sign($orderId,$this->config['paykey']);
        $request_url = $this->config['transport'].$this->config['closeOrderApiUrl'];
        $parameter =json_decode(get_cur($request_url,$parameter ),true);
        //msg状态：成功或错误消息
        //print_r($parameter);
        if($parameter['msg'] =='成功')
        {
            //关闭成功
            return true;
        }
        else
        {
            //echo "请求失败";
            return false;
        }
    }

    //附加服务获取微信用户信息，传入用户ID，传入要接收数据的地址
    public function get_WeChat_info()
    {

        $request_url = $this->config['transport']
            .$this->config['getWeChatInfoApiUrl'].'?userID='
            .$this->config['payUserID'].'&returnUrl='
            .$this->config['weChat_userInfo_returnUrl'];
        //thinkphp使用
        print_r($request_url);
        //Header("Location:".$request_url);

    }
    //生成签名
    function createSign($payId,$param,$type,$price)
    {
        return md5(md5($payId . $param . $type . $price . $this->config['paykey']) . $this->config['payUserID']);
    }

}