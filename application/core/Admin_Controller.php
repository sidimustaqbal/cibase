<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
}