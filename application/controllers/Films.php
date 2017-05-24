<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller des films
*/
class Films extends CI_Controller
{

	
	public function __construct(){
		// gére les autoload
		parent::__construct();

		// appel du model
		$this->load->model('films_model');
		$this->load->model('covers_model');
		$this->load->model('directors_model');
		$this->load->model('personnages_model');

		// CSS du template
		$this->layout->addCss('layout');
	}



	public function index($phase = null, $page = 1)
	{
		if($phase == null){

			$films = $this->films_model->get_films_paginate($page);

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


	public function view($id){

		// Appel à la base de données pour récupérer le film
		$data['film'] = $this->films_model->get_film_by_id($id);

		// Appel à la base de données pour récupérer les personnages
		$data['personnages'] = $this->personnages_model->get_personnages($id);

		// Appel à la base de données pour le réalisateur
		$data['director'] = $this->directors_model->get_director($data['film']->director_id);

		// Les affiches du film
		$data['covers'] = $this->covers_model->get_covers($id);
		
		//debug($data);

		// On rend la vue
		$this->layout->setTitre('Film - '.$data['film']->title);
		$this->layout->addCss('films');
		$this->layout->addJS('films');
		$this->layout->view('films/view', $data);

	}
	
}