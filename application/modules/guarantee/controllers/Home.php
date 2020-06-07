<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Guarantee_model');
	}

	public function index()
	{
		$serialno = $this -> input -> post('serialno');
		redirect('page/19?serialno=' . $serialno);
		die;
	}

	public function get_warranty()
	{
		header('Content-type: application/json');
		$serialno = $this -> input -> post('serialno');
		$chk = [];
		$status = 404;
		if ($serialno) {
			$chk = $this -> Guarantee_model -> __get_warranty($serialno);
			if (!empty($chk['data']['tid'])) {
				$chk['data']['tdate'] = date('d/m/Y', $chk['data']['tdate']);
				$chk['data']['tguarantee_until'] = date('d/m/Y', $chk['data']['tguarantee_until']);
				$chk = $chk['data'];
				$status = 200;
			}
		}

		$res = ['status' => $status, 'data' => $chk];
		echo json_encode($res);
		die;
	}
}
