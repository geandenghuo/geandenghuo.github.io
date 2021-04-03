<?php
/**
 * 系统设置
**/
$title='后台管理中心';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include 'nav.php';

?>

  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php 
if(isset($_POST['submit'])) {
    foreach ($_POST as $k => $value) {
        if($k=='pwd')continue;
        $value=daddslashes($value);
        $DB->query("insert into zm_pay_config set `k`='{$k}',`v`='{$value}' on duplicate key update `v`='{$value}'");
    }
    showmsg('修改成功！',1);
    exit();
}

?>


<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">模板切换</h3></div>
<div class="panel-body">
  <form action="./template.php?mod=site_n" method="post" class="form-horizontal" role="form">

    <div class="form-group">
    <label class="col-sm-2 control-label">模版切换:</label>
    <div class="col-sm-10"><select class="form-control" name="template" default="<?php echo $conf['template']?>">
<option value="chiji">凌吾发卡模版1</option>
<option value="default">凌吾发卡模版2</option>
<option value="ocean">凌吾发卡模版3</option>
<option value="zongzi">凌吾发卡模版4</option></select></div>
  </div>
<div class="list-group list-group-sm swaplogin">
<center>
<!--<h3>☞<a href="./mb2.php"><font color="#3CC012">1号模版设置</font></a>☜</h3>
<h3>☞<a href="./mb2.php"><font color="#3CC012">2号模版设置</font></a>☜</h3>
<h3>☞<a href="./mb3_cy.php"><font color="#0000FF">3号模版设置</font></a>☜</h3>-->
</center>
                          </div><br><br>
    <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="确定修改" class="btn btn-default form-control"/>
   </div>

  </form>
</div>


<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
  $(items[i]).val($(items[i]).attr("default"));
}
</script>
    </div>
  </div>
