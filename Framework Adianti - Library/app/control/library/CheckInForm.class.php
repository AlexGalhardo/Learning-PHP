<?php
/**
 * CheckInForm Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CheckInForm extends TPage
{
    protected $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct($param)
    {
        parent::__construct($param);
        
        // creates the form
        $this->form   = new TForm('form_Checkin');
        $panel_master = new TPanelGroup( _t('Check in') );
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $this->form->add($panel_master);
        $panel_master->add($vbox);
        
        // detail fields
        $barcode = new TDBUniqueSearch('barcode[]', 'library', 'Item', 'barcode', 'barcode');
        $barcode->setMinLength(1);
        $barcode->setSize('100%');
        $barcode->setMask('{title} ({barcode})');
        $barcode->addItems( ['1'=>'Item a', '2' => 'Item b', '3'=>'Item c', '4' => 'Item d', '5'=> 'Item e'] );
        $barcode->setChangeAction(new TAction(array($this, 'onChangeBarcode')));
        
        $author = new TEntry('author[]');
        $author->setSize('100%');
        $author->setEditable(FALSE);
        
        $publisher = new TEntry('publisher[]');
        $publisher->setSize('100%');
        $publisher->setEditable(FALSE);
        
        $edition = new TEntry('edition[]');
        $edition->setEditable(FALSE);
        $edition->setSize('100%');
        $edition->setEditable(FALSE);
        
        $this->form->addField($barcode);
        $this->form->addField($author);
        $this->form->addField($publisher);
        $this->form->addField($edition);
        
        $this->booklist = new TFieldList;
        $this->booklist->width = '100%';
        $this->booklist->addField( '<b>'._t('Book').'</b>', $barcode, ['width' => '25%']);
        $this->booklist->addField( '<b>'._t('Author').'</b>', $author, ['width' => '25%']);
        $this->booklist->addField( '<b>'._t('Publisher').'</b>', $publisher, ['width' => '25%']);
        $this->booklist->addField( '<b>'._t('Edition').'</b>', $edition, ['width' => '25%']);
        $this->booklist->enableSorting();
        
        $this->booklist->addHeader();
        $this->booklist->addDetail( new stdClass );
        $this->booklist->addDetail( new stdClass );
        $this->booklist->addDetail( new stdClass );
        $this->booklist->addDetail( new stdClass );
        $this->booklist->addDetail( new stdClass );
        $this->booklist->addCloneAction();
        
        $save_button = TButton::create('save', array($this, 'onSave'),  _t('Check in'),   'fa:check-square-o');
        $save_button->class = 'btn btn-sm btn-primary';
        $new_button  = TButton::create('new',  array($this, 'onClear'), _t('Clear form'), 'fa:eraser red');
        
        // define form fields
        $this->form->addField($save_button);
        $this->form->addField($new_button);
        $panel_master->addFooter( THBox::pack($save_button, $new_button) );
        
        $vbox->add( new TFormSeparator( '<b>' . _t('Books') . '</b>' ) );
        $vbox->add($this->booklist);
        
        // create the page container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        parent::add($container);
    }
    
    /**
     * Clear form
     */
    public function onClear($param)
    {
        $this->form->clear();
    }
    
    /**
     * Change barcode
     */
    public static function onChangeBarcode($param)
    {
        $input_id = $param['_field_id'];
        $barcode = $param['_field_value'];
        $input_pieces = explode('_', $input_id);
        $unique_id = end($input_pieces);
        
        if ($barcode)
        {
            $response = new stdClass;
            
            try
            {
                TTransaction::open('library');
                $item = Item::find($barcode);
                $response->{'author_'.$unique_id}    = $item->book->author_name;
                $response->{'publisher_'.$unique_id} = $item->book->publisher_name;
                $response->{'edition_'.$unique_id}   = $item->book->edition;
                
                TForm::sendData('form_Checkin', $response);
                TTransaction::close();
            }
            catch (Exception $e)
            {
                TTransaction::rollback();
            }
        }
    }
    
    /**
     * Save the sale and the sale items
     */
    public static function onSave($param)
    {
        try
        {
            // open a transaction with database 'library'
            TTransaction::open('library');
            
            $msg = '';
            
            if( !empty($param['barcode']) AND is_array($param['barcode']) )
            {
                foreach( $param['barcode'] as $row => $barcode)
                {
                    if ($barcode)
                    {
                        $item = Item::newFromBarcode($barcode);

                        if ($item->status_id == '2')
                        {
                            $loan = Loan::getFromBarcode($item->barcode);
                            $loan->arrive_date = date('Y-m-d');
                            
                            // store the item
                            $item->status_id = '1';
                            $item->store();
                            
                            // stores the loan
                            $loan->store();
                            
                            $msg .= "{$item->barcode} - " . _t('Success') . "<br>";
                        }
                        else
                        {
                            $msg .= "{$item->barcode} - " . _t('Not checked out') . "<br>";
                        }
                    }
                }
            }
            
            TTransaction::close(); // close the transaction
            
            new TMessage('info', $msg);
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
