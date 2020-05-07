<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $items = new Items();

        $limit = 10;

        $total = $items->getTotal();
        // função nativa do PHP ceil()
        // sempre arredonda para cima
        // a função floor() arredonda para baixo
        $data['paginas'] = ceil($total/$limit);

        $data['paginaAtual'] = 1;
        if(!empty($_GET['p'])) {
            // intval() verifica que o valor é inteiro
        	$data['paginaAtual'] = intval($_GET['p']);
        }

        $offset = ($data['paginaAtual'] * $limit) - $limit;

        $data['lista'] = $items->getList($offset, $limit);

        $this->loadTemplate('home', $data);
    }
}