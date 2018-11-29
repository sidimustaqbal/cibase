<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generate_element($type, $slug, $title, $value, $options='')
{
	$element = '';
	if($type=='text') {
		$element = '<input type="text" class="form-control" id="" placeholder="'.$title.'" name="'.$slug.'" value="'.$value.'">';
	}elseif($type=='select' or $type=='select-multiple') {
		$element = '<select class="form-control" name="'.$slug.'">';
		if($options!='') {
			$options = explode("|", $options);
			foreach ($options as $option_choice) {
				$option = explode("=", $option_choice);
				$selected = '';
				if($value==$option[0]) {
					$selected = 'selected="selected"';
				}
				$element .= '<option '.$selected.' value="'.$option[0].'">'.$option[1].'</option>';
			}
		}
		$element .= '</select>';
	}
	return $element;
}

function get_settings($slug)
{
	ci()->load->model('settings/settings_m');

	$settings = ci()->settings_m->get_settings_by_slug($slug);

	if($settings) {
		return $settings['value'];
	}

	return false;
}