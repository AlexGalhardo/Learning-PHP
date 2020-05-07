<?php
class ajaxController extends controller {

	public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
        	header("Location: ".BASE_URL."/login");
        	exit;
        }
    }

    public function index(){}

    public function search_clients() {
    	$data = array();
    	$u = new Users();
        $u->setLoggedUser();
    	$c = new Clients();

    	if(isset($_GET['q']) && !empty($_GET['q'])) {
    		$q = addslashes($_GET['q']);

    		$clients = $c->searchClientByName($q, $u->getCompany());

    		foreach($clients as $citem) {
    			$data[] = array(
    				'name' => $citem['name'],
    				'link' => BASE_URL.'/clients/edit/'.$citem['id'],
                    'id'   => $citem['id']
    			);
    		}
    	}

    	echo json_encode($data);
    }

    public function search_products() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $i = new Inventory();

        if(isset($_GET['q']) && !empty($_GET['q'])) {
            $q = addslashes($_GET['q']);
            $data = $i->searchProductsByName($q, $u->getCompany());
        }

        echo json_encode($data);
    }

    public function add_client() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $c = new Clients();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);

            $data['id'] = $c->add($u->getCompany(), $name);
        }

        echo json_encode($data);
    }

}
















