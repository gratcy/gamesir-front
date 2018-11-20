<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugins_lib {
	private $_ci;

	function __construct() {
		$this -> _ci =& get_instance();
	}
	
	function __get_plugins($faculty, $id) {
		if ($id != $this -> _ci -> config -> config['gallery']) return false;
		$this -> _ci -> load -> model('Gallery_model');
		$category = $this -> _ci -> Gallery_model -> __get_category_gallery($faculty);
		$res = '';
		foreach ($category as $k => $v) :
			$res .= '<div class="clear"></div>';
			$res .= '<h2>'.$v -> cname.'</h2>';
			$res .= '<div class="clear"></div>';
			$data = $this -> _ci -> Gallery_model -> __get_gallery($faculty, $v -> cid);
			foreach($data as $k1 => $v1) :
				$res .= '<div class="col-lg-3 col-md-3 col-sm-3 ">';
				$res .= '<div class="portfolio-item">';
				$res .= '<img src="'.__get_upload_file($v1 -> gfile, 2).'" class="img-responsive " alt="" />';
				$res .= '<h5 >'.$v1 -> gtitle.'</h5>';
				$res .= '<div class="overlay">';
				$res .= '<a class="preview btn btn-success " title="'.$v1 -> gtitle.'" href="'.__get_upload_file($v1 -> gfile, 2).'">VIEW PROJECT</a>';
				$res .= $v1 -> gcontent;
				$res .= '<a class="preview"  href="'.__get_upload_file($v1 -> gfile, 2).'" >';
				$res .= '<i class="fa fa-microphone fa-5x"></i>';
				$res .= 'See Project Details</a>';
				$res .= '</div>';
				$res .= '</div>';
				$res .= '</div>';
			endforeach;
		endforeach;
		return $res;
	}
}
