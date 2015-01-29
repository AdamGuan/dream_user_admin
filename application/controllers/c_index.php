<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_index extends MY_Controller {

	public function __construct() {
		parent :: __construct();
	}

	//列表
	public function manager($parames = array())
	{
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务
		if(isset($parames['search']) && strlen(trim($parames['search'])) <= 0)
		{
			unset($parames['search']);
		}
		if(!isset($parames['page']))
		{
			$parames['page'] = 1;
		}
		$this -> load -> model('M_index', 'mindex');
		$result = $this->mindex->get_pkg_list($parames);
		//set page list
		$page_total = 1;
		if(isset($result['total']))
		{
			$page_total = (int)ceil($result['total']/$this->my_config['page']);
		}
		$page_list = array();
		$page_pre_active =  true;
		$page_pre_url =  "#";
		$page_next_active =  true;
		$page_next_url =  "#";
		for($i=1;$i<=$page_total;++$i)
		{
			$item = array();
			$item['active'] = 0;
			$parames2 = $parames;
			$parames2['page'] = $i;
			$item['url'] = get_myindex_url($parames2);
			$item['page'] = $i;
			if($i == (int)$parames['page'])
			{
				$item['url'] = "#";
				$item['active'] = 1;
				$parames2['page'] = $i-1;
				$page_pre_url = get_myindex_url($parames2);
				$parames2['page'] = $i+1;
				$page_next_url = get_myindex_url($parames2);
				if($i == 1)
				{
					$page_pre_active = false;
					$page_pre_url = "#";
				}
				if($i == $page_total)
				{
					$page_next_active =  false;
					$page_next_url = "#";
				}
			}
			$page_list[] = $item;
		}
		$page_list = split_page($page_list,(int)$parames['page']);
		//data
		$data = $this->_get_data(__CLASS__,__METHOD__);
		$data['list'] = isset($result['list'])?$result['list']:array();
		$data['total'] = isset($result['total'])?$result['total']:0;
		$data['page_total'] = $page_total;
		$data['page_list'] = $page_list;
		$data['page_pre_active'] = $page_pre_active;
		$data['page_next_active'] = $page_next_active;
		$data['page_pre_url'] = $page_pre_url;
		$data['page_next_url'] = $page_next_url;
		$data['search'] = isset($parames['search'])?$parames['search']:"";
		$this->_output_view("index/v_manager", $data);
	}

	/**
	 * 获取一个包的信息
	 * @param array $parames
	 *          F_pkg    string
	 */
	public function pkg_edit($parames = array())
	{
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务
		//get teacher info
		$this -> load -> model('M_index', 'mindex');
		$info = $this->mindex->get_pkg_info($parames);

		//data
		$data = $this->_get_data(__CLASS__,__METHOD__);
		$data['do'] = $this->session->flashdata('do');
		$data['content_title'] = "编辑";
		$data['info'] = $info;
		$data['F_pkg'] = isset($parames['F_pkg'])?$parames['F_pkg']:"";
		$this->_output_view("index/v_edit", $data);
	}

	/**
	 * ajax修改一个包的信息
	 * @param array $parames
	 */
	public function pkg_modify($parames = array()){
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务
		$data = array("error"=>0);
		$this -> load -> model('M_index', 'mindex');
		$result = $this->mindex->modify_pkg_info($parames);
		if(!$result)
		{
			$data["error"] = -1;
			$data["msg"] = "失败";
		}
		else{
			$this->session->set_flashdata('do', 'success');
		}
		$this->_ajax_echo($data);
	}

	/**
	 * ajax删除包
	 * @param array $parames
	 *                  F_pkg   string
	 */
	public function pkg_delete($parames = array()){
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务
		$this -> load -> model('M_index', 'mindex');
		$result = $this->mindex->delete_pkg($parames);
		if($result === true)
		{
			$this->session->set_flashdata('do', 'success');
		}else{
			$this->session->set_flashdata('do', 'fail');
		}

		$data = array('result'=>$result);
		$this->_ajax_echo($data);
	}

	/**
	 * 显示添加一个包的页面
	 * @param array $parames
	 */
	public function pkg_add($parames = array())
	{
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务

//		$this -> load -> model('M_index', 'mindex');

		//data
		$data = $this->_get_data(__CLASS__,__METHOD__);
		$data['content_title'] = "添加";

		$this->_output_view("index/v_add", $data);
	}

	/**
	 * ajax添加包
	 * @param array $parames
	 */
	public function pkg_add_do($parames = array()){
		//检查是否有登录
		$result = $this->_check_login();
		if(is_array($result) && isset($result['redirect_url']))	//未登录
		{
			top_redirect($result['redirect_url']);
		}
		//业务
		$data = array("error"=>0);
		$this -> load -> model('M_index', 'mindex');
		$result = $this->mindex->add_pkg($parames);
		if(!$result)
		{
			$data["error"] = -1;
			$data["msg"] = "添加失败,包名重复";
		}
		else{
			$this->session->set_flashdata('do', 'success');
		}
		$this->_ajax_echo($data);
	}


}

/* End of file c_index.php */
/* Location: ./application/controllers/c_index.php */