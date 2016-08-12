<?php
class MY_Input extends CI_Input {
	
    public function __construct() {
        parent::__construct();
    }
	
	public function json($key = null) {
		$data = json_decode(file_get_contents('php://input'), true);
		
		if (is_null($key)) return $data;
		else return $data[$key];
	}
}