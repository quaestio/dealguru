<?php
class Common_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	public function country_list()
	{
		$sql="select countries_id ,countries_name from countries order by countries_name";
		return $this->db->query($sql)->result_array();
	
	}
	
	function zones($country_id){
		$sql="select zone_id ,zone_country_id,zone_code,zone_name from zones where zone_country_id=".$country_id." order by zone_name";
		return $query = $this->db->query($sql)->result_array();
	}
function get_code($seed_length=8) {
    $seed = "ABCDEFGHJKLMNPQRSTUVWXYZ234567892345678923456789";
    $str = '';
    srand((double)microtime()*1000000);
    for ($i=0;$i<$seed_length;$i++) {
        $str .= substr ($seed, rand() % 48, 1);
    }
    return $str;
}
}//
?>