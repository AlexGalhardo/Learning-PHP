<?php
/**
 * Multi Step 2
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MultiStepRegistration2View extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);

        // add the columns
        $this->datagrid->addQuickColumn('Code',        'code',        'center', '20%');
        $this->datagrid->addQuickColumn('Description', 'description', 'left', '80%');
        
        $select_action = new TDataGridAction(array($this, 'onSelect'));
        $this->datagrid->addQuickAction('Select', $select_action, ['code', 'description'],
                                                  'fa:check-circle-o fa-fw fa-lg green');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        $breadcrumb = new TBreadCrumb;
        $breadcrumb->setHomeController('MultiStepRegistration1View');
        $breadcrumb->addHome();
        $breadcrumb->addItem('Welcome');
        $breadcrumb->addItem('Selection');
        $breadcrumb->addItem('Complete information');
        $breadcrumb->addItem('Confirmation');
        $breadcrumb->select('Selection');
        
        $back_action = new TAction(array('MultiStepRegistration1View', 'loadPage'));
        $back = new TActionLink('Back', $back_action, 'black', null, null, 'fa:arrow-circle-o-left red');
        $back->addStyleClass('btn btn-default btn-sm');
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add( $breadcrumb );
        $vbox->add( TPanelGroup::pack('', $this->datagrid, $back ) );
        
        // wrap the page content
        parent::add($vbox);
    }
    
    /**
     * Load the data into the datagrid
     */
    function onReload()
    {
        $this->datagrid->clear();
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code        = '1';
        $item->description = 'Intro to Computer Science';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code        = '2';
        $item->description = 'Software Development Process';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code        = '3';
        $item->description = 'Software Testing';
        $this->datagrid->addItem($item);
        
        // add an regular object to the datagrid
        $item = new StdClass;
        $item->code        = '4';
        $item->description = 'Programming Languages';
        $this->datagrid->addItem($item);
    }
    
    /**
     * method onView()
     * Executed when the user clicks at the view button
     */
    function onSelect($param)
    {
        TSession::setValue('registration_course', ['course_id' => $param['key'],
                                                   'course_description' => $param['description']] );
        
        AdiantiCoreApplication::loadPage('MultiStepRegistration3View');
    }
    
    /**
     * shows the page
     */
    function show()
    {
        $this->onReload();
        parent::show();
    }
}
