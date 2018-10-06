<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('users');
	}
	
	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
		// -------------------------------------
		// Pagination
		// -------------------------------------
		$this->_filters();
		$pagination_config['base_url'] = base_url(). 'users/admin/user/index';
		$pagination_config['uri_segment'] = 5;
		$pagination_config['reuse_query_string'] = true;
		$pagination_config['total_rows'] = count($this->ion_auth->users()->result());
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
		$data['users']['entries'] = $this->ion_auth->users()->result();
		foreach ($data['users']['entries'] as $k => $user)
		{
			$data['users']['entries'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		
		$data['users']['total'] = $pagination_config['total_rows'];
		$data['users']['pagination'] = $this->pagination->create_links();

		// $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $data);
		$this->template->title('Users | Users List')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','')
		->build('admin/user_index', $data);
	}

	public function view($id=0)
	{
		$data = array();

		// get user data
		$data['field'] = $this->ion_auth->user($id)->row();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'User not found');
			redirect('users/admin/user/index');
		}
		
		$data['field']->groups = $this->ion_auth->get_users_groups($data['field']->id)->result();

		$data['groups'] = $this->ion_auth->groups()->result_array();
		$data['currentGroups'] = $this->ion_auth->get_users_groups($id)->result();

		$this->template->title('Users | Profile User')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','users/admin/user/index')
		->set_breadcrumb('Profile User')
		->build('admin/user_entry', $data);
	}

	public function create()
	{
		$data = array();

		if($_POST) {
			if($this->_update_user('new')) {
				$this->session->set_flashdata('success', 'User created successfully');
				redirect('users/admin/user/index');
			} else {
				$data['messages']['error'] = 'Failed to create user';
			}
		}

		$data['mode'] = 'new';
		$data['csrf'] = $this->_get_csrf_nonce();

		$this->template->title('Users | Create User')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','users/admin/user/index')
		->set_breadcrumb('Create User')
		->build('admin/user_form', $data);
	}

	public function edit($id=0)
	{
		$data = array();

		if($_POST) {
			if($this->_update_user('edit', $id)) {
				$this->session->set_flashdata('success', 'User edited successfully');
				redirect('users/admin/user/index');
			} else {
				$data['messages']['error'] = 'Failed to edit user';
			}
		}

		// get user data
		$data['field'] = $this->ion_auth->user($id)->row();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'User not found');
			redirect('users/admin/user/index');
		}

		$data['field']->groups = $this->ion_auth->get_users_groups($data['field']->id)->result();
		
		$data['groups'] = $this->ion_auth->groups()->result_array();
		$data['currentGroups'] = $this->ion_auth->get_users_groups($id)->result();

		$data['mode'] = 'edit';
		$data['csrf'] = $this->_get_csrf_nonce();

		$this->template->title('Users | Edit User')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','users/admin/user/index')
		->set_breadcrumb('Edit User')
		->build('admin/user_form', $data);
	}

	public function delete($id=0)
	{
		// make sure the admin account cannot be deleted
		if($id==1) {
			$this->session->set_flashdata('error', 'User cannot deleted');
			redirect('users/admin/user/index');
		}

		// get user data
		$data['field'] = $this->ion_auth->user($id)->result();

		// if data not found, redirect it to list
		if($data['field']==null) {
			$this->session->set_flashdata('error', 'User not found');
			redirect('users/admin/user/index');
		}
		
		// check to see if we are deleting the user
		if ($this->ion_auth->delete_user($id))
		{
			// redirect them back to the admin page if admin, or to the base url if non admin
			$this->session->set_flashdata('error', $this->ion_auth->messages());
		}
		else
		{
			// redirect them back to the admin page if admin, or to the base url if non admin
			$this->session->set_flashdata('error', $this->ion_auth->errors());
		}
		redirect('users/admin/user/index');
	}

	function _update_user($mode, $row_id='')
	{
		$result = false;

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;

		// validate form input
		if($mode=='new') {
			if ($identity_column !== 'email')
			{
				$this->form_validation->set_rules('identity', lang('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
				$this->form_validation->set_rules('email', lang('create_user_validation_email_label'), 'trim|required|valid_email');
			}
			else
			{
				$this->form_validation->set_rules('email', lang('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
			}
		}

		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', lang('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', lang('create_user_validation_confirm_password_label'), 'required');
		}

		$this->form_validation->set_rules('first_name', lang('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', lang('create_user_validation_lname_label'), 'trim|required');

		if ($this->_valid_csrf_nonce() === FALSE || $row_id != $this->input->post('id'))
		{
			show_error($this->lang->line('error_csrf'));
		}

		if($this->form_validation->run() === TRUE) {
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
			);

			if($mode=='new') {
				if($this->ion_auth->register($identity, $password, $email, $additional_data)) {
					$this->session->set_flashdata('success', $this->ion_auth->messages());
					
					$result = TRUE;
				}
			} elseif($mode=='edit') {
				if($this->input->post('password')) {
					$additional_data['password'] = $password;
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($row_id, $additional_data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('success', $this->ion_auth->messages());
					$result = TRUE;
				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('error', $this->ion_auth->errors());

					$result = FALSE;
				}
			}

		}
		return $result;
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

	function _filters()
	{
		if($this->input->get('email')) {
			$this->ion_auth->where('email',$this->input->get('email'));
		}
		if($this->input->get('full_name')) {
			$this->ion_auth->like('concat(first_name, " ", last_name)',$this->input->get('full_name'));
		}
	}
}
