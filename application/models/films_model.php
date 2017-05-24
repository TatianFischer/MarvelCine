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
	}



	public function get_films(){

		$query = $this->db->select('id, title, phase')->get('films');
		$films = $query->result();

		foreach ($films as $film) {
			$film->main_cover = $this->get_main_cover($film->id);
		}

		return $films;

	}


	public function get_films_by_phase($phase){

		$query = $this->db->select('id, title, phase')
						->where('phase', $phase)
						->get('films');
		$films = $query->result();

		foreach ($films as $film) {

			$film->main_cover = $this->get_main_cover($film->id);
		}

		return $films;

	}



	public function get_films_paginate($page){

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


	/**
	 * [get_personnages description]
	 * @param  [type] $film_id [description]
	 * @return [type]          [description]
	 */
	public function get_personnages($film_id){

		if(is_numeric($film_id)){

			$query = $this->db->select('alias, identity, img')
							->from('film_personnage')
							->join('personnages', 'film_personnage.perso_id = personnages.id')
							->where('film_id', $film_id)	
							->get();

			return $personnanges = $query->result();

		}

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


	/**
	 * [get_covers description]
	 * @param  [type] $film_id [description]
	 * @return [type]          [description]
	 */
	public function get_covers($film_id){
		if(is_numeric($film_id)){
			$query = $this->db->get_where('covers', array('film_id' => $film_id));
			return $query->result();
		}
	}


	/**
	 * [get_main_cover description]
	 * @param  [type] $film_id [description]
	 * @return [type]          [description]
	 */
	public function get_main_cover($film_id){
		if(is_numeric($film_id)){
			$query = $this->db	->select('img, alt')
								->from('covers')
								->where('film_id', $film_id)
								->where('affiche', 1)
								->get();
			return $query->row();
		}
	}
}