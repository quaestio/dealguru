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

public function load_posts(){
	
	echo '<li>
                                      <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> January 25 2016</span>
                                        <h3 class="timeline-header">
                                        	<div class="pull-left image">
                           				 		<img width="40px"  class="img-circle" alt="">
                        					</div>
                        					<a href="#">Soumen Das</a></h3>
	                                        <div class="timeline-body">
	                                            sdaf	                                        </div>
	                                                                                 <div class="timeline-footer">
                                        	<span class="tag_category"><i class="fa fa-tag"></i> <a href="http://localhost/quaestio/deal_guru/Electronics">Electronics</a></span>
                                           
                                        </div>
                                    </div>
                                </li>';
	
	}
}
