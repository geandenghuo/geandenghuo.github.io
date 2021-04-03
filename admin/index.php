<?php

/**
 * 后台管理中心
**/

$title='后台管理';
include './head.php';
$r1 = $DB->count("SELECT COUNT(id) from if_order");
$r2 = $DB->count("SELECT COUNT(id) from if_order  where sta = 1");
$r3 =$DB->count("select COUNT(id) from if_km");
$r4 = $DB->count("SELECT COUNT(id) from if_km  where stat = 0");
$r5 =$DB->count("SELECT COUNT(id) from if_km  where stat = 1");
$r6 = $DB->count("select COUNT(id)
from if_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now())");
$r7 =$DB->count("select SUM(money)
from if_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now()) and sta = 1");
?>

    
    
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      
       <div class="panel panel-primary"  style="border: 1px solid #42a5f5;">
        <div class="panel-heading" style="background-color: #42a5f5;border: 1px solid #42a5f5;"><h3 class="panel-title">后台管理首页</h3></div>
<table class="table table-bordered">
<tbody>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon glyphicon-th"></span> 订单总数</b></br><?php echo $r1?>条</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-shopping-cart"></i> 交易完成</b></br></span><?php echo $r2?>条</font></td>

</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-leaf"></i> 今日订单数</b></br><?php echo $r6?>条</font></td>
<td align="center"><font col or="#808080"><b><i class="glyphicon glyphicon-ok"></i> 今日成交金额</b></span></br><?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>元</font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon glyphicon-plane"></span> 卡密总数</b></br><?php echo $r3;?>个</font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-certificate "></i> 剩余卡密</b></br></span><?php echo $r4?>个</font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><i class="glyphicon glyphicon-dashboard"></i> 当前时间</b></br><?php echo date("Y-m-d H:i:s")?> </font></td>
<td align="center"><font color="#808080"><b><i class="	glyphicon glyphicon-heart-empty"></i> 客服QQ</b></span></br><?php echo $conf['zzqq'];?></font></td>
</tr>

</tbody>
</table>
      </div>
      
      
      <div class="panel panel-primary" style="border: 1px solid #42a5f5;">
        <div class="panel-heading" style="background-color: #42a5f5;border: 1px solid #42a5f5;"><h3 class="panel-title" >快捷导航</h3></div>
        
            <ul class="list-group">
             <li class="list-group-item">  
                <a href="http://www.pet0.cn/" class="btn btn-xs btn-primary">派特支付开户</a>&nbsp;
              
            </li> 
            <li class="list-group-item">  
                <a href="../" class="btn btn-xs btn-primary">返回用户首页</a>&nbsp;
                <a href="./search.php" class="btn btn-xs btn-primary">全局搜索</a>&nbsp;
                 <a href="./list.php" class="btn btn-xs btn-primary">订单管理</a>&nbsp;
                   <a href="./kmlist.php" class="btn btn-xs btn-primary">卡密管理</a>&nbsp;
            </li>
            <li class="list-group-item">
                <a href="blacklist.php" style="background-color: black;color:white;" class="btn btn-xs ">黑名单管理</a>&nbsp;
                <a href="loglist.php" style="background-color: black;color:white;" class="btn btn-xs ">系统日志</a>&nbsp;
		 <a href="./other-set.php?act=view" class="btn btn-xs btn-success">修改首页模板</a>
            
            </li>
            
           
           
          </ul>
     
      </div>
      
      
<div class="panel panel-info" style="float: none;">
	<div class="panel-heading">
		<h3 class="panel-title">网站信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>当前网站名称：</b><?php echo $conf['title'] ?>
		</li>
		<li class="list-group-item">
			<b>当前网站域名：</b><?php echo $_SERVER['HTTP_HOST'] ?>
		</li>
		<li class="list-group-item">
			<b>网站客服QQ：</b><?php echo $conf['zzqq'] ?>
		</li>
		
		<div class="alert alert-success">
                              当前版本：V888<?=$version['version']?> (Build <?=$version['build']?>)
                              <span class="badge btn btn-success" style="background-color: greenyellow;"><font color="black">已是最新版本</font></span>
		<li class="list-group-item">
			程序修复：<a href="http://wpa.qq.com/msgrd?v=3&uin=496642365&site=qq&menu=yes
" style="color:green;">创梦源码</a></span>
		</li>
		<li class="list-group-item">
			 发布渠道：<a href="https://www.cmezy.com" style="color:green;">创梦源码</a></span>
		</li>
		<li class="list-group-item"><span class="glyphicon glyphicon-magnet"></span> <b>系统提示：</b>
			    <?php 
			         if(empty($conf['epay_id']) ||$conf['epay_key'] == ""){
			             echo "<font style='color:red;'>您还未配置支付接口，用户无法使用您的发卡网！请尽快配置！</font>";
			         }elseif(!empty($conf['xq_id'])){
			             $data=get_curl($payapi.'api.php?act=query&pid='.$conf['epay_id'].'&key='.$conf['epay_key'].'&url='.$_SERVER['HTTP_HOST']);
			             $arr=json_decode($data,true);
			             if(empty($arr['account']) || $arr['account'] == null){
			                 echo "<font style='color:red;'>您还未配置支付接口提现账号！请尽快配置！</font>";
			             }else{
			                 echo "<font style='color:red;'>请勿用作违法违规，学习使用谢谢！</font>";
			             }
			         }else{
			             echo "<font style='color:red;'>请勿用作违法违规，学习使用谢谢！</font>";
			         }
			     ?>
			
			</li>
	</ul>
</div>
    </div>
  </div>
