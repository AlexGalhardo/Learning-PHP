<?php
/**
 * SystemPageBatchUpdate
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SystemPageBatchUpdate extends TPage
{
    private $form;
    private $datagrid;
    
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        if (TSession::getValue('login') !== 'admin')
        {
            new TMessage('error',  _t('Permission denied') );
            return;
        }
        
        $this->form = new TForm;
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
        $this->datagrid->disableDefaultClick();
        $this->datagrid->width = '100%';
        
        // add the columns
        $this->datagrid->addQuickColumn(_t('Download'), 'check',     'center', 70);
        $this->datagrid->addQuickColumn(_t('Type'),     'type',      'left');
        $this->datagrid->addQuickColumn(_t('Path'),     'file_path', 'left');
        $this->datagrid->addQuickColumn(_t('File'),     'file_name', 'left');
        $column = $this->datagrid->addQuickColumn(_t('Message'),  'type',   'left');
        
        $column->setTransformer( function($value, $object, $row) {
            $div = new TElement('span');
            $div->class="label label-" . (($object->change_type == 1) ? 'success' : 'warning');
            $div->style="text-shadow:none; font-size:12px";
            $div->add((($object->change_type == 1) ? _t('New') : _t('Changed')));
            return $div;
        });
        
        $action1 = new TDataGridAction(array($this, 'onView'));
        $action1->setLabel('View');
        $action1->setUseButton(true);
        $action1->setImage('fa:search blue');
        $action1->setFields(['id']);
        $this->datagrid->addAction($action1);
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        
        try
        {
        
            // connection info
            $db = ['name' => 'app/database/.cache.db', 'type' => 'sqlite'];
            TTransaction::open(NULL, $db); // open transaction 
            $conn = TTransaction::get(); // get PDO connection 
             
            TDatabase::dropTable($conn, 'builder_codes', true);
            TDatabase::createTable($conn, 'builder_codes', ['id' => 'int', 'type' => 'text', 'file_path' => 'text', 'file_name' => 'text', 'content' => 'text']);
            
            $pages = SystemPageService::getCodes();
            
            $types = ['models', 'codes', 'template_codes', 'pages'];
            foreach ($types as $type)
            {
                if (!empty($pages->$type))
                {
                    foreach ($pages->$type as $page)
                    {
                        $full_path = $page->file_path . '/' . $page->file_name;
                        $full_path = (substr($full_path, 0,1) == '/') ? substr($full_path,1) : $full_path;
                        
                        $id = mt_rand(1000000000, 1999999999);
                        TDatabase::insertData($conn, 'builder_codes', [ 'id' => $id,
                                                                        'type'      => $page->type,
                                                                        'file_path' => $page->file_path,
                                                                        'file_name' => $page->file_name,
                                                                        'content'   => $page->content ]);
                        
                        if (!file_exists($full_path) OR base64_decode($page->content) !== file_get_contents( $full_path ))
                        {
                            $page->id = $id;
                            // add an regular object to the datagrid
                            $page->check = new TCheckButton('check_'.$id);
                            $page->check->setIndexValue('on');
                            
                            $page->change_type = 2;
                            
                            if (!file_exists($full_path))
                            {
                                $page->change_type = 1;
                                $page->check->setValue('on');
                            }
                            
                            $this->form->addField($page->check); // important!
                            $this->datagrid->addItem((object) $page);
                        }
                    }
                }
            }
            
            TTransaction::close(); // close transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        $panel = new TPanelGroup('Page Batch update');
        $panel->add($this->datagrid);
        
        $button = TButton::create('action1', [$this, 'onSave'], 'Save', 'fa:save green');
        $this->form->addField($button);
        $panel->addFooter($button);
        $this->form->add($panel);
        
        parent::add($this->form);
    }
    
    /**
     * View diffs
     */
    public static function onView($param)
    {
        ini_set('highlight.comment', "#808080");
        ini_set('highlight.default', "#FFFFFF");
        ini_set('highlight.html',    "#C0C0C0");
        ini_set('highlight.keyword', "#62d3ea");
        ini_set('highlight.string',  "#FFC472");
        
        try
        {
        
            $db = ['name' => 'app/database/.cache.db', 'type' => 'sqlite'];
            TTransaction::open(NULL, $db); // open transaction 
            $conn = TTransaction::get(); // get PDO connection
            
            $query = "SELECT *
                        FROM builder_codes
                       WHERE id = ?";
            
            $data = TDatabase::getData($conn, $query, null, [ $param['id'] ])[0];
            
            $full_path = $data['file_path'] . '/' . $data['file_name'];
            $full_path = (substr($full_path, 0,1) == '/') ? substr($full_path,1) : $full_path;
            
            $code1 = file_exists($full_path) ? file_get_contents($full_path) : '';
            $code2 = base64_decode( $data['content'] );
            
            $source1 = new TSourceCode;
            $source1->loadString( $code1 );
            
            $source2 = new TSourceCode;
            $source2->loadString( $code2 );
            
            $vbox1 = new TVBox;
            $vbox2 = new TVBox;
            
            $wrapper1 = new TElement('div');
            $wrapper1->class = 'sourcecodewrapper';
            $wrapper1->style = 'height: 800px; width:550px; overflow-y: auto';
            $wrapper1->add($source1);
            
            $wrapper2 = new TElement('div');
            $wrapper2->class = 'sourcecodewrapper';
            $wrapper2->style = 'height: 800px; width:550px; overflow-y: auto';
            $wrapper2->add($source2);
            
            $vbox1->add('<b>'._t('Local') . '</b>: ' . $data['file_path'] . '/' . $data['file_name'] . ' - ' . '<b>len</b>: '.strlen($code1))->style = 'text-align:center';
            $vbox1->add($wrapper1);
            
            $vbox2->add('<b>'._t('Remote') . '</b>: ' . $data['file_path'] . '/' . $data['file_name'] . ' - ' . '<b>len</b>: '.strlen($code2))->style = 'text-align:center';
            $vbox2->add($wrapper2);
            
            $hbox = new THBox;
            $hbox->style='display:flex';
            $hbox->add($vbox1);
            $hbox->add('&nbsp;&nbsp;');
            $hbox->add($vbox2);
            
            $win = TWindow::create('Diff', 1150, null);
            $win->add($hbox);
            $win->show();
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('info', $e->getMessage());
        }
    }
    
    /**
     * Save files
     */
    public static function onSave($param)
    {
        if ($param)
        {
            $datagrid = new BootstrapDatagridWrapper(new TQuickGrid);
            $datagrid->width = '100%';
            
            $datagrid->addQuickColumn(_t('Type'),     'type',      'left');
            $datagrid->addQuickColumn(_t('Path'),     'file_path', 'left');
            $datagrid->addQuickColumn(_t('File'),     'file_name', 'left');
            $column = $datagrid->addQuickColumn(_t('Message'),  'message',   'left');
            
            $column->setTransformer( function($value, $object, $row) {
                $div = new TElement('span');
                $div->class="label label-" . (($object->status==1) ? 'success' : 'danger');
                $div->style="text-shadow:none; font-size:12px";
                $div->add($value);
                return $div;
            });
            
            $datagrid->createModel();
            
            try
            {
                $db = ['name' => 'app/database/.cache.db', 'type' => 'sqlite'];
                TTransaction::open(NULL, $db); // open transaction 
                $conn = TTransaction::get(); // get PDO connection
                
                foreach ($param as $variable => $value)
                {
                    if (substr($variable,0,5) == 'check')
                    {
                        $parts = explode('_', $variable);
                        $id    = $parts[1];
                        
                        $query = "SELECT *
                                    FROM builder_codes
                                   WHERE id = ?";
                        
                        $data = TDatabase::getData($conn, $query, null, [ $id ])[0];
                        
                        $full_path = $data['file_path'] . '/' . $data['file_name'];
                        
                        if (!file_exists($data['file_path']))
                        {
                            mkdir($data['file_path'], 0777, true);
                        }
                        
                        if ( (file_exists($full_path) AND is_writable($full_path)) OR (!file_exists($full_path) AND is_writable($data['file_path'])) )
                        {
                            file_put_contents($full_path, base64_decode($data['content']));
                            
                            $data['status']  = 1;
                            $data['message'] = _t('Success');
                            $datagrid->addItem( (object) $data);
                        }
                        else
                        {
                            $data['status']  = 2;
                            $data['message'] = _t('Permission denied');
                            $datagrid->addItem( (object) $data);
                        }
                    }
                }
                
                TTransaction::close();
                
                $win = TWindow::create('Result', 1000, 800);
                $win->add($datagrid);
                $win->show();
            }
            catch (Exception $e)
            {
                new TMessage('info', $e->getMessage());
            }
        }
    }
}
