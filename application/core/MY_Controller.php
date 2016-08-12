<?php
class MY_Controller extends CI_Controller {

    public $toView = array();

    public function __construct()
    {
        parent::__construct();
    }
    public function output_json() {
        echo json_encode($this->toJson);
    }
}