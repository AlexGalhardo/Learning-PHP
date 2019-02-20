<?php
/**
 * DesignDataGridView Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DesignDataGridView extends TPage
{
    private $form;
    private $datagrid;
    private $loaded;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new TForm('form_Teste');
        
        try
        {
            // TUIBuilder object
            $ui = new TUIBuilder(500, 400);
            $ui->setController($this);
            $ui->setForm($this->form);
            
            // reads the xml form
            $ui->parseFile('app/forms/datagrid.form.xml');
            // get the datagrid
            $this->datagrid = $ui->getWidget('datagrid');
            
            // put the TUIBuilder panel inside the TForm object
            $this->form->add($ui);
            // set form fields from interface fields
            $this->form->setFields($ui->getFields());
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    

    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        // shows the exception info message
        new TMessage('info', "Editing record {$param['key']}");
    }
    
    /**
     * method onReload()
     * Load the datagrid with the objects
     */
    function onReload($param = NULL)
    {
        $this->datagrid->clear();
        
        $object = new StdClass;
        $object->id   = 1;
        $object->name = 'Pablo Dall Oglio';
        $this->datagrid->addItem($object);
        
        $object = new StdClass;
        $object->id   = 2;
        $object->name = 'João Pablo Silva da Silva';
        $this->datagrid->addItem($object);
        
        $object = new StdClass;
        $object->id   = 3;
        $object->name = 'Daniel Bauermann';
        $this->datagrid->addItem($object);
        
        $object = new StdClass;
        $object->id   = 4;
        $object->name = 'Mouriac Halen Diemer';
        $this->datagrid->addItem($object);
        
        $object = new StdClass;
        $object->id   = 5;
        $object->name = 'Sérgio Crespo Coelho da Silva Pinto';
        $this->datagrid->addItem($object);
        
        $this->loaded = true;
    }
    
    /**
     * method show()
     * Shows the page
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload();
        }
        parent::show();
    }
}
?>