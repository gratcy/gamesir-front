<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Pages_model');
		$this -> load -> library('Plugins_lib');
	}

	public function index($id)
	{
		$data['data'] = $this -> Pages_model -> __get_pages_detail($id);
		$data['title'] = $data['data'][0] -> ptitle;
		$this->load->view('pages', $data);
	}
}
