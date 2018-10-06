<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			$uri = $this->uri->uri_string();
			// redirect them to the login page
			redirect('users/auth/login?redirect='.$uri, 'refresh');
		}

		$this->template->set_partial('navigation','partials/navigation');
		$this->template->set_partial('notices','partials/notices');

		$this->load->helper('admin_theme');
	}
}