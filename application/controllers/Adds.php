<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adds extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('timeline_model');
	}
	public function post_add()
	{
		$data['msg']="this is msg";
		echo json_encode($this->timeline_model->save_add());
		 
		
	}

	
}
