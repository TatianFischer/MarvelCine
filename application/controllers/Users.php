<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller de login
*/
class Users extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		// CSS du template
		$this->layout->addCss('layout');

		// Appel des models
		$this->load->model('users_model');

		// Chargement du helper de formulaire
		$this->load->helper('form');
		// Chargement de la librairie de validation
		$this->load->library('form_validation');
	}

	public function register()
	{
		if($_POST){
			$this->form_validation->set_rules('firstname', 'prénom', 'trim|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('lastname', 'nom', 'trim|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('pseudo', 'pseudo', 'trim|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
			$this->form_validation->set_rules('sexe', 'sexe', 'trim');

			$this->form_validation->set_rules('password', 'mot de passe', 'trim|required|min_length[2]|max_length[50]');
			$this->form_validation->set_rules('confirm_password', 'Confirmation', 'trim|required|matches[password]');
		} 

		if($this->form_validation->run() == FALSE){

			// Si le formulaire est invalide
			$this->layout->addCss('formulaire');
			$this->layout->addJs('formulaire');

			$this->layout->view('users/register');

		} else {

			$id = $this->users_model->register_user();

			if($id){
				$this->session->set_flashdata('success_msg', 'Enregistrement réussi. Maintenant connectez-vous à votre compte');
				redirect('users/profil/'.$id);	
			} else{
				$this->session->set_flashdata('error_msg', 'Erreur d\'enregistrement');
			}

		}
	}


	public function profil($id)
	{
		$data['user'] = $this->users_model->get_user_by_id($id);

		$data['user']->password = "";

		$this->layout->view('users/profil', $data);
	}

	public function login()
	{
		if($_POST){
			$this->form_validation->set_rules('login', 'login', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('password', 'mot de passe', 'trim|required');
		}

		if($this->form_validation->run() == FALSE){
			// Si le formulaire est invalide
			$this->layout->addCss('formulaire');
			$this->layout->addJs('formulaire');

			$this->layout->view('users/login');

		} else {
			
			$data = $this->users_model->login_user();

			if($data){

				$this->session->set_userdata('user_id',$data['id']);
	        	$this->session->set_userdata('user_email',$data['email']);
	        	$this->session->set_userdata('user_pseudo', $data['pseudo']);
	        	$this->session->set_userdata('user_firstname',$data['firstname']);
	        	$this->session->set_userdata('user_lastname',$data['lastname']);
	        	$this->session->set_userdata('user_role',$data['role']);

				redirect('users/profil/'.$data['id']);

			} else {

				$this->session->set_flashdata('error_msg', 'Erreur de connexion. Essayez encore.');
				$this->layout->addCss('formulaire');
				$this->layout->addJs('formulaire');

				$this->layout->view('users/login');

			}

		}
	}


	public function logout(){
 		$this->session->set_flashdata('success_msg', 'Vous êtes bien déconnecté.');
		$this->session->sess_destroy();
		redirect('users/login', 'refresh');
	}
}