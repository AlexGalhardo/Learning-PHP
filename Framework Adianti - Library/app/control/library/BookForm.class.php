<?php
/**
 * BookForm
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BookForm extends TPage
{
    private $form; // form
    private $authors_list;
    private $subjects_list;
    private $items_list;
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_book');
        $this->form->setFormTitle(_t('Book'));
        
        $id                 = new TEntry('id');
        $title              = new TEntry('title');
        $isbn               = new TEntry('isbn');
        $call_number        = new TEntry('call_number');
        $author_id          = new TDBSeekButton('author_id', 'library', $this->form->getName(), 'Author', 'name', 'author_id', 'author_name');
        $author_name        = new TEntry('author_name');
        $edition            = new TEntry('edition');
        $volume             = new TEntry('volume');
        $collection_id      = new TDBCombo('collection_id', 'library', 'Collection', 'id', 'description');
        $classification_id  = new TDBCombo('classification_id', 'library', 'Classification', 'id', 'description');
        $publisher_id       = new TDBSeekButton('publisher_id', 'library', $this->form->getName(), 'Publisher', 'name', 'publisher_id', 'publisher_name');
        $publisher_name     = new TEntry('publisher_name');
        $publish_place      = new TEntry('publish_place');
        $publish_date       = new TDate('publish_date');
        $abstract           = new TText('abstract');
        
        $id->setEditable(FALSE);
        $id->setSize('30%');
        $title->setSize('100%');
        $isbn->setSize('100%');
        $call_number->setSize('100%');
        $edition->setSize('100%');
        $volume->setSize('100%');
        $collection_id->setSize('100%');
        $classification_id->setSize('100%');
        $publish_place->setSize('100%');
        $publish_date->setSize('100%');
        $abstract->setSize('100%', 50);
        
        $author_id->setSize('calc(20% - 22px)');
        $author_id->setAuxiliar($author_name);
        $author_name->setSize('80%');
        $author_name->setEditable(FALSE);
        
        $publisher_id->setSize('calc(20% - 22px)');
        $publisher_id->setAuxiliar($publisher_name);
        $publisher_name->setSize('80%');
        $publisher_name->setEditable(FALSE);
        
        $this->form->appendPage('Basic data');
        $this->form->setFieldSizes('100%');
        $row = $this->form->addFields( [ new TLabel(_t('Code')), $id ],
                                       [ new TLabel('ISBN'), $isbn ],
                                       [ new TLabel(_t('Call')), $call_number ] );
        $row->layout = ['col-sm-4', 'col-sm-4', 'col-sm-4' ];
        
        $row = $this->form->addFields( [ new TLabel(_t('Title')),  $title ],
                                       [ new TLabel(_t('Collection')), $collection_id ],
                                       [ new TLabel(_t('Classification')), $classification_id ] ); 
        $row->layout = ['col-sm-4', 'col-sm-4', 'col-sm-4' ];
        
        $row = $this->form->addFields( [ new TLabel(_t('Author')), $author_id ], 
                                       [ new TLabel(_t('Publisher')), $publisher_id ] );
        $row->layout = ['col-sm-6', 'col-sm-6' ];
        
        $row = $this->form->addFields( [ new TLabel(_t('Place')), $publish_place ],
                                       [ new TLabel(_t('Date')), $publish_date ],
                                       [ new TLabel(_t('Edition')), $edition ],
                                       [ new TLabel(_t('Volume')), $volume ] );
        $row->layout = ['col-sm-3', 'col-sm-3', 'col-sm-3', 'col-sm-3' ];
        
        $this->form->addFields( [ new TLabel(_t('Abstract')), $abstract ] );
        
        
        // authors list
        $this->form->appendPage(_t('Authors'));
        $author_id = new TDBUniqueSearch('author_ids[]', 'library', 'Author', 'id', 'name');
        $author_id->setSize('100%');
        $author_id->setMinLength(1);
        
        $this->authors_list = new TFieldList;
        $this->authors_list->width = '100%';
        $this->authors_list->addField( '<b>'._t('Author').'</b>', $author_id, [ 'width' => '100%' ] );
        $this->authors_list->enableSorting();
        $this->form->addField($author_id);
        $this->form->addContent( [$this->authors_list] );
        
        // subjects list
        $this->form->appendPage(_t('Subjects'));
        $subject_id = new TDBUniqueSearch('subject_ids[]', 'library', 'Subject', 'id', 'name');
        $subject_id->setSize('100%');
        $subject_id->setMinLength(1);
        
        $this->subjects_list = new TFieldList;
        $this->subjects_list->width = '100%';
        $this->subjects_list->addField( '<b>'._t('Subject').'</b>', $subject_id, [ 'width' => '100%' ]);
        $this->subjects_list->enableSorting();
        $this->form->addField($subject_id);
        $this->form->addContent( [$this->subjects_list] );
        
        // items
        $this->form->appendPage(_t('Items'));
        $item_id      = new THidden('item_id[]');
        $barcode      = new TEntry('barcode[]');
        $status       = new TDBCombo('status_id[]', 'library', 'Status', 'id', 'description');
        $cost         = new TEntry('cost[]');
        $acquire_date = new TDate('acquire_date[]');
        $barcode->setSize('100%');
        $status->setSize('100%');
        $cost->setNumericMask(2, ',', '.', true);
        $cost->setSize('100%');
        $acquire_date->setSize('100%');
        
        $this->items_list = new TFieldList;
        $this->items_list->width = '100%';
        $this->items_list->addField( '<b>'._t('Id').'</b>', $item_id, [ 'width' => '1%' ]);
        $this->items_list->addField( '<b>'._t('Barcode').'</b>', $barcode, [ 'width' => '25%' ]);
        $this->items_list->addField( '<b>'._t('Status').'</b>', $status, [ 'width' => '25%' ]);
        $this->items_list->addField( '<b>'._t('Cost').'</b>', $cost, [ 'width' => '25%' ]);
        $this->items_list->addField( '<b>'._t('Date').'</b>', $acquire_date, [ 'width' => '25%' ]);
        $this->items_list->enableSorting();
        $this->form->addField($item_id);
        $this->form->addField($barcode);
        $this->form->addField($status);
        $this->form->addField($cost);
        $this->form->addField($acquire_date);
        $this->form->addContent( [$this->items_list] );
        
        
        $btn = $this->form->addAction( 'Save', new TAction(array($this, 'onSave')), 'fa:save' );
        $btn->class = 'btn btn-sm btn-primary';
        $this->form->addAction( 'Clear', new TAction(array($this, 'onClear')), 'fa:eraser red' );
        $this->form->addActionLink( 'List', new TAction(array('BookList', 'onReload')), 'fa:table blue' );
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', 'BookList'));
        $container->add($this->form);
        
        // add the form inside the page
        parent::add($container);
    }
    
    /**
     * method onSave
     * Executed whenever the user clicks at the save button
     */
    public static function onSave($param)
    {
        try
        {
            // open a transaction with database 'library'
            TTransaction::open('library');
            
            // read the form data and instantiates an Active Record
            $book = new Book;
            $book->fromArray( $param );
            $book->clearParts();
            
            if( !empty($param['author_ids']) AND is_array($param['author_ids']) )
            {
                foreach( $param['author_ids'] as $row => $author_id)
                {
                    if ($author_id)
                    {
                        $book->addAuthor( new Author( $author_id ) );
                    }
                }
            }
            
            if( !empty($param['subject_ids']) AND is_array($param['subject_ids']) )
            {
                foreach( $param['subject_ids'] as $row => $subject_id)
                {
                    if ($subject_id)
                    {
                        $book->addSubject( new Subject( $subject_id ) );
                    }
                }
            }
            
            if( !empty($param['barcode']) AND is_array($param['barcode']) )
            {
                foreach( $param['barcode'] as $row => $barcode)
                {
                    if ($barcode)
                    {
                        $item = new Item;
                        $item->barcode       = $barcode;
                        $item->id            = $param['item_id'][$row];
                        $item->status_id     = $param['status_id'][$row];
                        $item->cost          = str_replace(',', '.', $param['cost'][$row]);
                        $item->acquire_date  = $param['acquire_date'][$row];
                        $book->addItem( $item );
                    }
                }
            }


            // stores the object in the database
            $book->store();
            
            $data = new stdClass;
            $data->id = $book->id;
            TForm::sendData('form_book', $data);
            
            // shows the success message
            new TMessage('info', 'Record saved');
            
            TTransaction::close(); // close the transaction
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    /**
     * method onEdit
     * Edit a record data
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['id']))
            {
                // open a transaction with database 'library'
                TTransaction::open('library');
                
                // load the Active Record according to its ID
                $book = new Book($param['id']);
                
                // load the contacts (composition)
                $authors  = $book->getAuthors();
                $subjects = $book->getSubjects();
                $items    = $book->getItems();
                
                if ($authors)
                {
                    $this->authors_list->addHeader();
                    foreach ($authors as $author)
                    {
                        $author_row = new stdClass;
                        $author_row->author_ids = $author->id;
                        $this->authors_list->addDetail( $author_row );
                    }
                    
                    $this->authors_list->addCloneAction();
                }
                else
                {
                    $this->clearAuthors();
                }
                
                if ($subjects)
                {
                    $this->subjects_list->addHeader();
                    
                    foreach ($subjects as $subject)
                    {
                        $subject_row = new stdClass;
                        $subject_row->subject_ids = $subject->id;
                        $this->subjects_list->addDetail( $subject_row );
                    }
                    $this->subjects_list->addCloneAction();
                }
                else
                {
                    $this->clearSubjects();
                }
                
                
                if ($items)
                {
                    $this->items_list->addHeader();
                    foreach ($items as $item)
                    {
                        $item->item_id = $item->id;
                        $this->items_list->addDetail($item);
                    }
                    
                    $this->items_list->addCloneAction();
                }
                else
                {
                    $this->clearItems();
                }


                // fill the form with the active record data
                $this->form->setData($book);
                
                // close the transaction
                TTransaction::close();
            }
            else
            {
                $this->onClear($param);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
    
    /**
     * Clear subjects
     */
    public function clearSubjects()
    {
        $this->subjects_list->addHeader();
        $this->subjects_list->addDetail( new stdClass );
        $this->subjects_list->addCloneAction();
    }
    
    /**
     * Clear authors
     */
    public function clearAuthors()
    {
        $this->authors_list->addHeader();
        $this->authors_list->addDetail( new stdClass );
        $this->authors_list->addCloneAction();
    }
    
    /**
     * Clear items
     */
    public function clearItems()
    {
        $this->items_list->addHeader();
        $this->items_list->addDetail( new stdClass );
        $this->items_list->addCloneAction();
    }
    
    /**
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear();
        
        $this->clearSubjects();
        $this->clearAuthors();
        $this->clearItems();
    }
}
