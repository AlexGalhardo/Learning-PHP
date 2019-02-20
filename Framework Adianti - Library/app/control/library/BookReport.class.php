<?php
/**
 * BookReport Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BookReport extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Book_Report');
        $this->form->setFormTitle( _t('Report filters') );

        // create the form fields
        $title           = new TEntry('title');
        $author_id       = new TDBSeekButton('author_id', 'library', 'form_Book_Report', 'Author', 'name', 'author_id', 'author_name');
        $author_name     = new TEntry('author_name');
        $collection_id   = new TDBCombo('collection_id', 'library', 'Collection', 'id', 'description');
        $output_type     = new TRadioGroup('output_type');
        $output_type->setUseButton();
        
        $options=array();
        $options['pdf']  = 'PDF';
        $options['rtf']  = 'RTF';
        $options['xls']  = 'XLS';
        $output_type->addItems($options);
        $output_type->setValue('pdf');
        $output_type->setLayout('horizontal');
        
        // define the sizes
        $title->setSize('100%');
        $author_id->setSize('calc(20% - 22px)');
        $author_name->setSize('80%');
        $author_id->setAuxiliar($author_name);
        $collection_id->setSize('100%');
        $author_name->setEditable(FALSE);
        $collection_id->enableSearch();
        
        $this->form->addFields( [new TLabel(_t('Title'))], [$title] );
        $this->form->addFields( [new TLabel(_t('Author'))], [$author_id ] );
        $this->form->addFields( [new TLabel(_t('Collection'))], [$collection_id] );
        $this->form->addFields( [new TLabel(_t('Output'))], [$output_type] );
        
        $btn = $this->form->addAction(_t('Generate'), new TAction(array($this, 'onGenerate')), 'fa:check-circle-o');
        $btn->class = 'btn btn-sm btn-primary';
        
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $container->add($this->form);
        
        // add the form to the page
        parent::add($container);
    }

    /**
     * method onGenerate()
     * Executed whenever the user clicks at the generate button
     */
    function onGenerate()
    {
        try
        {
            // open a transaction with database 'library'
            TTransaction::open('library');
            
            // get the form data into an active record Book
            $object = $this->form->getData('Book');
            
            $repository = new TRepository('Book');
            $criteria   = new TCriteria;
            if ($object->title)
            {
                $criteria->add(new TFilter('title', 'like', "%{$object->title}%"));
            }
            
            if ($object->author_id)
            {
                $criteria->add(new TFilter('author_id', '=', "{$object->author_id}"));
            }
            
            if ($object->collection_id)
            {
                $criteria->add(new TFilter('collection_id', '=', "{$object->collection_id}"));
            }
           
            $books = $repository->load($criteria);
            $format  = $object->output_type;
            
            if ($books)
            {
                $widths = array(40, 120, 190, 65, 65);
                
                switch ($format)
                {
                    case 'pdf':
                        $tr = new TTableWriterPDF($widths);
                        break;
                    case 'rtf':
                        $tr = new TTableWriterRTF($widths);
                        break;
                    case 'xls':
                        $tr = new TTableWriterXLS($widths);
                        break;
                }
                
                // create the document styles
                $tr->addStyle('title', 'Arial', '10', 'B',   '#ffffff', '#A3A3A3');
                $tr->addStyle('datap', 'Arial', '10', '',    '#000000', '#EEEEEE');
                $tr->addStyle('datai', 'Arial', '10', '',    '#000000', '#ffffff');
                $tr->addStyle('header', 'Arial', '16', '',   '#ffffff', '#6B6B6B');
                $tr->addStyle('footer', 'Times', '10', 'I',  '#000000', '#A3A3A3');
                
                // add a header row
                $tr->addRow();
                $tr->addCell(_t('Books'), 'center', 'header', 5);
                
                // add titles row
                $tr->addRow();
                $tr->addCell(_t('Code'),       'left', 'title');
                $tr->addCell(_t('Author'),     'left', 'title');
                $tr->addCell(_t('Title'),      'left', 'title');
                $tr->addCell(_t('Edition'),    'left', 'title');
                $tr->addCell(_t('Collection'), 'left', 'title');
                
                // controls the background filling
                $colour= FALSE;
                
                // data rows
                foreach ($books as $book)
                {
                    $style = $colour ? 'datap' : 'datai';
                    $tr->addRow();
                    $tr->addCell($book->id,                     'left', $style);
                    $tr->addCell($book->author_name,            'left', $style);
                    $tr->addCell($book->title,                  'left', $style);
                    $tr->addCell($book->edition,                'left', $style);
                    $tr->addCell($book->collection_description, 'left', $style);
                    
                    $colour = !$colour;
                }
                
                // footer row
                $tr->addRow();
                $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 5);
                
                // stores the file
                $tr->save("app/output/books.{$format}");
                
                if (OS == 'WIN')
                {
                    parent::openFile("app\output\books.{$format}");
                }
                else
                {
                    parent::openFile("app/output/books.{$format}");
                }
                
                // shows the success message
                new TMessage('info', _t('Report generated'));
            }
            else
            {
                new TMessage('error', _t('No records found'));
            }
    
            // fill the form with the active record data
            $this->form->setData($object);
            
            // close the transaction
            TTransaction::close();
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', '<b>Error</b> ' . $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
