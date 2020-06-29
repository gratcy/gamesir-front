<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caching_lib {
	private $_ci;

	function __construct() {
		$this -> _ci =& get_instance();
		$this -> _ci -> load -> driver('cache');
	}
	
	function get($key) {
		return json_decode($this->_ci->cache->memcached->get($key));
	}
	
	function save($key, $data, $expired) {
		$this->_ci->cache->memcached->save($key, json_encode($data), $expired);
	}

	function delete($key) {
		$this->_ci->cache->memcached->delete($key);
	}
}
