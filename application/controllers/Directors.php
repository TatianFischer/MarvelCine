<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller des réalisateurs
 */
class Directors extends CI_Controller
{
	
	function __construct()
	{
		// Gère les autoload
		parent::__construct();

		// Appelle des models
		$this->load->model('directors_model');
		$this->load->model('films_model');

		// CSS du template
		$this->layout->addCss('layout');
		$this->layout->addCss('personnages');
	}

	public function index()
	{
		$data['directors'] = $this->directors_model->get_all_directors();

		foreach ($data['directors'] as $director) {
			$director->films = $this->films_model->get_films_by_director($director->id);
		}

		$this->layout->view('directors/index', $data);
	}
}