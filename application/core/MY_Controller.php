<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $my_config;

	public function __construct() {
		parent :: __construct(); 
		// load config
		$this -> load -> config('my_config', true, true);
		$this -> my_config = $this -> config -> item('my_config'); 
	} 

	/**
	 * 输出数据到视图（组合了头部，脚部公共部分的视图）.
	 * 
	 * @parame $template	模板名称 string
	 * @parame $data		数据 array
	 * @parame $no_common	是否组合公共模板(false是,true否)
	 */
	protected function _output_view($template, $data = array(), $no_common = false) {
		if ($no_common) {
			$this -> load -> view($template,$data);
		} else {
			$this -> load -> view('common/v_header', $data);
			$this -> load -> view($template);
			$this -> load -> view('common/v_footer');
		} 
	} 

	/**
	 * 把实际的action重新路由到对应的方法,严格控制用户可访问的action
	 */
	public function _remap($method, $params = array()) {
		
		//参数merge
		$par1 = $this->input->post(NULL,true); 
		$par2 = $this->input->get(NULL,true);
		if($par1  && $par2)
		{
			$params = array_merge($par1,$par2);
		}
		else
		{
			if($par1)
			{
				$params = $par1;
			}
			if($par2)
			{
				$params = $par2;
			}
		}
		// call action
		if (method_exists($this, $method)) {
			return call_user_func_array(array($this, $method), array($params));
		} 
		show_404();
	} 

	/**
	 * ajax输出数据
	 * 
	 * @parame $datas	mix
	 */
	protected function _ajax_echo($datas) {
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode($datas);
		exit;
	} 

	/**
	 * 检查是否已登录.
	 * @return $result	array
	 *		error			int		[optional],为-1表没有登录
	 *		redirect_url	string	[optional]
	 */
	protected function _check_login() {
		$result = array();
		$F_user_id = $this -> session -> userdata('F_id');
		if(isset($F_user_id) && $F_user_id > 0)
		{
			$this -> load -> model('M_login', 'mlogin');
			$logined = $this->mlogin->login_page_check_login();
			if($logined != 1)
			{
				$result = array('error'=>-1,'redirect_url'=>get_login_url());
			}
		}
		else{
			$result = array('error'=>-1,'redirect_url'=>get_login_url());
		}
		return $result;
	}

	/**
	 *
	 * @param $class
	 * @param $mothod
	 * @return string
	 */
	protected function _get_current_class_method($class,$mothod)
	{
		$class = strtolower(str_replace('_Controller', '', $class));
		$mothod = strtolower(end(explode("::",$mothod)));
		return $class.'/'.$mothod;
	}

	/**
	 * 获取data
	 * @param $class
	 * @param $mothod
	 * @return mixed
	 */
	protected function _get_data($class,$mothod)
	{
		$data = $this->my_config['data'];

		$class_method = $this->_get_current_class_method($class,$mothod);
		$class_method = strtolower($class_method);
		$data['global_active'] = $class_method;

		$tmp = explode("/",$class_method);
		$data['global_js'] = implode("_",$tmp).".js";

		$data['global_login_name'] = $this -> session -> userdata('F_login_name');

		return $data;
	}

	/**
	 * 检查权限
	 * @param $class
	 * @param $mothod
	 * @return bool
	 */
	protected function _check_privity($class,$mothod){
		$class_method = $this->_get_current_class_method($class,$mothod);
		return check_privity($class_method);
	}

} 
/**
 * End of file MY_Controller.php
 */
/**
 * Location: ./application/core/MY_Controller.php
 */