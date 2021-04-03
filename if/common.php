<?php
error_reporting(0);
define('CACHE_FILE', 0);
define('IN_CRONLITE', true);
define('VERSION', '6.0');
define('VERSIONS', '5000');
define('TYPE', '888');
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('SYS_KEY', 'fk_key');
define('CHK', '');
session_start();



date_default_timezone_set("PRC");


$http =base64_decode(CHK);
$date = date("Y-m-d H:i:s");

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';


$password_hash='!@#%!s!8#';
$fpj = md5($password_hash."--");
include_once(SYSTEM_ROOT."function.php");
require ROOT.'config.php';
if(!defined('SQLITE') && (!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']))//检测安装
{
header('Content-type:text/html;charset=utf-8');
echo '你还没安装！<a href="install/">点此安装</a>';
exit();
}

//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

if($DB->query("select * from if_config where 1")==FALSE)//检测安装2
{
header('Content-type:text/html;charset=utf-8');
echo '你还没安装！<a href="install/">点此安装</a>';
exit();
}else{
$rs=$DB->query("select * from if_config");
while($row=$DB->fetch($rs)){ 
	$conf[$row['if_k']]=$row['if_v'];
}
}

// =============== 数据库升级代码 BEGIN  ===============
$sqlv = 1041;
if(empty($conf['sqlv']) || $conf['sqlv'] < $sqlv){
    
    if(!empty($_GET['updatesql'] ) && $_GET['updatesql'] == $sqlv){
       
        $sql=file_get_contents(ROOT."install/update".$sqlv.".sql");
       
        $sql=explode(';',$sql);
        require ROOT.'install/up.class.php';
        $cn = DB2::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
       
        if (!$cn) die('err:'.DB2::connect_error());
        DB2::query("set sql_mode = ''");
        DB2::query("set names utf8");
        $t=0; $e=0; $error='';
        for($i=0;$i<count($sql);$i++) {
            if ($sql[$i]=='')continue;
            if(DB2::query($sql[$i])) {
                ++$t;
            } else {
                ++$e;
                $error.=DB2::error().'<br/>';
            }
        }
        $DB->query("insert into if_config set `if_k`='sqlv',`if_v`='{$sqlv}' on duplicate key update `if_v`='$sqlv'");
        @header('Content-Type: text/html; charset=UTF-8');
        exit("<script language='javascript'>alert('数据库升级成功！');window.location.href='./';</script>");
    }
    
    echo '恭喜您更新版本！<a href="?updatesql='.$sqlv.'">点击升级数据库！</a><br><a href="'.$sqlv.'">免费更新地址</a><br><a href="'.$sqlv.'">游戏辅助</a>';
    exit();
}
// =============== 数据库升级代码 END  ===============

// =============== QQ跳转 ===================
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqtz']==1){
    header("Content-Type: text/html; charset=utf-8");
    echo '<!DOCTYPE html>
    <html>
     <head>
      <title>请使用浏览器打开 - 创梦源码</title>
      <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
      <script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "'.$siteurl.'"}); </script>
     </head>
     <body></body>
    </html>';
    exit;
}

//=========== 授权验证 ======================
if(empty($_COOKIE['auth'] ) || $_COOKIE['auth'] !=md5(8700+VERSION)){

     $_COOKIE['auth'] =md5(8700+VERSION);
     
}
if($conf['payapi'] == 1){
    $payapi='http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 2){
    $payapi='http://payeco.hl-5.com/'; //
}elseif($conf['payapi'] == 3){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 4){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 5){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 6){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 7){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 9){
    $payapi = 'http://payeco.hl-5.com/';//
}elseif($conf['payapi'] == 8){
    $payapi = 'http://payeco.hl-5.com/';//
}else{
    $payapi='http://payeco.hl-5.com/';//
}
include_once(SYSTEM_ROOT."member.php");

if(!empty($conf['view']) && $conf['view'] != ""){
	 if($conf['view'] == "default"){
        $ereturn = "../index.php?tp=".$conf['view']."&action=getkm&out_trade_no=";
    }else{
        $ereturn = "../index.php?tp=".$conf['view']."&action=query&out_trade_no=";
    }
  //  $ereturn = "../index.php?tp=".$conf['view']."&action=query&out_trade_no=";
}else{
    $t = "default";
    $ereturn = "../index.php?tp=default&action=getkm&out_trade_no=";
}


?>