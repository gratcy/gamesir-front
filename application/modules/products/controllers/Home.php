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

		$data = $this->caching_lib->get('product:' . $id);
		if (empty($data->data)) {
			$data = [];
			$data['data'] = $this -> Products_model -> __get_products_detail($id);
			if (empty($data['data'][0] -> gid)) redirect(base_url('/'));
			$data['related'] = $this -> Products_model -> __get_products_related();
			$data['desc'] = !empty($data['data'][0] -> gfeatured) ? $data['data'][0] -> gfeatured : $data['data'][0] -> gtitle;
			$data['title'] = $data['data'][0] -> gtitle;
			$data['marketplace'] = $this -> Products_model -> __get_marketplace_url($data['data'][0]->gid);
			$data['ogImage'] = __get_upload_file($data['data'][0] -> gfile,2);
			$this->cache->memcached->save('product:' . $id, json_encode($data), 3600 * 24);
		}

		$this->load->view('products', $data);
	}

	public function products($id=0, $page=0)
	{
		$order = $this -> input -> get('order');

		if (!$id) redirect(base_url());
		if ($id == 'all') $id = 0;
		if (!$page) $page = 0;

		$limit = 10;
		$offset = $page * $limit;
		
		$data = $this->caching_lib->get('products:collections:' . $id . $page . $limit . $offset . $order);

		if (empty($data->data)) {
			$data = [];
			$data['oid'] = $id ? $id : 'all';
			$data['name'] = 'ALL';
			$data['data'] = $this -> Products_model -> __get_products_categories($id, $limit, $offset, $order);
			$category = $this -> Products_model -> __get_category_detail($id);
			if ($id != 0) { 
				if (empty($category[0] -> cid)) redirect(base_url('/'));
			}

			$data['name'] = isset($category[0] -> cname) ? $category[0] -> cname : 'ALL';
			$data['category'] = $category;
			$data['title'] = 'Collection All';
			if ($data['name'] != 'ALL') {
				$data['title'] = $category[0] -> cname;
			}

			$data['desc'] = 'Collections ' . $data['title'] . ' | ' . $this -> config -> config['site']['title'];
			$data['id'] = is_numeric($id) ? $id : $category[0] -> cid;
			$this->cache->memcached->save('products:collections:' . $id . $page . $limit . $offset . $order, json_encode($data), 3600 * 24);
		}

		$this->load->view('collections', $data);
	}

	public function products_list($id=0, $page=0)
	{
		$order = $this -> input -> get('order');

		if (!$id) redirect(base_url());
		if ($id == 'all') $id = 0;
		if (!$page) $page = 0;

		$limit = 10;
		$offset = $page * $limit;
		$data = $this->caching_lib->get('products:collections:list:' . $id . $page . $limit . $offset . $order);

		if (empty($data->data)) {
			$data = [];
			$data['oid'] = $id ? $id : 'all';
			$data['name'] = 'ALL';
			$data['data'] = $this -> Products_model -> __get_products_categories($id, $limit, $offset, $order);
			$data['name'] = isset($data['data'][0] -> cname) ? $data['data'][0] -> cname : 'ALL';
			$data['title'] = 'Collection All';
			if ($data['name'] != 'ALL') {
				$data['title'] = $data['data'][0] -> cname;
			}
			
			$data['desc'] = 'Collections ' . $data['title'] . ' | ' . $this -> config -> config['site']['title'];
			$data['id'] = $id;
			$this->cache->memcached->save('products:collections:list:' . $id . $page . $limit . $offset . $order, json_encode($data), 3600 * 24);
		}

		$this->load->view('collections-list', $data);
	}
}
