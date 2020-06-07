<?php
class Guarantee_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function __get_warranty($serialno) {
        $ch = curl_init('https://lol.gamesir.id/guarantee/get/' . $serialno);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);      
        curl_close($ch);
        return json_decode($output, true);
	}
}
