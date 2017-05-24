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
}