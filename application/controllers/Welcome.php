<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct(){
		// gére les autoload
		parent::__construct();

		$this->load->model('films_model');
		$this->load->model('covers_model');
	}

	public function index()
	{
		$this->load->library('layout');

		$this->layout->addCss('layout');
		$this->layout->addCss('home');

		$last_film = $this->films_model->get_last_film();
		$last_film->main_cover = $this->covers_model->get_random_cover($last_film->id);
		$data['last_film'] = $last_film;

		$next_film = $this->films_model->get_next_film();
		$next_film->main_cover = $this->covers_model->get_random_cover($next_film->id);
		$data['next_film'] = $next_film;

		$random_film = $this->films_model->get_random_film();
		$random_film->main_cover = $this->covers_model->get_random_cover($random_film->id);
		$data['random_film'] = $random_film;

	    $this->layout->view('home', $data);
	}
}
