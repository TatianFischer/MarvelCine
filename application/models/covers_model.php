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

			// Ne pas bouger
			$affiche = ($this->input->post('affiche') == 'false' )? 0 : 1;

			/*if($this->input->post('affiche') == 'true' && $this->get_main_cover($film_id) != ""){

				$this->session->set_flashdata('upload', 'Une autre affiche est déjà principale. Êtes-vous sûr de vouloir en changer ?');

				$this->session->set_userdata('SecondTry', true);

				return;

			}*/

			$main = $this->get_main_cover($film_id);

			if($this->input->post('affiche') == 'false' &&  $main = ""){

			// Aucune affiche principale en BDD
				$affiche = 1;

			}

			var_dump($affiche);

			$cover = array(
				'img'  		=> $this->upload->data('file_name'),
				'alt' 		=> $this->input->post('alt'),
				'affiche' 	=> $affiche,
				'film_id'	=> $film_id

			);

			$this->db->insert('covers', $cover);

			$this->session->set_flashdata('upload', 'L\'affiche a bien été ajoutée');

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
}