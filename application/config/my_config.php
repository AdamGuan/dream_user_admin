<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//输出到view的值
$config['data'] = array(
	'global_web_title_pro'=>'用户中心',
	'global_web_title_suffix'=>'后台管理',
	'global_web_license'=>'© 2015 dream license.',
	'global_left_bar'=>array(   //左侧列表
		array(
			'prefix_class'=>'am-icon-home',
			'text'=>'首页',
			'link'=>'c_index/index',
			'active'=>0,
			'children'=>array()
		)
	),
);

//列表页面
$config['page'] = 12;


/* End of file my_config.php */
/* Location: ./application/config/my_config.php */
