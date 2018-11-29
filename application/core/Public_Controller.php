<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->template->set_theme('start-bootstrap');

		$this->template->set_partial('navigation','partials/navigation');
		$this->template->set_partial('metadata','partials/metadata');

		$this->load->helper('admin_theme');
	}
}