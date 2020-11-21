<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	private $table = "tbl_user";
	private $_data = array();

	public function validate()
	{
		$username = $this->input->post('user_username');
		$password = $this->input->post('user_password');

		$this->db->where("user_username", $username);
		$query = $this->db->get($this->table);


		if ($query->num_rows()) {
			// found row by username
			$row = $query->row_array();

			// now check for the password
			if ($row['user_password'] == md5($password)) {
				// we not need password to store in session
				unset($row['user_password']);
				$this->_data = $row;
				return 'ERR_NONE';
			}

			// password not match
			return 'ERR_INVALID_PASSWORD';
		} else {

			// not found
			return 'ERR_INVALID_USERNAME';
		}
	}

	public function get_data()
	{
		return $this->_data;
	}
}
