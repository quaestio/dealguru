<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
      	$this->load->model("user_model");
      	 $this->load->helper('captcha');
    }
    
public function register()
	{
		$vals = array(
		        'word'          => '',
		        'img_path'      => './captcha/',
		        'img_url'       => 'http://example.com/captcha/',
		        'font_path'     => FCPATH.'/system/fonts/texb.ttf',
		        'img_width'     => '190',
		        'img_height'    => 60,
		        'expiration'    => 7200,
		        'word_length'   => 4,
		        'font_size'     => 30,
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		
		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 255),
		                'grid' => array(255, 40, 40)
		        )
				);
	
		$data['country_list'] = $this->Common_model-> country_list(); 
		$data['error']="";
		if($this->input->post('reg_submit')=="")
		{
			 
			$data['captcha_img'] = create_captcha($vals); 
		 	$_SESSION['captchaWord'] = $data['captcha_img']['word'];
		 	
		}
		else 
		{
			$form_data=array(
			  	'FULL_NAME'       => $this->input->post('full_name'),
			  	'COUNTRY_ID'        => $this->input->post('country'),
			   	'ZONE_ID'   => $this->input->post('city'),
			  	'BIRTHDAY'   => $this->input->post('birthdate'),
			  	'MARITAL_STATUS'          => $this->input->post('mstat'),
			  	'GENDER'          => $this->input->post('sex'),
			  	'ADDRESS'          => $this->input->post('address'),
			  	'ZIP'          => $this->input->post('zip'),
			  	'EMAIL_ID'          => $this->input->post('email'),
			  	'MOBILE'          => $this->input->post('mobile'),
			  	'LOG_PASS'          => $this->input->post('pass'),
			  	'DATE_CREATED'          => date('Y-m-d h:i:s'),
			  	'ACT_CODE'          => $this->Common_model->get_code()
			
			  	);
			  	
			  	
			if (strcasecmp($_SESSION['captchaWord'], $this->input->post('captcha')) == 0) {
			  
				  
					$msg=$this->user_model->register($form_data);
					if($msg['error']=="")
					{
						
					redirect(base_url().'user/success/'.md5($msg['user_id']));
					}
					else 
					{
					$data['captcha_img']  = create_captcha($vals); 
					$data['msg']="<div class='alert alert-danger alert-dismissable fade in' roll='alert'><button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span></button>".$msg['error']."</div>";
			 		$_SESSION['captchaWord'] = $data['captcha_img']['word'];
					}			
			    }
			  else 
			  {
			  				 	
					$data['captcha_img'] = create_captcha($vals); 
					$data['form_data']=$form_data;
				 	$_SESSION['captchaWord'] = $data['captcha_img']['word'];
				 	$data['msg']="<div class='alert alert-danger alert-dismissable fade in' roll='alert'><button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span></button>Invalid Captcha</div>";
				 	
			  }
		
		}
		$this->load->view('register',$data);
		
		
	}
	public function success($user){
		$data['user_details']=$this->user_model->user_details($user);
		$data['user']=$user;
		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'quaestioindia@gmail.com';
        $config['smtp_pass']    = 'India#2012';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
		
        $this->email->initialize($config);

        $this->email->from('quaestioindia@gmail.com', 'Activation');
       	$this->email->to($data['user_details']['EMAIL_ID']); 

        $this->email->subject('User Activation:DealGuru');
        $msg= $this->load->view('email_templates/activation_email',$data,true);
      	$this->email->message($msg);  

        $this->email->send();

         $data['debud']= $this->email->print_debugger();

		$this->load->view('success',$data);
	}
    
	public function activate()
	{		
		echo $this->user_model->activate();
		
	}
	public function get_zones($country_id)
	{
		
		echo json_encode($this->Common_model->zones($country_id));
		
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
