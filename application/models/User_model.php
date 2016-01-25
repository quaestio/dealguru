<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	

public function check_user($user_name,$user_pass)
	{
		$sql = "Select USER_ID, FULL_NAME, BIRTHDAY, MARITAL_STATUS, GENDER, ADDRESS, EMAIL_ID, LOG_PASS, MOBILE, MIME, DATE_FORMAT(DATE_CREATED,'%M-%Y') AS CD from user_details where EMAIL_ID='".$user_name."' and LOG_PASS='".$user_pass."'";
		$query = $this->db->query($sql);
         if ( $query->num_rows() > 0 )
            {
                $row= $query->row();
				
				
				$newdata = array(
			        'id_user'  	=> $row->USER_ID,
					'full_name' 	=> $row->FULL_NAME,
					'email' 	=> $row->EMAIL_ID,
					'mime' 	=> $row->MIME,
					'date_created' 	=> $row->CD,
				  	'LoggedIn' => TRUE
				
					);
					
					//print_r($newdata);
				
			$this->session->set_userdata($newdata);
			return true;
			}
		else
			return false;
	}
public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}
