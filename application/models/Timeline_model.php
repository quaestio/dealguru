<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline_model extends CI_Model {
public function deal_categories()
	{
	$query="select * from deal_categories order by CATEGORY_NAME";
		return $this->db->query($query)->result_array();
		
	}
public function deals()
	{
		$array_index=0;
		$display = array();
		$sql = "SELECT DEAL_ID, DEAL_SUMMARY,CATEGORY_ID, DEAL_END_DATE, DEAL_START_DATE, ROW_CREATE_DATE,LONGITUDE, LATITUDE, PRICE,FULL_NAME 
		FROM deal_details,user_details where deal_details.USER_ID=user_details.USER_ID order by ROW_CREATE_DATE desc LIMIT 0,20";
		$query = $this->db->query($sql);
     	foreach ($query->result() as $row)
				{
					$imgs="";
					$dPath="";
					
					$display[$array_index]['deal_id']= $deal_id=$row->DEAL_ID;
					$display[$array_index]['deal_summery']= $row->DEAL_SUMMARY;
					$display[$array_index]['deal_end']= $row->DEAL_END_DATE;
					$display[$array_index]['deal_start']= $row->DEAL_START_DATE;
					$display[$array_index]['date_created']= $row->ROW_CREATE_DATE;
					$display[$array_index]['long']= $row->LONGITUDE;
					$display[$array_index]['lat']= $row->LATITUDE;
					$display[$array_index]['full_name']= $row->FULL_NAME;
					$sqlImages="SELECT  * from deal_images where DEAL_ID=".$deal_id;
					$display[$array_index]['images']= $this->db->query($sqlImages)->result_array();
					$sqlCat="SELECT  * from deal_categories where CATEGORY_ID=".$row->CATEGORY_ID;
					$display[$array_index]['category']=$this->db->query($sqlCat)->row_array();
				    
				   $array_index=$array_index+1;
				}
		
		
		return $display;
	}
	public function save_add(){
		//saving deal details
			$data = array(
			   'DEAL_START_DATE' => makeSafe($this->input->post('start')) ,
			   'DEAL_END_DATE' => makeSafe($this->input->post('finish')),
			   'DEAL_TITLE' => makeSafe($this->input->post('deal_title')),
			   'DEAL_SUMMARY' => clickable_link($this->input->post('info')),
			   'CATEGORY_ID' => makeSafe($this->input->post('category')),
			   'PRICE' => makeSafe($this->input->post('price')),
			   'USER_ID' => $this->session->userdata('id_user'),
			   'LONGITUDE' => '',
			   'LATITUDE' => ''
			);
					
			$this->db->insert('deal_details', $data); 
			$max_deal_id=$this->db->insert_id() ;
		
		$temp_file_name=temp_image_id();
		if($_FILES["userfile"]["error"] != 0) 
			{
				
				$config['upload_path'] = './adds_images/actual';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['overwrite'] = TRUE;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['max_width']  = '1000';
				$config['max_height']  = '1000';
				$config['file_name']  = $temp_file_name;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$dataRet['error']= $this->upload->display_errors();
				}
				else 		
				{
					$uploaded_data=$this->upload->data();
					$dataRet['stat']= '1';
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
					$config['source_image'] = "./adds_images/actual/".$temp_file_name.$mime;
					$config['new_image'] = "./adds_images/thumb/".$temp_file_name.$mime;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 100;
					$config['height'] = 100;
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
    				$this->image_lib->initialize($config);
					$this->image_lib->resize();	
					
				
				}
			
			}		
					
				$dataRet['deal_details']=$data;
				
				return  $dataRet;
	}//save adds
	
	public function get_last_deal_id()
	{
	$query="select max(DEAL_ID) as max_deal_id from deal_details";
		$query = $this->db->query($query);
         if ( $query->num_rows() > 0 )
            {
                $row= $query->row();
				return  $row->max_deal_id+1;
            }
            else 
            return 1;
	
	}
	public function get_max_image_id()
	{
	$query="select max(IMG_ID) as max_image_id from deal_images";
		$query = $this->db->query($query);
         if ( $query->num_rows() > 0 )
            {
                $row= $query->row();
				return  $row->max_image_id+1;
            }
            else 
            return 1;
	
	}
	
	
}