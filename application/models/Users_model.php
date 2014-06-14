<?php
Class Users_model extends CI_Model {
	
	function validate_user_login($username, $password) {
		$this->db->where('name', $username);
		$this->db->where('pass', $password);
		$this->db->where('status', 1);
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			//$data = array('access' => time());
			//$where = "name = '".$username."'"; 
			$data = array('access' => time(),);
			$this->db->where('name', $username);
			$this->db->update('users', $data);
			return true;
		}		
	}
}
?>