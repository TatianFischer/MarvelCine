<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class users_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function register_user()
	{
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		if(!$password){
			return false;
		}

		$user = array(
			'firstname'		=> $this->input->post('firstname'),
			'lastname'		=> $this->input->post('lastname'),
			'pseudo'		=> $this->input->post('pseudo'),
			'email'			=> $this->input->post('email'),
			'sexe'			=> $this->input->post('sexe'),
			'password'		=> $password,
			'role'			=> 'user',
		);

		$this->db->insert('users', $user);

		return $this->db->insert_id();
	}

	public function login_user()
	{
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		
		$this->db->select('*')
				->from('users')
				->where('email', $login)
				->or_where('pseudo', $login);

		//$sql = $this->db->get_compiled_select();
		if($query = $this->db->get()){

			$data = $query->row_array();

			if(password_verify($password, $data['password'])){

				return $data;

			} else{

				return false;

			}

		} else{

			return false;
			
		}

	}

	public function get_user_by_id($id)
	{
		if(is_numeric($id)){
			$query = $this->db->select('*')
							->from('users')
							->where('id', $id)
							->get();
			return $query->row();
		}
	}
}