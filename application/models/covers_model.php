<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class covers_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
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