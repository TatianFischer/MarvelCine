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


	public function get_all_films(){		

		return $query = $this->db->select('id, title, phase')
								->from('films');

	}

	/**
	 * [get_films_without_paginate description]
	 * @return [type] [description]
	 */
	public function get_films_without_paginate(){
		$query = $this->get_all_films()
						->get();

		return $query->result();
	}


	public function get_films_by_phase($phase){

		$query = $this->get_all_films()
						->where('phase', $phase)
						->get();
		$films = $query->result();

		return $films;

	}


	public function get_films_paginate($offset, $per_page){
		$query = $this->get_all_films()
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


	public function get_last_film(){
		$query = $this->db->select('*')
							->from('films')
							->where('release_date <=', date('Y-m-d'))
							->order_by('release_date', 'DESC')
							->limit(1)
							->get();
		return $query->row();
	}



	public function get_next_film(){
		$query = $this->db->select('*')
							->from('films')
							->where('release_date >=', date('Y-m-d'))
							->order_by('release_date', 'ASC')
							->limit(1)
							->get();
		return $query->row();
	}



	public function get_random_film(){
		$query = $this->db->select('*')
							->from('films')
							->order_by('release_date', 'RANDOM')
							->limit(1)
							->get();
		return $query->row();
	}



	public function set_film()
	{
		if($this->input->post("new_director") == ""){

			echo 'hello';
			$director_id = $this->input->post('director');
			
		} else {
			
			$director = array(
				"name"	=> $this->input->post('new_director')
			);
			$this->db->insert('directors', $director);
			$director_id = $this->db->insert_id();

		}

		

		$film = array(
			"title" 		=> $this->input->post('title'),
			"release_date"	=> $this->input->post('release_date'),
			"synopsis"		=> $this->input->post('synopsis'),
			"duration"		=> $this->input->post('duration'),
			"phase"			=> $this->input->post('phase'),
			"director_id"	=> $director_id,
			"trailer"		=> $this->input->post('trailer')
		);

		$this->db->insert('films', $film);
				
		return $this->db->insert_id();
	}

}