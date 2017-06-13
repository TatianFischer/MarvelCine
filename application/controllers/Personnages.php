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

		// CSS du template
		$this->layout->addCss('layout');
	}


	public function index(){

		$data['personnages'] = $this->personnages_model->get_personnages();

		$this->layout->addCss('personnages');
		$this->layout->view('personnages/index', $data);

	}


	public function fiche($id){

		$data['personnage'] = $this->personnages_model->get_personnage_by_id($id);
		$data['films'] = $this->personnages_model->get_films_by_personnage($id);
		//debug($data);

		$this->layout->addCss('personnages');
		$this->layout->view('personnages/fiche', $data);
	}


	public function create(){

		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		$this->load->library('form_validation');


		if($_POST){
			$this->form_validation->set_rules('identity', 'identité', 'trim|required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('alias', 'alias', 'trim|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('actor', 'acteur', 'trim|required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('image', 'image', 'trim|image');
			$this->form_validation->set_rules('groupe', 'groupe', 'trim|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('bibliography', 'bibliographie', 'trim|min_length[15]');

		}

		if ($this->form_validation->run() == FALSE) {
			$data['groupes'] = $this->personnages_model->get_groupes();
			debug($data);
			// Si le formulaire est invalide
			$this->layout->addCss('formulaire');
			$this->layout->addJs('formulaire');
			
			$this->layout->view('personnages/create', $data);

		} else {

			// Si le formulaire est valide
			// Appel du model et ajput à la BDD
			$id = $this->personnages_model->set_personnage();

			redirect('personnages/fiche/'.$id);
			
		}		

	}

}