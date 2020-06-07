<?php
class Home_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function __get_slideshow() {
		$sql = $this -> db -> query("SELECT * FROM slideshow_tab WHERE sstatus=1 ORDER BY sid ASC LIMIT 5", FALSE);
		return $sql -> result();
	}

    function __get_products() {
		$sql = $this -> db -> query("SELECT * FROM products_tab WHERE gstatus=1 ORDER BY gnew DESC, gisready DESC LIMIT 10", FALSE);
		return $sql -> result();
	}

    function __get_products_detail($id) {
		$sql = $this -> db -> query("SELECT * FROM products_tab WHERE gstatus=1 AND gid=" . $id, FALSE);
		return $sql -> result();
	}

    function __get_menus($parent) {
		$sql = $this -> db -> query("SELECT * FROM pages_tab WHERE pstatus=1 AND pparent=".$parent." ORDER BY pid ASC", FALSE);
		return $sql -> result();
	}

    function __get_categories_product() {
		$sql = $this -> db -> query("SELECT * FROM categories_tab WHERE cstatus=1 AND ctype=2 ORDER BY cid ASC", FALSE);
		return $sql -> result();
	}

	function __get_last_category($cid, $limit) {
		$sql = $this -> db -> query("SELECT * FROM posts_tab WHERE pstatus=1 AND pcid=".$cid." ORDER BY pid DESC LIMIT " . $limit, FALSE);
		return $sql -> result();
	}

	function __get_last_posts($categorynot, $limit) {
		if (!$categorynot)
			$sql = $this -> db -> query("SELECT * FROM posts_tab WHERE pstatus=1 ORDER BY pid DESC LIMIT " . $limit, FALSE);
		else
			$sql = $this -> db -> query("SELECT * FROM posts_tab WHERE pcid != ".$categorynot." AND pstatus=1 ORDER BY pid DESC LIMIT " . $limit, FALSE);
		return $sql -> result();
	}

	function __get_last_events($limit) {
		$sql = $this -> db -> query("SELECT * FROM events_tab WHERE estatus=1 AND efaculty=".$faculty." ORDER BY eid DESC LIMIT " . $limit, FALSE);
		return $sql -> result();
	}

	function __get_last_testimonial($faculty=1, $limit) {
		$sql = $this -> db -> query("SELECT * FROM testimonial_tab WHERE tstatus=1 AND tfaculty=".$faculty." ORDER BY tid DESC LIMIT " . $limit, FALSE);
		return $sql -> result();
	}
}
