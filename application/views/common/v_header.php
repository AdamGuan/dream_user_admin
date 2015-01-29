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
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，<?php echo isset($web_title_pro)?$web_title_pro."-".$web_title_suffix:'';?> 暂不支持。 请 <a href="http://browsehappy.com/"
                                                                   target="_blank">升级浏览器</a>
	以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
	<div class="am-topbar-brand">
		<a href="<?php echo get_myindex_url(array());?>"><strong><?php echo $global_web_title_pro;?></strong> <small><?php echo $global_web_title_suffix;?></small></a>
	</div>

	<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

	<div class="am-collapse am-topbar-collapse" id="topbar-collapse">
		<ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
			<li><a href="javascript:void(0);" style="color:white;"><span class="am-icon-at"></span> 帐号:<?php echo $global_login_name;?></a></li>
			<li><a id="exit" href="#" style="color:white;"><span class="am-icon-power-off"></span> 退出</a></li>
		</ul>
	</div>
</header>

<div class="am-cf admin-main" style="background-color:white;">
	<!-- sidebar start -->
	<!--
	<div class="admin-sidebar">
		<ul class="am-list admin-sidebar-list" data-am-sticky>
			<?php foreach($global_left_bar as $key=>$item){
				$output_str = '';
				if(isset($item['children']) && is_array($item['children']) && count($item['children']) > 0){
					$output_str .= '<li class="admin-parent">';
					$output_str .= '<a href="javascript:void(0);" data-am-collapse="{target: \'#collapse-nav'.$key .'\'}"><span class="'.$item['prefix_class'].'"></span> '.$item['text'].' <span class="am-icon-angle-right am-fr am-margin-right"></span></a>';
					$output_str_tmp = '';
					$active = 0;
					foreach($item['children'] as $subitem)
					{
						if(1)
						{
							if(isset($subitem['hidden']) && $subitem['hidden'] == 1)
							{
								if($subitem['link'] == $global_active)
								{
									$content_title = $subitem['text'];
								}
							}
							else
							{
								if($subitem['link'] == $global_active)
								{
									$active = 1;
									$content_title = $subitem['text'];
									$output_str_tmp .= '<li style="background-color:#ddd"><a class="leftbara" href="'.my_site_url($subitem['link']).'"><span class="'.$subitem['prefix_class'].'"></span> '.$subitem['text'].'<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>';
								}
								else{
									$output_str_tmp .= '<li><a class="leftbara" href="'.my_site_url($subitem['link']).'"><span class="'.$subitem['prefix_class'].'"></span> '.$subitem['text'].'</a></li>';
								}
							}
						}
					}
					if($active == 1)
					{
						$output_str .= '<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav'.$key.'">';
					}
					else{
						$output_str .= '<ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav' .$key.'">';
					}
					if(isset($output_str_tmp[1]))
					{
						$output_str .= $output_str_tmp;
						$output_str .= '</ul>';
						$output_str .= '</li>';
					}
					else{
						$output_str = '';
					}
				}
				else{
					if(1)
					{
						if(isset($item['hidden']) && $item['hidden'] == 1)
						{
							if($item['link'] == $global_active)
							{
								$content_title = $item['text'];
							}
						}
						else
						{
							if($item['link'] == $global_active)
							{
								$output_str .= '<li style="background-color:#ddd"><a class="leftbara" href="'.my_site_url($item['link']).'"><span class="'.$item['prefix_class'] .'"></span> ' .$item['text'];
								$output_str .= '<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>';
								$output_str .= '</a></li>';
								$content_title = $item['text'];
							}
							else{
								$output_str .= '<li><a class="leftbara" href="'.my_site_url($item['link']).'"><span class="'.$item['prefix_class'] .'"></span> ' .$item['text'];
								$output_str .= '</a></li>';
							}
						}
					}
				}
				echo $output_str;
			}?>
		</ul>
	</div>
	-->
	<!-- sidebar end -->

	<!-- content start -->
	<div class="admin-content">

		<div class="am-cf am-padding">
			<!--
			<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><?php echo isset($content_title)
	?$content_title:"";?></strong></div>

			<hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
			-->
		</div>


		<?php if(isset($do) && !is_null($do) && $do == "success"){?>
			<div class="am-alert am-alert-success" data-am-alert>
				<button type="button" class="am-close">&times;</button>
				<p>操作成功!</p>
			</div>
		<?php }else if(isset($do) && !is_null($do) && $do == "fail"){?>
		<div class="am-alert am-alert-warning" data-am-alert>
			<button type="button" class="am-close">&times;</button>
			<p>操作失败!请重试!</p>
		</div>
		<?php }?>