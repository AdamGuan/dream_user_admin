<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($global_web_title_pro)?$global_web_title_pro."-".$global_web_title_suffix:'';?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="icon" type="image/png" href="<?php echo get_assets_image_url('favicon.png');?>">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_assets_image_url('app-icon72x72@2x.png');?>">
	<meta name="apple-mobile-web-app-title" content="<?php echo isset($web_title_pro)?$global_web_title_pro."-".$global_web_title_suffix:'';?>" />
	<link rel="stylesheet" href="<?php echo get_assets_css_url('amazeui.min.css');?>"/>
	<link rel="stylesheet" href="<?php echo get_assets_css_url('admin.css');?>">
	<style>
		.header {
			text-align: center;
		}
		.header h1 {
			font-size: 200%;
			color: #333;
			margin-top: 30px;
		}
		.header p {
			font-size: 14px;
		}
	</style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，<?php echo isset($global_web_title_pro)?$global_web_title_pro."-".$global_web_title_suffix:'';?> 暂不支持。 请 <a href="http://browsehappy.com/"
                                                                                                                                           target="_blank">升级浏览器</a>
	以获得更好的体验！</p>
<![endif]-->

<div class="header">
	<div class="am-g">
		<h1><?php echo isset($global_web_title_pro)?$global_web_title_pro."-".$global_web_title_suffix:'';?></h1>
	</div>
	<hr />
</div>
<div class="am-g">
	<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

		<br>
		<br>

		<form method="post" class="am-form" id="loginform">
<!--			<label for="name">用户名:</label>-->
			<div class="am-form-group am-form-icon">
				<i class="am-icon-user"></i>
				<input type="text" name="" class="am-form-field" id="name" value="" placeholder="用户名">
			</div>
			<br>
<!--			<label for="password">密码:</label>-->
			<div class="am-form-group am-form-icon">
				<i class="am-icon-lock"></i>
				<input type="password" name="" class="am-form-field" id="password" value="" placeholder="密码">
			</div>
			<br>
			<!--
			<label for="remember-me">
				<input id="remember-me" type="checkbox">
				记住密码
			</label>
			-->
			<div class="am-cf">
				<input type="submit" id="loginformbtn" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm
				am-fl">
				<!--
				<input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
				-->
			</div>
		</form>
		<hr>
		<p><?php echo $global_web_license;?></p>
	</div>
</div>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
	<div class="am-modal-dialog">
		<div class="am-modal-bd" id="my-alert-message">
			Hello world！
		</div>
		<div class="am-modal-footer">
			<span class="am-modal-btn">确定</span>
		</div>
	</div>
</div>

<script>
	var login_valid_url = "<?php echo my_site_url('c_login/login_valid');?>";
</script>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo get_assets_js_url('polyfill/rem.min.js');?>""></script>
<script src="<?php echo get_assets_js_url('polyfill/respond.min.js');?>"></script>
<script src="<?php echo get_assets_js_url('amazeui.legacy.js');?>"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo get_assets_js_url('jquery.min.js');?>"></script>
<script src="<?php echo get_assets_js_url('amazeui.min.js');?>"></script>
<!--<![endif]-->

<?php if(isset($js_list) && is_array($js_list) && count($js_list) > 0){
	foreach($js_list as $js)
	{
		echo "<script src='".$js."'></script>";
	}
}?>
<script src="<?php echo get_assets_js_url($global_js);?>"></script>

</body>
</html>