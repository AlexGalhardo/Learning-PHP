<?php
/**
 * AnotherWindowView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AnotherWindowView extends TWindow
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        parent::setTitle('New Window');
        parent::setSize(800, 400);
        
        parent::add(new TLabel('Another Window'));
    }
    public function xyz()
    {
    }
}
?>