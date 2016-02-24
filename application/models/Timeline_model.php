<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline_model extends CI_Model {
	/**
	 * 
	 * this is open and no userchecks related function will be called
	 */
public function deal_categories()
	{
	$query="select * from deal_categories order by CATEGORY_NAME";
		return $this->db->query($query)->result_array();
		
	}
public function countries()
	{
	$query="select * from countries where is_active='Y' order by countries_name";
		return $this->db->query($query)->result_array();
		
	}

function zones($country_id){
		$sql="select city_id ,city_name from cities C,states S, countries Y where C.state_id=S.state_id and S.country_id=Y.country_id and Y.country_id=".$country_id." order by city_name";
		return $query = $this->db->query($sql)->result_array();
	}
public function deals($offset=0,$limit=20)
	{
		$array_index=0;
		$display = array();
		$order="ROW_CREATE_DATE";
		
		$sql = "SELECT DEAL_ID, DEAL_TITLE,DEAL_SUMMARY,CATEGORY_ID, DEAL_END_DATE, DEAL_START_DATE, ROW_CREATE_DATE,LONGITUDE, LATITUDE, PRICE,FULL_NAME ,user_details.USER_ID,user_details.MIME
		FROM deal_details,user_details where deal_details.USER_ID=user_details.USER_ID order by ".$order." desc LIMIT ".$offset.",".$limit."";
		
		$query = $this->db->query($sql);
     	foreach ($query->result() as $row)
				{
					$imgs="";
					$dPath="";
					
					$display[$array_index]['user_id']= $row->USER_ID;
					$display[$array_index]['deal_id']= $deal_id=$row->DEAL_ID;
					$display[$array_index]['deal_title']= $row->DEAL_TITLE;
					$display[$array_index]['deal_summery']= $row->DEAL_SUMMARY;
					$display[$array_index]['deal_end']= $row->DEAL_END_DATE;
					$display[$array_index]['deal_start']= $row->DEAL_START_DATE;
					$display[$array_index]['date_created']= $row->ROW_CREATE_DATE;
					$display[$array_index]['long']= $row->LONGITUDE;
					$display[$array_index]['lat']= $row->LATITUDE;
					$display[$array_index]['full_name']= $row->FULL_NAME;
					
					if(file_exists(FCPATH."user_imgs/".$row->USER_ID.$row->MIME))
					   $path=base_url()."user_imgs/".$row->USER_ID.$row->MIME;
					else
						$path=base_url()."img/user.png";
						
					$display[$array_index]['user_image']=$path;
					$sqlImages="SELECT  * from deal_images where DEAL_ID=".$deal_id;
					$display[$array_index]['images']= $this->db->query($sqlImages)->result_array();
					$sqlCat="SELECT  * from deal_categories where CATEGORY_ID=".$row->CATEGORY_ID;
					$display[$array_index]['category']=$this->db->query($sqlCat)->row_array();
					$comments=array();
					$sqlComments="SELECT  C.COMMENT_ID,C.COMMENT,C.DATE_TIME,U.FULL_NAME,C.USER_ID,U.MIME from deal_comments C,user_details U where C.USER_ID=U.USER_ID and C.DEAL_ID=".$deal_id;
					$queryCmt = $this->db->query($sqlComments);
					$cmt_index=0;
		     		foreach ($queryCmt->result() as $rowCmt)
						{
							
							$Dpath=base_url()."img/user.png";
							$comments[$cmt_index]['COMMENT_ID']= $rowCmt->COMMENT_ID;
							$comments[$cmt_index]['COMMENT']= $rowCmt->COMMENT;
							$comments[$cmt_index]['DATE_TIME']= $rowCmt->DATE_TIME;
							$comments[$cmt_index]['FULL_NAME']= $rowCmt->FULL_NAME;
							if(file_exists(FCPATH."user_imgs/".$rowCmt->USER_ID.$rowCmt->MIME))
							  $Dpath=base_url()."user_imgs/".$rowCmt->USER_ID.$rowCmt->MIME;
							$comments[$cmt_index]['C_IMG']=$Dpath;
							
							 $cmt_index=$cmt_index+1;
						}//comment
					$display[$array_index]['deal_comments']=$comments;
				   //like dislike
				   	$sql="select * from like_dislike where DEAL_ID=".$deal_id	;
					  $query=$this->db->query($sql);
					  if($query->num_rows()>0)
					  {
						  	$row=$query->row();
						  	$love_array = explode(",", $row->LIKE_USER_IDS);
						  	
						  	$display[$array_index]['love_arr']=$row->LIKE_USER_IDS;
						  	$display[$array_index]['hate_arr']=$row->DISLIKE_USER_IDS;
					  }
					  else 
					  {
						  $display[$array_index]['love_arr']='';
						  $display[$array_index]['hate_arr']='';
					  
					  }
				   //end like dislike
				   $array_index=$array_index+1;
				   
				}
		
			
		return $display;
	}
	

	
	
	
	
	
}
