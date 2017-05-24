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

		// CSS du template
		$this->layout->addCss('layout');
	}



	public function index($phase = null)
	{
		if($phase == null){

			$data['films'] = $this->films_model->get_films();

		} else {

			$data['films'] = $this->films_model->get_films_by_phase($phase);

		}

		//debug($data);

		// On rend la vue
		$this->layout->addCss('films');
	    $this->layout->view('films/index', $data);
	}


	public function view($id){

		// Appel à la base de données pour récupérer le film
		$data['film'] = $this->films_model->get_film_by_id($id);

		// Appel à la base de données pour récupérer les personnages
		$data['personnages'] = $this->films_model->get_personnages($id);

		// Appel à la base de données pour le réalisateur
		$data['director'] = $this->films_model->get_director($data['film']->director_id);

		// Les affiches du film
		$data['covers'] = $this->films_model->get_covers($id);
		
		//debug($data);

		// On rend la vue
		$this->layout->setTitre('Film - '.$data['film']->title);
		$this->layout->addCss('films');
		$this->layout->addJS('films');
		$this->layout->view('films/view', $data);

	}
	
}