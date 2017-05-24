<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class directors_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * [get_director description]
	 * @param  [type] $director_id [description]
	 * @return [type]              [description]
	 */
	public function get_director($director_id){
		if(is_numeric($director_id)){
			$query = $this->db->get_where('directors', array('id' => $director_id));
			return $director = $query->row();
		}
	}
	
}