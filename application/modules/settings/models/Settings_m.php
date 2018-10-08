<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_m extends CI_Model {
	public function get_settings($pagination_config=null, $params=array())
	{
		$this->db->select('*');

		$result = $this->db->get('settings');

		return $result->result_array();
	}

	public function get_settings_by_slug($slug)
	{
		$this->db->select('*');

		$this->db->where('slug', $slug);

		$result = $this->db->get('settings');

		return $result->row_array();
	}

	public function insert($values)
	{
		return $this->db->insert('settings', $values);
	}

	public function update($values, $slug)
	{
		$this->db->where('slug',$slug);
		return $this->db->update('settings', $values);
	}
}