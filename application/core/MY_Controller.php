<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->ion_auth->logged_in()) {
			$current_user = $this->ion_auth->user()->row();
			// Get user data
			$this->template->current_user = ci()->current_user = $this->current_user = $current_user;
		}
	}
}

/**
 * Returns the CodeIgniter object.
 *
 * Example: ci()->db->get('table');
 *
 * @return \CI_Controller
 */
function ci()
{
	return get_instance();
}