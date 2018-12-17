<?php
class notFoundController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        
        $this->loadView('404', $data);
    }

}