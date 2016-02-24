<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deals extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('deal_model');
	}
	/**
	 * 
	 * postind the user deal..
	 */
	public function post_deal(){
		if($this->session->userdata('id_user')!="")
		echo json_encode($this->deal_model->save_deal());
	
	}
	/**
	 * posting the user comments
	 */
	public function post_comment()
	{
		if($this->session->userdata('id_user')!="")
			echo $this->deal_model->post_comment();
		
		 
		
	}
	public function love()
	{
		$deal_id=makeSafe($this->input->post('did'));
		if($this->session->userdata('id_user')!="")
			$retData= $this->deal_model->love($deal_id);
			else
			{
				 $retData = array(
				   'DEAL_ID' => $deal_id ,
				   'STAT' => false,
				   'MSG' => 'Login to avail this faility'
				);
			}
			echo json_encode($retData);
	}
	public function hate()
	{
		$deal_id=makeSafe($this->input->post('did'));
		if($this->session->userdata('id_user')!="")
			$retData= $this->deal_model->hate($deal_id);
			else
			{
				 $retData = array(
				   'DEAL_ID' => $deal_id ,
				   'STAT' => false,
				   'MSG' => 'Login to avail this faility'
				);
			}
			echo json_encode($retData);
	}

}
