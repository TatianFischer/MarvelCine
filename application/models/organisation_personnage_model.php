<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisation_personnage_model extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	public function set_organisation_personnage($id_perso, $group_id){

		$organisation_personnage = array(
			'organisation_id' 	=> 	$group_id,
			'personnage_id'		=>	$id_perso 
		);

		debug($organisation_personnage);

		$this->db->insert('organisation_personnage', $organisation_personnage);
	}

}

/* End of file organisation_personnage_model.php */
/* Location: ./application/models/organisation_personnage_model.php */