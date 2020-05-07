<?php
class usersController extends controller {

	public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
        	header("Location: ".BASE_URL."/login");
        	exit;
        }
    }

    public function index() {
    	$data = array();
    	$u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('users_view')) {
            $data['users_list'] = $u->getList($u->getCompany());

    		$this->loadTemplate('users', $data);
    	} else {
    		header("Location: ".BASE_URL);
    	}
    }

    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('users_view')) {
            $p = new Permissions();

            if(isset($_POST['email']) && !empty($_POST['email'])) {
                $email = addslashes($_POST['email']);
                $pass  = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);

                $a = $u->add($email, $pass, $group, $u->getCompany());

                if($a == '1') {
                    header("Location: ".BASE_URL."/users");
                } else {
                    $data['error_msg'] = "Usuário já existe!";
                }
            }

            $data['group_list'] = $p->getGroupList($u->getCompany());

            $this->loadTemplate('users_add', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('users_view')) {
            $p = new Permissions();

            if(isset($_POST['group']) && !empty($_POST['group'])) {
                $pass  = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);

                $u->edit($pass, $group, $id, $u->getCompany());
                header("Location: ".BASE_URL."/users");
            }

            $data['user_info']  = $u->getInfo($id, $u->getCompany());
            $data['group_list'] = $p->getGroupList($u->getCompany());

            $this->loadTemplate('users_edit', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function delete($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('users_view')) {
            $p = new Permissions();

            $u->delete($id, $u->getCompany());
            header("Location: ".BASE_URL."/users");
        } else {
            header("Location: ".BASE_URL);
        }
    }


}












