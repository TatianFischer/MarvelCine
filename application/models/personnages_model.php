<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class personnages_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * [get_personnages description]
	 * @return [type] [description]
	 */
	public function get_personnages(){
		$query = $this->db->select('*')
							->from('personnages')
							->order_by('identity', 'asc')
							->order_by('actor', 'asc')
							->get();

		return $query->result();
	}


	public function set_personnage(){
		$perso = array(
			'identity' => $this->input->post('identity'),
			'alias' => $this->input->post('alias'),
			'actor' => $this->input->post('actor'),
			'img' => $this->input->post('img'),
			'bibliography' => $this->input->post('bibliography')
		);

		debug($perso);
	}

	public function get_personnage_by_id($id){

		if(is_numeric($id)){
			$query = $this->db->select('*')
							->from('personnages')
							->where('id', $id)
							->get();
			return $query->row();
		}
	}



	public function get_films_by_personnage($id){

		if(is_numeric($id)){
			$query = $this->db->select('films.title, films.id, relase_date')
							->from('films')
							->join('film_personnage', 'film_personnage.film_id = films.id', 'left')
							->where('film_personnage.perso_id', $id)
							->get();
			return $query->result();
		}
	}



	/**
	 * [get_personnages description]
	 * @param  [type] $film_id [description]
	 * @return [type]          [description]
	 */
	public function get_personnages_in_film($film_id){

		if(is_numeric($film_id)){

			$query = $this->db->select('alias, identity, img')
							->from('film_personnage')
							->join('personnages', 'film_personnage.perso_id = personnages.id')
							->where('film_id', $film_id)	
							->get();

			return $personnages = $query->result();

		}

	}

	public function get_groupes(){

		$query =  $this->db->distinct()
					->select('groupe')
					->from('personnages')
//					->where_not_in('groupe', 'null')
					->get();

		return $groupes = $query->result();
	}
}