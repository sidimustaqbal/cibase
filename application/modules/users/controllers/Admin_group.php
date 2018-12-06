<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_group extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('users');
	}
	
	/**
	 * Redirect if needed, otherwise display the group list
	 */
	public function index()
	{
		// -------------------------------------
		// Pagination
		// -------------------------------------
		$this->_filters();
		$pagination_config['base_url'] = base_url(). 'users/admin/group/index';
		$pagination_config['uri_segment'] = 5;
		$pagination_config['reuse_query_string'] = true;
		$pagination_config['total_rows'] = count($this->ion_auth->groups()->result());
		$pagination_config['per_page'] = 25;
		$this->pagination->initialize($pagination_config);
		$data['pagination_config'] = $pagination_config;
		
        // -------------------------------------
		// Get entries
		// -------------------------------------
		$this->_filters();
		$offset = ($this->uri->segment($pagination_config['uri_segment'])) ? $this->uri->segment($pagination_config['uri_segment']) : 0;
		$this->ion_auth->limit($pagination_config['per_page']);
		$this->ion_auth->offset($offset);
		$data['groups']['entries'] = $this->ion_auth->groups()->result();
		
		$data['groups']['total'] = $pagination_config['total_rows'];
		$data['groups']['pagination'] = $this->pagination->create_links();

		// $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $data);
		$this->template->title('Groups | Groups List')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Groups','')
		->build('admin/group_index', $data);
	}	

	public function view($id=0)
	{
		$data = array();

		// get group data
		$data['field'] = $this->ion_auth->group($id)->row();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'Group not found');
			redirect('users/admin/group/index');
		}
		
		$this->template->title('Users | View Group')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','users/admin/group/index')
		->set_breadcrumb('View Group')
		->build('admin/group_entry', $data);
	}

	public function create()
	{
		$data = array();

		if($_POST) {
			if($this->_update_group('new')) {
				redirect('users/admin/group/index');
			} else {
				$data['messages']['error'] = $this->ion_auth->errors();
			}
		}

		$data['mode'] = 'new';
		$data['return'] = 'users/admin/group/index';

		$this->template->title('Groups | Create Group')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Groups','users/admin/group/index')
		->set_breadcrumb('Create Group')
		->build('admin/group_form', $data);
	}

	public function edit($id='')
	{
		$data = array();

		if($_POST) {
			if($this->_update_group('edit', $id)) {
				redirect('users/admin/group/index');
			} else {
				$data['messages']['error'] = $this->ion_auth->errors();
			}
		}

		// get group data
		$data['field'] = $this->ion_auth->group($id)->row();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'Group not found');
			redirect('users/admin/group/index');
		}

		$data['mode'] = 'edit';
		$data['return'] = 'users/admin/group/index';

		$this->template->title('Groups | Edit Group')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Groups','users/admin/group/index')
		->set_breadcrumb('Edit Group')
		->build('admin/group_form', $data);
	}

	public function delete($id=0)
	{
		// get group data
		$data['field'] = $this->ion_auth->group($id)->result();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'Group not found');
			redirect('users/admin/group/index');
		}
		
		// check to see if we are deleting the group
		if ($this->ion_auth->delete_group($id))
		{
			// redirect them back to the admin page if admin, or to the base url if non admin
			$this->session->set_flashdata('error', $this->ion_auth->messages());
		}
		else
		{
			// redirect them back to the admin page if admin, or to the base url if non admin
			$this->session->set_flashdata('error', $this->ion_auth->errors());
		}
		redirect('users/admin/group/index');
	}

	function _update_group($mode, $row_id='')
	{
		$result = false;

		$tables = $this->config->item('tables', 'ion_auth');
		$this->form_validation->set_rules('name', lang('users:group:name'), 'trim|required');
		$this->form_validation->set_rules('description', lang('users:group:description'), 'trim|required');

		if($this->form_validation->run() === TRUE) {
			$group_name = $this->input->post('name');
			$group_description = $this->input->post('description');
			if($mode=='new') {
				if($this->ion_auth_model->create_group($group_name, $group_description)) {
					$this->session->set_flashdata('success', $this->ion_auth->messages());
					
					$result = TRUE;
				}
			} elseif($mode=='edit') {
				$group_update = $this->ion_auth->update_group($row_id, $group_name, $group_description);

				if ($group_update)
				{
					$this->session->set_flashdata('success', $this->lang->line('edit_group_saved'));
					$result = TRUE;
				}
			}

		}
		return $result;
	}

	function _filters()
	{
		if($this->input->get('description')) {
			$this->ion_auth->like('description',$this->input->get('description'));
		}
	}
}