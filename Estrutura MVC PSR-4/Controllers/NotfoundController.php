<?php

namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller {

	public function index() {
		$this->loadView('404', array());
	}

}