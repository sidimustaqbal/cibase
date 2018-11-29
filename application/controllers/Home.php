<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	/**
	 * Landing Page for this website.
	 *
	 */

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->title('Home')
		->build('home');
	}
}