<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
      	$this->load->model("user_model");
    }
	public function login()
	{
		$data['msg']="";
		
		$user_name=makeSafe($this->input->post('email'));
		$user_pass=makeSafe($this->input->post('pass'));
		if($this->user_model->check_user($user_name,$user_pass))
			echo  1;
		else 
			echo  0;
		
}
public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
