<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('timeline_model');
	}
	public function index()
	{
		$data['msg']="this is msg";
		$data['deal_categories']=$this->timeline_model->deal_categories();
		$data['deals']=$this->timeline_model->deals();
		$this->load->view('home',$data);
		
	}
	

	
}
