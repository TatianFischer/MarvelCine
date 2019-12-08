<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller des personnages
*/

class Personnages extends CI_Controller
{
	
	public function __construct()
	{
		// Gère les autoload
		parent::__construct();

		// Appelle des models
		$this->load->model('personnages_model');
		$this->load->model('films_model');
		$this->load->model('film_personnage_model');
		$this->load->model('covers_model');
		$this->load->model('organisations_model');
		$this->load->model('organisation_personnage_model');

		// CSS du template
		$this->layout->addCss('layout');

		// Upload des fichier
		$this->load->library('upload');
	}


	public function index(){

		$data['personnages'] = $this->personnages_model->get_all_personnages();

		$this->layout->addCss('personnages');
		$this->layout->view('personnages/index', $data);

	}


	public function ajout_film($id_personnage){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$id_film = $this->input->post('new_film');

		$this->film_personnage_model->set_personnage_film($id_film, $id_personnage);

		redirect('personnages/fiche/'.$id_personnage);

	}


	public function ajout_organisation($id_personnage){
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$id_group = $this->input->post('new_group');

		$this->organisation_personnage_model->set_organisation_personnage($id_personnage, $id_group);

		redirect('personnages/fiche/'.$id_personnage);
	}



	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create(){

		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		$this->load->library('form_validation');


		if($_POST){
			$this->form_validation->set_rules('identity', 'identité', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('alias', 'alias', 'trim|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('actor', 'acteur', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('image', 'image', 'trim');
			$this->form_validation->set_rules('groupe', 'groupe', 'trim');
			$this->form_validation->set_rules('biography', 'biographie', 'trim|min_length[15]');

		}

		if ($this->form_validation->run() == FALSE) {
			$data['groupes'] = $this->organisations_model->get_groups();
			
			// Si le formulaire est invalide
			$this->layout->addCss('formulaire');
			$this->layout->addJs('formulaire');
			
			$this->layout->view('personnages/create', $data);

		} else {

			// Si le formulaire est valide
			// Appel du model et ajout à la BDD
			$id = $this->personnages_model->set_personnage();
			if($id){
				$group_id = $this->input->post('groupe');
				$group_id = ($group_id != "null") ? $group_id : null;
				$this->organisation_personnage_model->set_organisation_personnage($id, $group_id);
			}

			redirect('personnages/fiche/'.$id);
			
		}		

	}


	public function fiche($id){

		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		$this->load->library('form_validation');

		$data['personnage'] = $this->personnages_model->get_personnage_by_id($id);
		
		$films = $this->personnages_model->get_films_by_personnage($id);

		foreach ($films as $film) {
			$film->main_cover = $this->covers_model->get_random_cover($film->id);
		}

		$data['films'] = $films;
		//debug($data['films']);
		
		$data['groups'] = $this->organisations_model->get_organisations_by_personnage($id);
		//debug($data['groups']);

		// Liste de tous les autres films (pour l'ajout d'un film à un perso)
		$liste = $this->films_model->get_films_without_paginate();
		// On enlève les films déjà associés au personnage
		for($i = 0; $i < count($liste) ; $i++){

			foreach ($data['films'] as $film_perso) {
				
				if($liste[$i]->id == $film_perso->id){
					//debug($liste[$i]);
					unset($liste[$i]); // on supprime la valeur
					$liste = array_values($liste); // on décale le tableau en le réindexant
					$i--;
					break;
				}

			}

		}
		//debug($liste);
		$data['list_all_films'] = $liste;


		// Liste de tous les autres groupes (pour l'ajout d'un groupe)
		$liste_group = $this->organisations_model->get_groups();
		//debug($liste_group);
		// On enlève les groupes déjà associés au personnage
		for($j = 0; $j < count($liste_group); $j++){

			foreach ($data['groups'] as $group_perso) {
				// debug($group_perso);
				if($liste_group[$j]->id == $group_perso->id){
					unset($liste_group[$j]);
					$liste_group = array_values($liste_group);
					$j--;
					break;
				}
			}
		}

		$data['list_all_groups'] = $liste_group;

		$this->layout->addJs('personnages');
		$this->layout->addCss('personnages');
		$this->layout->view('personnages/fiche', $data);
	}


	public function update($id_personnage){
		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		
		$this->load->library('form_validation');

		if($_POST){
			$this->form_validation->set_rules('identity', 'identité', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('alias', 'alias', 'trim|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('actor', 'acteur', 'trim|required|min_length[4]|max_length[50]');
			$this->form_validation->set_rules('image', 'image', 'trim');
			$this->form_validation->set_rules('groupe', 'groupe', 'trim');
			$this->form_validation->set_rules('biography', 'biographie', 'trim|min_length[15]');

		}

		if ($this->form_validation->run() == FALSE) {
			$data['groupes'] = $this->organisations_model->get_groups();
			$data['personnage'] = $this->personnages_model->get_personnage_by_id($id_personnage);
			
			// Si le formulaire est invalide
			$this->layout->addCss('formulaire');
			$this->layout->addJs('formulaire');
			
			$this->layout->view('personnages/update', $data);

		} else {

			// Si le formulaire est valide
			// Appel du model et ajout à la BDD
			$this->personnages_model->update_personnage($id_personnage);

			redirect('personnages/fiche/'.$id_personnage);
			
		}
	}

	public function update_bio($id_personnage)
	{
		$this->personnages_model->set_bio($id_personnage);
	}
}