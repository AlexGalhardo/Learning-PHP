<?php
/**
 * TreeView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TreeView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // define the tree data
        $data = array();
        $data['Brazil']['RS'][10] = 'Lajeado';
        $data['Brazil']['RS'][20] = 'Cruzeiro do Sul';
        $data['Brazil']['RS'][30] = 'Porto Alegre';
        $data['Brazil']['SP'][40] = 'São Paulo';
        $data['Brazil']['SP'][50] = 'Osasco';
        $data['Brazil']['MG'][60] = 'Belo Horizonte';
        $data['Brazil']['MG'][70] = 'Ipatinga';
        
        // scroll around the treeview
        $scroll = new TScroll;
        $scroll->setSize(300, 200);
        $scroll->style = 'margin-right: 5px';
        
        // creates the treeview
        $treeview = new TTreeView;
        $treeview->setSize(300);
        $treeview->setItemAction(new TAction(array($this, 'onSelect')));
        $treeview->fromArray($data); // fill the treeview
        $scroll->add($treeview);
        
        // creates a simple form
        $this->form = new BootstrapFormBuilder('form_test');
        $this->form->setFormTitle('Form');
        
        // creates the form fields
        $key   = new TEntry('key');
        $value = new TEntry('value');
        
        $this->form->addFields( [new TLabel('Key')],   [$key] );
        $this->form->addFields( [new TLabel('Value')], [$value] );
        
        // pack treeview and form
        $hbox = THBox::pack($scroll, $this->form);
        $hbox->style = 'display:inline-flex';
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($hbox);

        parent::add($vbox);
    }
    
    /**
     * Executed when the user clicks at a tree node
     * @param $param URL parameters containing key and value
     */
    public static function onSelect($param)
    {
        $obj = new StdClass;
        $obj->key = $param['key']; // get node key (index)
        $obj->value = $param['value']; // get node value (contend)
        
        // fill the form with this object attributes
        TForm::sendData('form_test', $obj);
    }
}
