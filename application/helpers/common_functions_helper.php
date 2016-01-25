<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('makeSafe'))
{
function makeSafe($string){
		$string=str_replace("'","",$string);
		$string=str_replace("\\","",$string);
		$string=str_replace("//","",$string);
		//$string=str_replace("-","",$string);
		$string=str_replace(")","",$string);
		$string=str_replace("(","",$string);
		$string=str_replace("0x27","",$string);
		$string=str_replace("0x7e","",$string);
		$string=str_replace("information_schema","",$string);
		
		
		$string=(get_magic_quotes_gpc() ? stripslashes($string) : $string);
		
			
			return ($string);
		
	}
}
function temp_image_id()
{
	$day = date('d', time());
	$month = date('m', time());
	$year = date('Y', time());
	$hour = date('H', time());
	$min = date('i', time());
	$sec = date('s', time());
	return $year.$month.$day.$hour.$min.$sec.rand(99,9999);
	
	
}
function clickable_link($text = '')
	{
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		return $ret;
	}
	function post_time($time)
	{
	$days = floor($time / (60 * 60 * 24));
			$remainder = $time % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			
			if($days > 0)
			echo date('F d Y', $time);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
			else
			echo "few seconds ago";	
	}


?>