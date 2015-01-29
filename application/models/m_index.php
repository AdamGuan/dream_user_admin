<?php
class M_index extends MY_Model {

	protected $db_user;

	public function __construct() {
		parent :: __construct();
		$this->db_user = $this->load->database('user', TRUE);
	}
	
	/**
	* 获取包列表
	* @parame	$parames	array
	*				search	string optional
	*				page	int optional
	* @return	$result	array
	*				total	int	optional
	*				list	array	optional
	*					F_pkg	string
	*					F_app_name	string
	*/
	
	public function get_pkg_list($parames = array()){
		
		$result = array();
		
		//set where
		$where = ' WHERE 1 ';
		if(isset($parames['search']))
		{
			$search = (string)$parames['search'];
			$where .= ' AND F_pkg LIKE "%'.$search.'%" OR F_app_name LIKE "%'.$search.'%" ';
		}
		
		$sql = 'SELECT count(F_pkg) as total FROM t_config_pkg'.$where;
		$query = $this->db_user->query($sql);
		
		if($query->num_rows() > 0){
			$tmp = $query->row_array();
			$result['total'] = (int)$tmp['total'];
			$result['list'] = array();
			if($result['total'] > 0){

				$limit = ' LIMIT 0,'.$this->my_config['page'];
				if(isset($parames['page']) && $parames['page'] > 0)
				{
					$limit = ' LIMIT '.(((int)$parames['page']-1)*$this->my_config['page']).','.$this->my_config['page'];
				}
				$sql = 'SELECT F_pkg,F_app_name FROM t_config_pkg'.$where.' ORDER BY F_pkg'.$limit;
				$query = $this->db_user->query($sql);
				$tmp = $query->result_array();
				$result['list'] = $tmp;
			}
		}
		return $result;
	}

	/**
	* 获取包info
	* @parame	$parames	array
	*				F_pkg		string
	* @return	$result	array
	*				F_pkg	
	*				F_app_name	
	*/
	public function get_pkg_info($parames = array()){
		
		$result = array();
		
		if(isset($parames['F_pkg']))
		{
			$sql = 'SELECT F_pkg,F_app_name FROM t_config_pkg WHERE F_pkg = "'.(string)$parames['F_pkg'].'" LIMIT 1';
			$query = $this->db_user->query($sql);
			if($query->num_rows() > 0){
				$result = $query->row_array();
			}
		}
		
		return $result;
	}
	
	/**
	* 修改包
	* @parame	$parames	array
	*				F_pkg		string
	*				F_app_name		string
	* @return	boolean
	*/
	public function modify_pkg_info($parames = array()){
		
		$result = false;
		
		if(isset($parames['F_pkg'],$parames['F_app_name']))
		{
			$sql = 'UPDATE t_config_pkg SET F_app_name = "'.(string)$parames['F_app_name'].'" WHERE F_pkg = "'.(string)$parames['F_pkg'].'" LIMIT 1';
			$this->db_user->query($sql);
			$result = true;
		}
		
		return $result;
	}

	/**
	* 新增包
	* @parame	$parames	array
	*				F_pkg		string
	*				F_app_name		string
	* @return	boolean
	*/
	public function add_pkg($parames = array()){
		
		$result = false;
		
		if(isset($parames['F_pkg'],$parames['F_app_name']))
		{
			$sql = 'SELECT F_pkg FROM t_config_pkg WHERE F_pkg = "'.$parames['F_pkg'].'" LIMIT 1';
			$query = $this->db_user->query($sql);
			if($query->num_rows() <= 0){
				$sql = 'INSERT INTO t_config_pkg VALUES("'.(string)$parames['F_pkg'].'","'.(string)$parames['F_app_name'].'","ogxif29tbur554rh6n2m9yefhajgqkjqwspvr4lzu9rczxvn","2qdmwrqh979waj4emidd0yh07jcu9xm5rz4vuqam1bt4lq0k","06midcv0qs66lq3w4e8r7s7njngcd18t19wv53huegtga47s","template1")';
				$this->db_user->query($sql);
				$result = true;
			}
		}
		
		return $result;
	}

	/**
	* 删除包
	* @parame	$parames	array
	*				F_pkg		string
	* @return	boolean
	*/
	public function delete_pkg($parames = array()){
		
		$result = false;
		
		if(isset($parames['F_pkg']))
		{
			$list = explode(",",$parames['F_pkg']);
			$list = '"'.implode('","',$list).'"';
			$sql = 'DELETE FROM t_config_pkg WHERE F_pkg IN('.$list.')';
			$query = $this->db_user->query($sql);
			$result = true;
		}
		
		return $result;
	}

}

/**
 * End of file m_index.php
 */
/**
 * Location: ./app/models/m_index.php
 */