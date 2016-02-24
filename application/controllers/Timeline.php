<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('timeline_model');
		$newdata = array(
                   'default_country'  => 'India',
                   'default_country_id'     => '101',
                   'order' => 'ROW_CREATE_DATE',
                   'default_zone' => 'Kolkata'
               );
			$this->session->set_userdata($newdata);
	
		
		
	}
	public function index()
	{
		$data['msg']="";
		
		$data['deal_categories']=$this->timeline_model->deal_categories();
		$data['deal_countries']=$this->timeline_model->countries();
		$data['deal_zones']=$this->timeline_model->zones($this->session->userdata('default_country_id'));
		$data['offset']=0;
		$data['limit']=10;
		
		$data['order']="ROW_CREATED_DATE";
		$data['deals']=$this->timeline_model->deals(0);
		
		$this->load->view('home',$data);
		
	}
	public function load_zones($country_id){
		
			echo json_encode($this->timeline_model->zones($country_id));
	}
	public function load_posts($offset,$limit=10){
			echo json_encode($this->timeline_model->deals($offset,$limit));
		
	}
public function love(){
		
			echo $this->timeline_model->love();
	}

	
}
