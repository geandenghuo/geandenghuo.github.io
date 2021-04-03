<?php

//发送http请求使用
function get_cur($url, $data, $type = "GET", $header = "")
{
    $HTTP_REFERER = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_REFERER, $HTTP_REFERER);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($header)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $temp = curl_exec($ch);
    curl_close($ch);
    return $temp;
}

function md5Sign($prestr, $key) {
    $prestr = $prestr . $key;
    return md5($prestr);
}

//判断是否是地址
function is_url($v){
    $pattern="#(http|https)://(.*\.)?.*\..*#i";
    if(preg_match($pattern,$v)){
        return true;
    }else{
        return false;
    }
}

//获取get参数组成数组[]
function get_notify_parameter()
{
    $count = count($_GET);
    $i = 0;
    $str= array();

    foreach ($_GET as $key => $value) {
        if ($i == $count - 1) {
            $str[$key]=$value;
        } else {
            $str[$key]=$value;
        }
        $i ++;
    }

    return $str;
}

//可用来生成订单号
function build_order_no(){
    return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}