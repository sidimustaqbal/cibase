<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}
	
	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{

		// set the flash data error message if there is one
		$data['messages'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		//list the users
		$data['users'] = $this->ion_auth->users()->result();
		foreach ($data['users'] as $k => $user)
		{
			$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}

		// $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $data);
		$this->template->title('Users | amsds')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','')
		->build('admin/user_index', $data);
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
		$this->template->title('Users | Create User')
		->set_breadcrumb('Home','admin')
		->set_breadcrumb('Users','users/admin/user/index')
		->set_breadcrumb('Create User')
		->build('admin/user_form', $data);
	}

	public function edit($id=0)
	{
		$data = array();
		$this->template->title('Users | Edit User')
		->build('admin/user_form', $data);
	}

	public function delete($id=0)
	{
		$this->session->set_flashdata('error','User has been successfully deleted');
		redirect('users/admin/user/index');
	}

	function _update_user($method, $row_id='')
	{
		$result = false;

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('fullname','Full Name','required');

		if($this->form_validation->run()) {
			$result = true;
		}
		return $result;
	}
}
