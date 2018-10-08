<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_settings extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('settings_m');
		$this->load->helper('slug');
		$this->load->helper('settings');
		$this->lang->load('settings');
	}
	
	/**
	 * Redirect if needed, otherwise display the settings list
	 */
	public function index()
	{
		if($_POST) {
			if($this->_update_settings('edit')) {
				$this->session->set_flashdata('success', lang('settings:settings:edit_success'));
				redirect('settings/admin/settings/index');
			} else {
				$data['messages']['error'] = lang('settings:settings:edit_failed');
			}
		}

		// -------------------------------------
		// Pagination
		// -------------------------------------
		$this->_filters();
		
        // -------------------------------------
		// Get entries
		// -------------------------------------
		$data['settings']['entries'] = $this->settings_m->get_settings();
		
		$data['return'] = 'settings/admin/settings/index';

		$this->template->title('Settings | Settings List')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Settings','')
		->build('admin/settings_index', $data);
	}

	public function create()
	{
		$data = array();

		if($_POST) {
			if($this->_update_settings('new')) {
				$this->session->set_flashdata('success', lang('settings:settings:create_success'));
				redirect('settings/admin/settings/index');
			} else {
				$data['messages']['error'] = lang('settings:settings:create_failed');
			}
		}

		$data['mode'] = 'new';
		$data['return'] = 'settings/admin/settings/index';

		$this->template->title('Settings | '.lang('settings:settings:create'))
		->set_breadcrumb('Home','admin')
		->set_breadcrumb(lang('settings:settings:plural'),'settings/admin/settings/index')
		->set_breadcrumb(lang('settings:settings:create'))
		->build('admin/settings_form', $data);
	}

	function _update_settings($mode)
	{
		if($mode=='new') {
			$this->form_validation->set_rules('title', lang('settings:title'), 'trim|required|max_length[100]');
			$this->form_validation->set_rules('slug', lang('settings:slug'), 'max_length[100]|is_unique[settings.slug]');
			$this->form_validation->set_rules('description', lang('settings:description'), 'max_length[255]');
			$this->form_validation->set_rules('type', lang('settings:type'), 'required|in_list[text,textarea,password,select,select-multiple,radio,checkbox]');
			$this->form_validation->set_rules('default', lang('settings:default'), 'required|max_length[1000]');
			$this->form_validation->set_rules('value', lang('settings:value'), 'max_length[1000]');
			if(in_array($this->input->post('type'), array('select','select-multiple','radio','checkbox'))) {
				$this->form_validation->set_rules('options', lang('settings:options'), 'trim|required|max_length[255]');
			}
			$this->form_validation->set_rules('is_required', lang('settings:is_required'), 'required|numeric');
			$this->form_validation->set_rules('group', lang('settings:group'), 'trim|required|max_length[50]');
		} else {
			foreach ($this->input->post() as $slug => $value) {
				// get rules
				$setting = $this->settings_m->get_settings_by_slug($slug);
				if($setting['is_required']==1) {
					$this->form_validation->set_rules($slug, $setting['title'], 'required');
				}
			}
		}

		$result = false;
		
		if($this->form_validation->run()) {
			if($mode=='new') {
				$values = $this->input->post();
				$values['slug'] = create_unique_slug($values['title'],'settings','slug',null,null,30);

				if($values['is_required']=='1' AND $values['value']=='') {
					$value['value'] = $values['default'];
				}

				$result = $this->settings_m->insert($values);
			} else {
				foreach ($this->input->post() as $slug => $value) {
					// update settings
					$values['value'] = $this->input->post($slug);
					$result = $this->settings_m->update($values, $slug);
				}
			}

		}

		return $result;
	}

	function _filters()
	{
		# code...
	}
}