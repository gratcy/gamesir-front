<?php
class Products_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function __get_products_detail($id) {
		$sql = $this -> db -> query("SELECT a.*,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.gcid=b.cid WHERE a.gstatus=1 AND a.gid=".$id, FALSE);
		return $sql -> result();
	}

    function __get_products_categories($cid, $limit, $offset, $order) {
    	$orderBy = ' gid DESC ';
    	if ($order == 'date') {
    		$orderBy = ' gid ASC ';
    	}
    	else if ($order == 'price') {
    		$orderBy = ' gprice ASC ';
    	}
    	else if ($order == 'price-desc') {
    		$orderBy = ' gprice DESC ';
    	}

    	$cidSQL = ' AND gcid=' . $cid;
    	if (!$cid) {
    		$cidSQL = '';
    	}

		$sql = $this -> db -> query("SELECT a.*,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.gcid=b.cid WHERE a.gstatus=1 ".$cidSQL." ORDER BY ".$orderBy, FALSE);
		return $sql -> result();
	}

	function __get_category_detail($cid) {
		$sql = $this -> db -> query("SELECT cname FROM categories_tab WHERE cid=" . $cid, FALSE);
		return $sql -> result();
	}

    function __get_products_related() {
		$sql = $this -> db -> query("SELECT * FROM products_tab WHERE gid IN (SELECT gid FROM (SELECT gid FROM products_tab ORDER BY RAND() LIMIT 4) t)", FALSE);
		return $sql -> result();
	}

    function __get_marketplace_url($pid) {
        $sql = $this -> db -> query("SELECT a.purl, b.mlogo, b.mname FROM products_marketplace_tab a JOIN marketplace_tab b ON a.pmid=b.mid WHERE a.purl <> '' AND a.pstatus=1 AND a.ppid=" . $pid, FALSE);
        return $sql -> result();
    }
}
