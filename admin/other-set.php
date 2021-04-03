<?php

/**
 * 系统设置
**/
$title='邮箱配置- 后台管理中心';
include './head.php';


?>

  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php 
if(isset($_POST['submit'])) {
    foreach ($_POST as $k => $value) {
        if($k=='pwd')continue;
        $value=daddslashes($value);
        $DB->query("insert into if_config set `if_k`='{$k}',`if_v`='{$value}' on duplicate key update `if_v`='{$value}'");
    }
    showmsg('修改成功！',1);
    exit();
}
if($_GET['act'] == "email"){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">邮箱配置</h3></div>
<div class="panel-body">
  <form action="" method="post" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱SMTP服务器:</label>
	  <div class="col-sm-10"><input type="text" name="mail_stmp" value="<?php echo $conf['mail_stmp']; ?>" class="form-control" required/></div>
	</div><br/>
     
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱SMTP端口:</label>
	  <div class="col-sm-10"><input type="text" name="mail_port" value="<?php echo $conf['mail_port']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱账号:</label>
	  <div class="col-sm-10"><input type="text" name="mail_name" value="<?php echo $conf['mail_name']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮箱密码:</label>
	  <div class="col-sm-10"><input type="text" name="mail_pwd" value="<?php echo $conf['mail_pwd']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">邮件名称:</label>
	  <div class="col-sm-10"><input type="text" name="mail_title" value="<?php echo $conf['mail_title']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
      
  </form>
    <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="button" value="发送一封测试邮件" class="btn btn-info form-control" id="email-send-test"/><br/>
	 </div>
	</div><br/><br/>
   <div class="form-group">
       <div class="col-sm-offset-2 col-sm-10" style="display: none;" id="tis-div"> <div class="alert alert-info" id="tis-msg">信息！请注意这个信息。 </div></div></div><br/><br/>
    <pre>
<font color="green">
如果为QQ邮箱需先开通SMTP，且要填写QQ邮箱独立密码。
邮箱SMTP服务器可以百度一下，例如QQ邮箱的即为 smtp.qq.com。
邮箱SMTP端口默认为25，SSL的端口是465。</font> 
<hr>
关于邮件发送失败问题的解决方法：
1.检查空间是否未开启fsockopen函数支持，如果未开启可以到空间控制面板开启或联系主机商，
2.可能发信邮箱不支持smtp发信，可以到邮箱的设置页面进行开启。另外新注册的网易邮箱普遍不支持发信，老邮箱才可以，如果遇到这种情况请到淘宝买老邮箱账号或者使用139邮箱。
3.如果发信邮箱是QQ邮箱要申请授权码，需要到QQ邮箱网页版的设置页面进行设置并申请授权码，SMTP密码一栏即填写授权码（非QQ密码），端口是465，并开启SSL模式。
4.如果用户设置的收信邮箱为QQ邮箱，秒赞网失效提醒邮件有很大几率被腾讯屏蔽（直接做退信处理并非在垃圾信箱），所以用户注册时推荐使用网易邮箱或139邮箱做为收信邮箱。
</pre>
</div>
</div>
        <script src="js/iffk.js"></script>
<?php }elseif($_GET['act'] == "view"){
    ?>
    <div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">首页模板设置</h3></div>
<div class="panel-body">
  <form action="" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">选择模板</label>
		<div class="col-lg-8">
			<select class="form-control" id="view" name="view">
				<option value="wz" <?php if($conf['view']=="wz") echo "selected"; ?> >王者模板-创梦源码：496642365 </option>
				
						</select>
		</div>
	</div>

	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>


  </form>
</div>
</div>
    
    <?php 
}?>
    </div>
  </div>