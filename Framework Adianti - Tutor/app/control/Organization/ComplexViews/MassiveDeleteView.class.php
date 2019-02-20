<?php
/**
 * MassiveDeleteView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MassiveDeleteView extends TPage
{
    protected $form;
    protected $datagrid;
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteAction;
    
    // trait with onReload, onSearch, onDelete...
    use Adianti\Base\AdiantiStandardListTrait;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->setDatabase('samples');
        $this->setActiveRecord('TrashItem');
        $this->addFilterField('content');
        $this->setLimit(10);
        
        // create the form
        $this->form = new BootstrapFormBuilder('form_trash');
        $this->form->setFormTitle(_t('Batch delete list'));
        
        // create form fields
        $content = new TEntry('content');
        $this->form->addFields( [new TLabel('Content')], [$content] );
        
        $this->form->addAction( 'Search', new TAction([$this, 'onSearch']), 'fa:search');
        
        // create datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->width = '100%';
        
        // define transformer for datagrid items
        $this->setTransformer([$this, 'onBeforeLoad']);
        
        // create datagrid columns
        $check   = new TDataGridColumn('check',    '',         'center', 40);
        $id      = new TDataGridColumn('id',       'ID',       'center', '10%');
        $content = new TDataGridColumn('content',  'Content',  'left',   '90%');
        
        // add the datagrid columns
        $this->datagrid->addColumn($check);
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($content);
        
        // create datagrid structure
        $this->datagrid->createModel();
        
        // create pagination
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());
        
        // put datagrid inside a form
        $this->formgrid = new TForm;
        $this->formgrid->add($this->datagrid);
        
        // creates the delete collection button
        $button = new TButton('delete_collection');
        $this->deleteAction = new TAction([$this, 'onDeleteCollection']);
        $button->setAction($this->deleteAction, 'Delete selected');
        $button->setImage('fa:remove red');
        $this->formgrid->addField($button);
        
        $gridpack = new TVBox;
        $gridpack->style = 'width: 100%';
        $gridpack->add($this->formgrid);
        $gridpack->add($button)->style = 'background:whiteSmoke;border:1px solid #cccccc; padding: 3px;padding: 5px;';
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        $container->add(TPanelGroup::pack('', $gridpack, $this->pageNavigation));
        parent::add($container);
    }
    
    /**
     * Transform datagrid objects
     * Create the checkbutton as datagrid element
     */
    public function onBeforeLoad($objects, $param)
    {
        // update the action parameters to pass the current page to action
        // without this, the action will only work for the first page
        $this->deleteAction->setParameters($param); // important!
        
        foreach ($objects as $object)
        {
            $object->check = new TCheckButton('check' . $object->{'id'});
            $object->check->setIndexValue('on');
            $this->formgrid->addField($object->check); // important
        }
    }
}
