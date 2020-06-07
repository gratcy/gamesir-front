<?php
class Products_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function __get_products_detail($id) {
        if (is_numeric($id))
		  $sql = $this -> db -> query("SELECT a.*,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.gcid=b.cid WHERE a.gstatus=1 AND a.gid=".$id, FALSE);
        else
            $sql = $this -> db -> query("SELECT a.*,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.gcid=b.cid WHERE a.gstatus=1 AND a.gslug='".$id."'", FALSE);
		return $sql -> result();
	}

    function __get_products_categories($cid, $limit, $offset, $order) {
    	$orderBy = ' a.gid DESC ';
    	if ($order == 'date') {
    		$orderBy = ' a.gid ASC ';
    	}
    	else if ($order == 'price') {
    		$orderBy = ' a.gprice ASC ';
    	}
    	else if ($order == 'price-desc') {
    		$orderBy = ' a.gprice DESC ';
    	}

        if (is_numeric($cid)) 
    	   $cidSQL = ' AND a.gcid=' . $cid;
        else
            $cidSQL = " AND b.cslug='".$cid."'";
    	if (!$cid) {
    		$cidSQL = '';
    	}

		$sql = $this -> db -> query("SELECT a.*,b.cname FROM products_tab a LEFT JOIN categories_tab b ON a.gcid=b.cid WHERE a.gstatus=1 ".$cidSQL." ORDER BY a.gnew DESC, a.gisready DESC, ".$orderBy, FALSE);
		return $sql -> result();
	}

	function __get_category_detail($cid) {
        if (is_numeric($cid))
		  $sql = $this -> db -> query("SELECT cid,cname,ctitle,csubtitle FROM categories_tab WHERE cid=" . $cid, FALSE);
        else
            $sql = $this -> db -> query("SELECT cid,cname,ctitle,csubtitle FROM categories_tab WHERE cslug='".$cid."'", FALSE);
		return $sql -> result();
	}

    function __get_category_cover($cid) {
        $sql = $this -> db -> query("SELECT cname,ccover FROM categories_tab WHERE cid=" . $cid, FALSE);
        return $sql -> result();
    }

    function __get_products_related() {
		$sql = $this -> db -> query("SELECT * FROM products_tab WHERE gstatus=1 AND gid IN (SELECT gid FROM (SELECT gid FROM products_tab WHERE gstatus=1 ORDER BY RAND() LIMIT 4) t)", FALSE);
		return $sql -> result();
	}

    function __get_marketplace_url($pid) {
        $sql = $this -> db -> query("SELECT a.purl, b.mlogo, b.mname FROM products_marketplace_tab a JOIN marketplace_tab b ON a.pmid=b.mid WHERE a.purl <> '' AND a.pstatus=1 AND a.ppid=" . $pid, FALSE);
        return $sql -> result();
    }
}
