<?php
/**
 * LoanReport Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class LoanReport extends TPage
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
        $this->form = new BootstrapFormBuilder('form_Loan');
        $this->form->setFormTitle( _t('Report filters') );

        // create the form fields
        $member_id    = new TDBSeekButton('member_id', 'library', 'form_Loan', 'Member', 'name', 'member_id', 'member_name');
        $member_name  = new TEntry('member_name');
        $barcode      = new TSeekButton('barcode_input');
        $book_title   = new TEntry('book_title_input');
        $loan_date1   = new TDate('loan_date1');
        $loan_date2   = new TDate('loan_date2');
        $output_type  = new TRadioGroup('output_type');
        $output_type->setUseButton();
        
        $obj = new ItemSeek;
        $action = new TAction(array($obj, 'onReload'));
        $barcode->setAction($action);
        
        $options=array();
        $options['pdf']  = 'PDF';
        $options['rtf']  = 'RTF';
        $options['xls']  = 'XLS';
        $output_type->addItems($options);
        $output_type->setValue('pdf');
        $output_type->setLayout('horizontal');
        
        // define the sizes
        $member_name->setEditable(FALSE);
        $book_title->setEditable(FALSE);
        $member_id->setSize('calc(20% - 22px)');
        $barcode->setSize('calc(20% - 22px)');
        $member_name->setSize('80%');
        $book_title->setSize('80%');
        $member_id->setAuxiliar($member_name);
        $barcode->setAuxiliar($book_title);
        $loan_date1->setSize('50%');
        $loan_date2->setSize('50%');
        $loan_date1->setMask('yyyy-mm-dd');
        $loan_date2->setMask('yyyy-mm-dd');
        
        $this->form->addFields( [new TLabel(_t('Member'))], [$member_id ] );
        $this->form->addFields( [new TLabel(_t('Barcode'))], [$barcode ] );
        $this->form->addFields( [new TLabel(_t('Loan date'))], [$loan_date1, $loan_date2] );
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
            
            // get the form data into an active record Loan
            $object = $this->form->getData();
            
            $repository = new TRepository('Loan');
            $criteria   = new TCriteria;
            if ($object->member_id)
            {
                $criteria->add(new TFilter('member_id', '=', "{$object->member_id}"));
            }
            
            if ($object->barcode_input)
            {
                $criteria->add(new TFilter('(SELECT barcode FROM item where id=loan.item_id)', '=', "{$object->barcode_input}"));
            }
            
            if ($object->loan_date1)
            {
                $criteria->add(new TFilter('loan_date', '>=', "{$object->loan_date1}"));
            }
            
            if ($object->loan_date2)
            {
                $criteria->add(new TFilter('loan_date', '<=', "{$object->loan_date2}"));
            }
           
            $loans = $repository->load($criteria);
            $format  = $object->output_type;
            
            if ($loans)
            {
                $widths = array(70, 190, 100, 70, 70);
                
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
                $tr->addCell(_t('Loans'), 'center', 'header', 5);
                
                // add titles row
                $tr->addRow();
                $tr->addCell(_t('Barcode'),     'center', 'title');
                $tr->addCell(_t('Title'),       'left', 'title');
                $tr->addCell(_t('Name'),        'left', 'title');
                $tr->addCell(_t('Loan date'),   'left', 'title');
                $tr->addCell(_t('Arrive date'), 'left', 'title');
                
                // controls the background filling
                $colour= FALSE;
                
                // data rows
                foreach ($loans as $loan)
                {
                    $style = $colour ? 'datap' : 'datai';
                    $tr->addRow();
                    $tr->addCell($loan->item->barcode, 'center', $style);
                    $tr->addCell($loan->book_title,    'left', $style);
                    $tr->addCell($loan->member_name,   'left', $style);
                    $tr->addCell($loan->loan_date,     'left', $style);
                    $tr->addCell($loan->arrive_date,   'left', $style);
                    
                    $colour = !$colour;
                }
                
                // footer row
                $tr->addRow();
                $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 5);
                
                // stores the file
                $tr->save("app/output/loans.{$format}");
                
                if (OS == 'WIN')
                {
                    parent::openFile("app\output\loans.{$format}");
                }
                else
                {
                    parent::openFile("app/output/loans.{$format}");
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
            new TMessage('error', $e->getMessage());
            
            // undo all pending operations
            TTransaction::rollback();
        }
    }
}
