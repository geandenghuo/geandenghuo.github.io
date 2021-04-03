<?php


if(empty($conf['create'])){
    $DB->query("insert into if_config values('create',now())");
}
$yxts=ceil((time()-strtotime($conf['create']))/86400); //本站已运行多少天

$allOrder = $DB->count("SELECT  id  from if_order order by id DESC limit 1");
//历史订单数
$nowOrder = $DB->count("SELECT COUNT(id)  from if_order order by id DESC limit 1");
//当前订单数
$okOrder = $DB->count("SELECT COUNT(id)   from if_order where sta = 1 order by id DESC limit 1");
//完成订单数



$rs=$DB->query("select * from if_type");
$select = "";
while ($row = $DB->fetch($rs)){
    $select.='<option value="'.$row['id'].'">'.$row['tName'].'</option>';
}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title><?php echo $conf['title'];?> - 创梦源码</title>
	<meta name="keywords" content="<?php echo $conf['keywords'];?>" />
	<meta name="description" content="<?php echo $conf['description'];?>" /> 
	<link rel="stylesheet" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/fancy-buttons.css" />
	
	<!--=== Other CSS files ===-->
	<link rel="stylesheet" href="assets/css/animate.css" />
	
	<!--=== Main Stylesheets ===-->
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/css/responsive.css" />
	
	
	
	<!--=== Internet explorer fix ===-->
	<!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/4.png" media="screen" />
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="assets/layer/layer.js"></script>
  <script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
  <script src="js/if.js"></script>
  <script type="text/javascript">
  $(function(){
	getPoint($("#tp_tid"));		
	})
  </script>
 <style type="text/css">

	
	
	@media screen and (min-width: 1024px){
            body{
				   margin: 0;
                   padding: 0;
                   font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
                   letter-spacing: 1.2px;
                   color: #fff;
                   background:url(assets/imgs/bg_17a9fb8.jpg) no-repeat;
			       background-attachment: fixed;
                   background-size: cover;
			   
            }
        }
       
	   
	   
	   	
	@media screen and (max-width: 1023px){
            body{
				   margin: 0;
                   padding: 0;
                   font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
                   letter-spacing: 1.2px;
                   color: #fff;
                   background:url(assets/imgs/gongsun.jpg) no-repeat;
			       background-attachment: fixed;
                 background-size: auto 100%;
				 background-position:center;
			   
            }
        }
       




	
}
img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
  .layui-layer-content{color:#000;}
</style>
</head>
<body>
	<!--=== Header section Starts ===-->
	<div id="header" class="header-section">
		<!-- sticky-bar Starts-->
		<div class="sticky-bar-wrap">
			<div class="sticky-section">
				<div id="topbar-hold" class="nav-hold container">
					<nav class="navbar" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<!--=== Site Name ===-->
							<a class="site-name navbar-brand" href="/">
								<?php echo $conf['title'];?></a>
						</div>
						<!-- Main Navigation menu Starts -->
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="current"><a href="/">在线购买下单</a></li>
								<li><a href="?tp=wz&action=query">订单查询提卡</a></li>
							</ul>
						</div>
						<!-- Main Navigation menu ends-->
					</nav>
				</div>
			</div>
		</div>
		<!-- sticky-bar Ends-->
		<!--=== Header section Ends ===-->
		
		<!--=== Home Section Starts ===-->
		<div id="section-home" class="home-section-wrap center">
			<div class="section-overlay"></div>
			<div class="container home">
				<div class="row">
					<h1 class="well-come">购买须知</h1>
					
					<div class="col-md-8 col-md-offset-2">
						<p class="intro-message">本站域名：<?php echo $_SERVER['HTTP_HOST']?></p>
						<p class="intro-message">客服QQ:<?php echo $conf['zzqq']?></p>
						<p class="intro-message"><?php echo $conf['notice1']?></p>
						<p class="intro-message"><?php echo $conf['notice2']?></p>
						<p class="intro-message"><?php echo $conf['notice3']?></p>
						<div class="home-buttons">
							<a href="#" class="fancy-button button-line button-white zoom">
								快速
								<span class="icon">
									<i class="fa fa-paper-plane-o"></i>
								</span>
							</a>
							<a href="#" class="fancy-button button-line button-white zoom">
								及时
								<span class="icon">
									<i class="fa fa-clock-o"></i>
								</span>
							</a>
							<a href="#" class="fancy-button button-line button-white zoom">
								稳定
								<span class="icon">
									<i class="fa fa-sign-in"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== Home Section Ends ===-->
	</div>
	
	
		
	<!--=== Testimonials section Starts ===-->
	<section id="section-testimonials" class="testimonials-wrap">
		<div class="section-overlay"></div>
		<div class="container testimonials animated" data-animation="rollIn" data-animation-delay="500">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form support-form" >		
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">商品分类</div>
									<select name="tp_id" id="tp_tid" class="input-field form-item field-name placeholder" onchange="getPoint(this);">
										<?php echo $select?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">选择商品</div>
									<select name="gid" id="gid" class="input-field form-item field-name placeholder" onchange="getPrice(this)">
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="panel panel-default">
				                    <div class="panel-body" id="ginfo" style="display: none;color: #000000;text-align: center;"></div>
				                   
				                </div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">商品价格</div>
									<input id="need" class="input-field form-item field-name placeholder" type="text" required="required" name="need" disabled="">
							
								</div>
							</div>
							<div class="form-group" <?php if($conf['showKc'] == 2) echo "style='display:none;'"?>>
								<div class="input-group">
									<div class="input-group-addon">商品库存</div>
									<input id="kc" class="input-field form-item field-name placeholder" type="text" name="kc" disabled="" >
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">联系方式</div>
									<input id="lx" class="input-field form-item field-name placeholder" type="text" name="lx" required="required" placeholder="输入您的QQ,QQ可作为你的提取密码">
								</div>
							</div>
							<div class="form-group">
	                        	<div class="input-group">
	                        		<div class="input-group-addon">选择数量</div>
									<div class="input-group-addon btn btn-primary" id="jia" onclick='numstepUp()'>+</div>
			                       	<input type="number" onBlur="checknum()"  name="number" id="number" class="form-control " placeholder="" min="1" step="1" value="1" required>
			                      	<div class="input-group-addon btn btn-primary" id="jian"  onclick='numstepDown()'>-</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">支付方式</div>
									<div class="input-field form-item field-name pay-style">
										<label class="radio-inline">
										  <input type="radio" name="type" id="alipay" value="alipay" title="支付宝"> 
										  <img src="assets/alipay.ico" alt="" width="16px"/> 
										  <span>支付宝</span>
										</label>

										<label class="radio-inline">
										  <input type="radio" name="type" id="wxpay" value="wxpay" title="微信"> 
										  <img src="assets/wechat.ico" alt="" /> 
										  <span>微信</span>
										
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="center">
							<button type="button" class="fancy-button button-line button-white large zoom subform" id="submit_buy">
								立即购买
								<span class="icon">
									<i class="fa fa-paper-plane-o"></i>
								</span>
							</button>
							<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>&site=qq&menu=yes" class="fancy-button button-line button-white large zoom subform">
								联系客服
								<span class="icon">
									<i class="fa fa-headphones"></i>
								</span>
							</a>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</section>
	<!--=== Testimonials section Ends ===-->
	
	<!--=== Footer section Starts ===-->
	<div id="section-footer" class="footer-wrap">
		<div class="container footer center">
			<?php echo $conf['foot']?>
			<div class="row">
				<div class="col-lg-12">
					<p class="copyright">Copyright © 2020 <?php echo $conf['title'];?></p><a href="http://pay.cccer.cn/" target="_blank">创梦源码支付</a>
				</div>
			</div>
		</div>
	</div>
	<!--=== Footer section Ends ===-->
	
<!--==== Js files ====-->

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="assets/js/jquery.nav.js"></script>
<script type="text/javascript" src="assets/js/jquery.appear.js"></script>


<!--==== Custom Script files ====-->
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>