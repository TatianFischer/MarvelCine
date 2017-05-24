<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class films_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}


	public function get_films(){		

		return $query = $this->db->select('id, title, phase')
								->from('films');

	}


	public function get_films_by_phase($phase){

		$query = $this->get_films()
						->where('phase', $phase)
						->get();
		$films = $query->result();

		return $films;

	}


	public function get_films_paginate($offset, $per_page){
		$query = $this->get_films()
					->limit($per_page, $offset)
					->get();

		return $films = $query->result();
	}


	/**
	 * [get_film_by_id description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_film_by_id($id){

		if(is_numeric($id)){

			$query = $this->db->get_where('films', array('id' => $id ));
			return $film = $query->row();

		}

	}

}