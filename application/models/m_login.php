<?php
class M_login extends MY_Model {

	public function __construct() {
		parent :: __construct();
		$this -> load -> database();
	}

	/**
	 * 检查用户名，密码是否正确
	 * @parame	$username	string
	 * @parame	$pwd		string
	 * @return	boolean
	 */
	public function check_user_login($username,$pwd)
	{
		$result = false;
		if(isset($username,$pwd))
		{
			$sql = 'SELECT F_id,F_login_name 
					FROM t_user 
					WHERE F_login_name="' .$username.'" AND
					F_login_password= "'.$pwd.'" LIMIT 1';
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0)
			{
				$resulttmp = $query->row_array();
				$session_array = array(
					'F_login_name'=>$resulttmp['F_login_name'],
					'F_id'=>$resulttmp['F_id'],
					);
				$this->session->set_userdata($session_array);
				$result = true;
			}
		}

		return $result;
	}

	/**
	 * 登录页面检查是否登录
	 *
	 * @return $result	int	1登录，0未登录.
	 */
	public function login_page_check_login() {
		$result = 0;

		$F_user_id = $this -> session -> userdata('F_id');
		if(isset($F_user_id))
		{
			$result = 1;
		}

		return $result;
	}

	/**
	 * 登出
	 */
	public function login_out() {
		$F_user_id = $this -> session -> userdata('F_id');
		if(isset($F_user_id))
		{
			$session_array = array(
				'F_login_name'=>'',
				'F_id'=>'',
			);
			$this -> session -> unset_userdata($session_array);
		}
		return 1;
	}

}

/**
 * End of file m_login.php
 */
/**
 * Location: ./app/model/m_login.php
 */