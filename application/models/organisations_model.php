<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Organisations_model extends CI_Model {

	
	function __construct(){

		parent::__construct();

	}

	public function get_organisations_by_personnage($perso_id){
		
		if(is_numeric($perso_id)){
			$query = $this->db	->select('organisations.name, organisations.id')
								->from('organisations')
								->join('organisation_personnage', 'organisation_personnage.organisation_id = organisations.id')
								->where('organisation_personnage.personnage_id', $perso_id)
								->get();
			return $query->result();
		}
	}


	public function get_groups()
	{
		
		$query = $this->db->get('organisations');
		return $query->result();

	}

}

/* End of file organisations_model.php */
/* Location: ./application/models/organisations_model.php */