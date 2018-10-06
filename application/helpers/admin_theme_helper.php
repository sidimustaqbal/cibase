<?php defined('BASEPATH') OR exit('No direct script access allowed');

function is_active_menu($menu, $active_section)
{
	$CI = get_instance();
	
	if(is_array($menu)){
		$retval = FALSE;
		foreach($menu as $value){
			if(is_active_menu($value, $active_section)){
				return TRUE;
			}
		}
	}else{
		$value_short = $menu;
		$check_params = strpos($value_short, '%');
		if($check_params) {
			$clean_uri = substr($value_short, 0, $check_params);
			$value_short = $clean_uri;
		}

		if($active_section == strtolower($menu) OR strpos($CI->uri->uri_string(), $value_short) === 0
			OR strpos($CI->uri->uri_string(), $menu) === 0){
			return TRUE;
		}
	}
}