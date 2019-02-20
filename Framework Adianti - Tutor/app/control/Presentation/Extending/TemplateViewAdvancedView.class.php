<?php
/**
 * Template View pattern implementation
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TemplateViewAdvancedView extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        $link1 = new TActionLink('Action 1', new TAction(array($this, 'onAction1')), 'green', 10, null, 'fa:search');
        $link2 = new TActionLink('Action 2', new TAction(array($this, 'onAction2')), 'blue', 10, null, 'fa:search');
        $link1->class = 'btn btn-default';
        $link2->class = 'btn btn-default';
        
        $hbox_actions = THBox::pack($link1, $link2);
        
        try
        {
            // create the HTML Renderer
            $this->html = new THtmlRenderer('app/resources/content.html');
    
            // define replacements for the main section
            $replace = array();
            $replace['name']    = 'Test name';
            $replace['address'] = 'Test address';
            
            // replace the main section variables
            $this->html->enableSection('main', $replace);
            
            // Table wrapper (form and HTML)
            $container = new TVBox;
            $container->style = 'width:100%';
            $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            $container->add($hbox_actions);
            $container->add($this->html);
            parent::add($container);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Executed when the user clicks at the action1 button
     */
    public function onAction1()
    {
        // create a quickform
        $form = new BootstrapFormBuilder('form1');
        
        $form->addFields( [new TLabel('Test1')], [new TEntry('test1')]);
        $form->addFields( [new TLabel('Test2')], [new TEntry('test2')]);
        $form->addAction('Show', new TAction(array($this, 'onForm1')), 'fa:check-circle-o');
        
        $replace = array();
        $replace['widget'] = $form;
        $replace['class']  = get_class($form);
        
        // replace the object section variables
        $this->html->enableSection('object', $replace);
        
    }
    
    /**
     * Executed when the user clicks at the show data button
     */
    public static function onForm1($param)
    {
        new TMessage('info', json_encode($param));
    }
    
    /**
     * Executed when the user clicks at the action2 button
     */
    public function onAction2()
    {
        $datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $datagrid->width = '100%';
        
        // add the columns
        $datagrid->addQuickColumn('Code',    'code',    'right', '30%');
        $datagrid->addQuickColumn('Name',    'name',    'left',  '70%');
        
        // creates the datagrid model
        $datagrid->createModel();
        
        $object = new StdClass;
        $object->code = '001';
        $object->name = 'Test 001';
        $datagrid->addItem($object);
        
        $object = new StdClass;
        $object->code = '002';
        $object->name = 'Test 002';
        $datagrid->addItem($object);
        
        $replace = array();
        $replace['widget'] = $datagrid;
        $replace['class']  = get_class($datagrid);
        
        // replace the object section variables
        $this->html->enableSection('object', $replace);
    }
}
