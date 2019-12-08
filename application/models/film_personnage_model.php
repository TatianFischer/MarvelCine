<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class film_personnage_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function set_personnage_film($film_id, $perso_id){

		$film_personnage = array(
			"film_id"	=> $film_id,
			"perso_id"	=> $perso_id
		);

		debug($film_personnage);

		$this->db->insert('film_personnage', $film_personnage);
	}
}