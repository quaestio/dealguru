<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deal_model extends CI_Model {
	
public function save_deal(){
		//saving deal details
			$data = array(
			   'DEAL_START_DATE' => makeSafe($this->input->post('start')) ,
			   'DEAL_END_DATE' => makeSafe($this->input->post('finish')),
			   'DEAL_TITLE' => makeSafe($this->input->post('deal_title')),
			   'DEAL_SUMMARY' => clickable_link($this->input->post('info')),
			   'COUNTRY_ID' => makeSafe($this->input->post('deal_country')),
			   'ZONE_ID' => makeSafe($this->input->post('deal_zones')),
			   'CATEGORY_ID' => makeSafe($this->input->post('category')),
			   'PRICE' => makeSafe($this->input->post('price')),
			   'USER_ID' => $this->session->userdata('id_user'),
			   'LONGITUDE' => '',
			   'LATITUDE' => ''
			);
					
			$this->db->insert('deal_details', $data); 
			$max_deal_id=$this->db->insert_id() ;
			
			$temp_file_name=temp_image_id();
	
			$config['upload_path'] = './adds_images/actual';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000';
			$config['overwrite'] = TRUE;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			
			$config['file_name']  = $temp_file_name;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$dataRet['img_error']= $this->upload->display_errors();
				$dataRet['ImageUploaded']= false;
				$dataRet['ImageDetails']= '';
			}
			else 		
			{
				$uploaded_data=$this->upload->data();
				$dataRet['ImageUploaded']= true;
				$mime=$uploaded_data['file_ext'];
				$data_image = array(
						   'DEAL_ID' => $max_deal_id ,
						   'MIME' => $mime 
						);
				
				$this->db->insert('deal_images', $data_image); 
				$max_image_id=$this->db->insert_id() ;
				$dataRet['image_id']=$max_image_id;
				$dataRet['image_mime']=$mime;
				rename("./adds_images/actual/".$temp_file_name.$mime,"./adds_images/actual/".$max_image_id.$mime);
				//creating the thumbnail
				$config['image_library'] = 'gd2';
			 	$config['source_image'] = "./adds_images/actual/".$max_image_id.$mime;
				$config['new_image'] = "./adds_images/thumb/".$max_image_id.$mime;
				//$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 350;
				$config['height'] = 350;
				$this->load->library('image_lib');
				$this->image_lib->clear();
    			$this->image_lib->initialize($config);
				$this->image_lib->resize();	
				
				//watermark
				$this->image_lib->clear();
				$configW['source_image'] = "./adds_images/actual/".$max_image_id.$mime;
				$configW['new_image'] = "./adds_images/actual/".$max_image_id.$mime;
				$configW['wm_text'] = 'DealGuru - Soumen Das';
				$configW['wm_type'] = 'text';
				$configW['wm_font_path'] = './system/fonts/texb.ttf';
				$configW['wm_font_size'] = '16';
				$configW['wm_font_color'] = 'ffffff';
				$configW['wm_vrt_alignment'] = 'center';
				$configW['wm_hor_alignment'] = 'center';
				$configW['wm_padding'] = '20';
				
				$this->image_lib->initialize($configW);
				
				$this->image_lib->watermark();
				//end watermark 
				
				
			}
				
				$dataRet['stat']=true;
				$dataRet['full_name']=$this->session->userdata('full_name');
				$dataRet['user_image_url']=$this->session->userdata('user_image_url');
				$dataRet['stat']=true;
				$dataRet['deal_details']=$data;
				
				return  $dataRet;
	}//save deal	
public function post_comment()
	{
		$data = array(
			   'DEAL_ID' => makeSafe($this->input->post('did')) ,
			   'USER_ID' => $this->session->userdata('id_user'),
			   'COMMENT' => makeSafe($this->input->post('cmt')),
			   'IP' => $this->input->ip_address()
			);
					
		$this->db->insert('deal_comments', $data);
		
		$dataR['comment_id']=$this->db->insert_id();
		$dataR['comment']= makeSafe($this->input->post('cmt'));
		$dataR['user_image']= $this->session->userdata('user_image_url');
		$dataR['full_name']= $this->session->userdata('full_name');
		$dataR['time']="Just Now";
		return json_encode($dataR);
	
	}
public function love($deal_id)
	{
		$deal_id=$this->input->post('did');
		$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => false,
			   'MSG' => ''
			);
		$sql="select * from like_dislike where DEAL_ID=".$deal_id	;
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		  {
		  	$row=$query->row();
		  	$LIKE_USER_IDS=$row->LIKE_USER_IDS;
		  	if(trim($LIKE_USER_IDS))
		  	  $LIKE_USER_IDS=$this->session->userdata('id_user');
		  	else   
		  	$LIKE_USER_IDS=$LIKE_USER_IDS.','.$this->session->userdata('id_user');
		    
		  	$sql="update like_dislike set LIKE_USER_IDS='".$LIKE_USER_IDS."' where DEAL_ID=".$deal_id	;
		   	$query=$this->db->query($sql);
		   	$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => true,
			   'MSG' => 'Thank you'
			);
		  }
		  else 
		  {
		  	$sql="insert into like_dislike(DEAL_ID,LIKE_USER_IDS) values(".$deal_id.",".$this->session->userdata('id_user').")";
		   	$query=$this->db->query($sql);
		   		$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => true,
			   'MSG' => 'Thank you'
			);
		  }
		 return $retData;

	}
public function hate($deal_id)
	{
		
		
		
		$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => false,
			   'MSG' => ''
			);
	  	$sql="select * from like_dislike where DEAL_ID=".$deal_id	;
	  	$query=$this->db->query($sql);
	  	if($query->num_rows()>0)
		  {
		  	$row=$query->row();
		  	$DISLIKE_USER_IDS=$row->DISLIKE_USER_IDS;
		  	if(trim($DISLIKE_USER_IDS))
		  	  $DISLIKE_USER_IDS=$this->session->userdata('id_user');
		  	else   
		  	$DISLIKE_USER_IDS=$DISLIKE_USER_IDS.','.$this->session->userdata('id_user');
		    $sql="update like_dislike set DISLIKE_USER_IDS='".$LIKE_USER_IDS."' where DEAL_ID=".$deal_id	;
		   	$query=$this->db->query($sql);
		   	$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => true,
			   'MSG' => 'Thank you'
			);
		  }
		  else 
		  {
		 	$sql="insert into like_dislike(DEAL_ID,$DISLIKE_USER_IDS) values(".$deal_id.",".$this->session->userdata('id_user').")";
		   	$query=$this->db->query($sql);
		   	$retData = array(
			   'DEAL_ID' => $deal_id ,
			   'STAT' => true,
			   'MSG' => 'Thank you'
			);
		  }
		  
			
			return $retData;
			
		}

}