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
}