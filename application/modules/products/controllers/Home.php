<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Products_model');
	}

	public function index($id)
	{
		if (!$id) redirect(base_url());
		$data['data'] = $this -> Products_model -> __get_products_detail($id);
		$data['related'] = $this -> Products_model -> __get_products_related();
		$data['desc'] = !empty($data['data'][0] -> gfeatured) ? $data['data'][0] -> gfeatured : $data['data'][0] -> gtitle;
		$data['title'] = $data['data'][0] -> gtitle;
		$data['marketplace'] = $this -> Products_model -> __get_marketplace_url($id);
		$data['ogImage'] = __get_upload_file($data['data'][0] -> gfile,2);
		$this->load->view('products', $data);
	}

	public function products($id=0, $page=0)
	{
		$order = $this -> input -> get('order');

		if (!$id) redirect(base_url());
		if ($id == 'all') $id = 0;
		$id = (int) $id;		
		if (!$page) $page = 0;
		$data['oid'] = $id ? $id : 'all';

		$limit = 10;
		$offset = $page * $limit;

		$data['name'] = 'ALL';
		$data['data'] = $this -> Products_model -> __get_products_categories($id, $limit, $offset, $order);
		$category = $this -> Products_model -> __get_category_detail($id);

		if ($category) $data['name'] = isset($category[0] -> cname) ? $category[0] -> cname : 'ALL';

		$data['title'] = 'Collection All';
		if ($data['name'] != 'ALL') {
			$data['title'] = $category[0] -> cname;
		}

		$data['desc'] = 'Collections ' . $data['title'] . ' | ' . $this -> config -> config['site']['title'];
		$this->load->view('collections', $data);
	}

	public function products_list($id=0, $page=0)
	{
		$order = $this -> input -> get('order');

		if (!$id) redirect(base_url());
		if ($id == 'all') $id = 0;
		$id = (int) $id;		
		if (!$page) $page = 0;
		$data['oid'] = $id ? $id : 'all';

		$limit = 10;
		$offset = $page * $limit;

		$data['name'] = 'ALL';
		$data['data'] = $this -> Products_model -> __get_products_categories($id, $limit, $offset, $order);
		if ($id) $data['name'] = isset($data['data'][0] -> cname) ? $data['data'][0] -> cname : 'ALL';
		$data['title'] = 'Collection All';
		if ($data['name'] != 'ALL') {
			$data['title'] = $data['data'][0] -> cname;
		}
		
		$data['desc'] = 'Collections ' . $data['title'] . ' | ' . $this -> config -> config['site']['title'];
		$this->load->view('collections-list', $data);
	}
}
