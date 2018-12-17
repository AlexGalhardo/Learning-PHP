<?php

class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $modulos = new Modulos();

        $data['modulos'] = $modulos->getList();

        $this->loadTemplate('home', $data);
    }

    public function pegar_aulas() {

    	if(isset($_POST['modulo'])) {

    		$id_modulo = $_POST['modulo'];

    		$aulas = new Aulas();

    		$array = $aulas->getAulas($id_modulo);

    		echo json_encode($array);
    		exit;

    	}

    }
















}