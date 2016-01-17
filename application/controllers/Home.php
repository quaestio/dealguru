<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		$data['msg']="this is msg";
		$data['deals']=$this->login_model->select_deals();
		$this->load->view('home',$data);
		//
	}

	
}
