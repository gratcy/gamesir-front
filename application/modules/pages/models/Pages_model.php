<?php
class Pages_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function __get_pages_detail($id) {
    	if (is_numeric($id))
			$sql = $this -> db -> query("SELECT * FROM pages_tab WHERE pstatus=1 AND pid=".$id, FALSE);
		else
			$sql = $this -> db -> query("SELECT * FROM pages_tab WHERE pstatus=1 AND pslug='".$id."'", FALSE);
		return $sql -> result();
	}
}
