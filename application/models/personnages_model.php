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
	 * @return [object] [tous les personnages]
	 */
	public function get_all_personnages(){
		$query = $this->db->select('*')
							->from('personnages')
							->order_by('identity', 'asc')
							->order_by('actor', 'asc')
							->get();

		return $query->result();
	}



	/**
	 * [set_personnage description]
	 * @return [int] $id [Id tu personnage inséré en BDD]
	 */
	public function set_personnage(){
		$img = $this->input->post('img');
		$img = ($img != "") ? $img : null;

		$perso = array(
			'identity' 	=> $this->input->post('identity'),
			'alias' 	=> $this->input->post('alias'),
			'actor' 	=> $this->input->post('actor'),
			'img' 		=> $img,
			'biography' => $this->input->post('biography')
		);

		$this->db->insert('personnages', $perso);

		return $this->db->insert_id();
	}



	/**
	 * [get_personnage_by_id description]
	 * @param  [int] $id [id du personnage]
	 * @return [object]     [personnage]
	 */
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
			$query = $this->db->select('films.title, films.id, release_date')
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

			$query = $this->db->select('*')
							->from('film_personnage')
							->join('personnages', 'film_personnage.perso_id = personnages.id')
							->where('film_id', $film_id)	
							->get();

			return $personnages = $query->result();

		}

	}

	public function get_id_personnages_in_film($film_id)
	{
		if(is_numeric($film_id)){

			$query = $this->db->select('perso_id')
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
					// ->where_not_in('groupe', 'null')
					->get();

		return $groupes = $query->result();
	}

	public function update_personnage($id_personnage)
	{
		$img = $this->input->post('img');
		$img = ($img != "") ? $img : null;

		$perso = array(
			'identity' 	=> $this->input->post('identity'),
			'alias' 	=> $this->input->post('alias'),
			'actor' 	=> $this->input->post('actor'),
			'img' 		=> $img,
			'biography' => $this->input->post('biography')
		);

		$this->db->where('id', $id_personnage);

		$this->db->update('personnages', $perso);
	}
}