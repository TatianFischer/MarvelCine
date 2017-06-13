<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller des films
*/
class Films extends CI_Controller
{
	public $per_page;
	
	public function __construct(){
		// gére les autoload
		parent::__construct();

		//
		$this->per_page = 6;

		// appel du model
		$this->load->model('films_model');
		$this->load->model('covers_model');
		$this->load->model('directors_model');
		$this->load->model('personnages_model');

		// CSS du template
		$this->layout->addCss('layout');
	}



	public function index($phase = null)
	{
		if($phase == null){
			// Pagination
			$this->config_paginate();

			$data['liens'] = $this->pagination->create_links();

			$films = $this->films_model->get_films_paginate(0, $this->per_page);

		} else {

			$films = $this->films_model->get_films_by_phase($phase);

		}

		foreach ($films as $film) {
			$film->main_cover = $this->covers_model->get_main_cover($film->id);
		}

		$data['films'] = $films;

		//debug($data);

		// On rend la vue
		$this->layout->addCss('films');
	    $this->layout->view('films/index', $data);
	}


	public function page($offset){
		// Pagination
		$this->config_paginate();

		$data['liens'] = $this->pagination->create_links();

		$films = $this->films_model->get_films_paginate($offset, $this->per_page);

		$data['films'] = $films;

		//debug($data);

		// On rend la vue
		$this->layout->addCss('films');
	    $this->layout->view('films/index', $data);
	}

	private function config_paginate(){
		$config['base_url'] = base_url().'films/page/';
		$config['first_url'] = base_url().'films/';
		$config['total_rows'] = $this->films_model->get_allFilms()->count_all_results();
		$config['per_page'] = $this->per_page;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current"><b>';
		$config['cur_tag_close'] = '</b></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$this->pagination->initialize($config);

	}


	public function fiche($id){

		// Appel à la base de données pour récupérer le film
		$data['film'] = $this->films_model->get_film_by_id($id);

		// Appel à la base de données pour récupérer les personnages
		$data['personnages'] = $this->personnages_model->get_personnages_in_film($id);

		// Appel à la base de données pour le réalisateur
		$data['director'] = $this->directors_model->get_director($data['film']->director_id);

		// Les affiches du film
		$data['covers'] = $this->covers_model->get_covers($id);
		
		//debug($data);

		// On rend la vue
		$this->layout->setTitre('Film - '.$data['film']->title);
		$this->layout->addCss('films');
		$this->layout->addJS('films');
		$this->layout->view('films/fiche', $data);

	}


	public function create(){
		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		$this->load->library('form_validation');

		$data['directors'] = $this->directors_model->get_allDirectors();

		if($_POST){
			$this->form_validation->set_rules('title', 'titre', 'trim|required|min_length[3]|max_length[255]');
			$this->form_validation->set_rules('release_date', 'date de sortie', 'trim|required|regex_match[/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/]');
			$this->form_validation->set_rules('synopsis', 'résumé', 'trim|min_length[5]');
			$this->form_validation->set_rules('duration', 'durée', 'trim|required|is_natural_no_zero|greater_than[60]|less_than[300]');
			$this->form_validation->set_rules('phase', 'phase', 'trim|required|greater_than[0]|less_than[10]');
			$this->form_validation->set_rules('trailer', 'trailer', 'trim|required|exact_length[8]|integer');

			if($this->input->post('director') != 'other'){
				$this->form_validation->set_rules('director', 'réalisateur', 'trim|required|is_natural_no_zero');
			} else {
				$this->form_validation->set_rules('new_director', 'réalisateur', 'trim|required|min_length[5]|max_length[255]');
			}
			
		}


		if($this->form_validation->run() == FALSE){

			// Si le formulaire est invalide ou vide
			$this->layout->addCss('formulaire');
			$this->layout->addJS('formulaire');

			$this->layout->view('films/create', $data);

		} else {
			// Appel du model et ajout à la BDD
			//$id = $this->films_model->set_film();
			debug($_POST);

			// OK redirection vers la fiche du film
			//redirect('films/fiche/'.$id);
		}

	}
	
}