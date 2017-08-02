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


	public function set_cover($film_id){

		if(is_numeric($film_id)){

			var_dump($affiche);

			$cover = array(
				'img'  		=> $this->upload->data('file_name'),
				'alt' 		=> $this->input->post('alt'),
				'film_id'	=> $film_id
			);

			if($this->db->insert('covers', $cover)){
				$this->session->set_flashdata('upload', 'L\'affiche a bien été ajoutée');
			}
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
								->limit(1)
								->get();
			return $query->row();

		}

	}

	public function get_random_cover($film_id){
		
		if(is_numeric($film_id)){

			$query = $this->db	->select('img, alt')
								->from('covers')
								->where('film_id', $film_id)
								->order_by('id', 'RANDOM')
								->limit(1)
								->get();
			return $query->row();
		}
	}
}