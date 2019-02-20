<?php
/**
 * MemberReport Registration
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class MemberReport extends TPage
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
        $this->form = new BootstrapFormBuilder('form_Member_Report');
        $this->form->setFormTitle( _t('Report filters') );

        // create the form fields
        $name            = new TEntry('name');
        $city_id         = new TDBSeekButton('city_id', 'library', 'form_Member_Report', 'City', 'name', 'city_id', 'city_name');
        $city_name       = new TEntry('city_name');
        $category_id     = new TDBCombo('category_id', 'library', 'Category', 'id', 'description');
        $output_type     = new TRadioGroup('output_type');
        $output_type->setUseButton();
        
        $options=array();
        $options['pdf']  = 'PDF';
        $options['rtf']  = 'RTF';
        $options['xls']  = 'XLS';
        $output_type->addItems($options);
        $output_type->setValue('pdf');
        $output_type->setLayout('horizontal');
        $category_id->enableSearch();
        
        // define the sizes
        $name->setSize('100%');
        $city_id->setSize('calc(20% - 22px)');
        $city_name->setSize('80%');
        $city_id->setAuxiliar( $city_name );
        $category_id->setSize('100%');
        $city_name->setEditable(FALSE);
        
        $this->form->addFields( [new TLabel(_t('Name'))], [$name] );
        $this->form->addFields( [new TLabel(_t('City'))], [$city_id ] );
        $this->form->addFields( [new TLabel(_t('Category'))], [$category_id] );
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
            
            // get the form data into an active record Member
            $object = $this->form->getData();
            
            $repository = new TRepository('Member');
            $criteria   = new TCriteria;
            if ($object->name)
            {
                $criteria->add(new TFilter('name', 'like', "%{$object->name}%"));
            }
            
            if ($object->city_id)
            {
                $criteria->add(new TFilter('city_id', '=', "{$object->city_id}"));
            }
            
            if ($object->category_id)
            {
                $criteria->add(new TFilter('category_id', '=', "{$object->category_id}"));
            }
           
            $members = $repository->load($criteria);
            $format  = $object->output_type;
            
            if ($members)
            {
                $widths = array(40, 150, 80, 140, 80);
                
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
                $tr->addCell(_t('Members'), 'center', 'header', 5);
                
                // add titles row
                $tr->addRow();
                $tr->addCell(_t('Code'),     'left', 'title');
                $tr->addCell(_t('Name'),     'left', 'title');
                $tr->addCell(_t('Category'), 'left', 'title');
                $tr->addCell(_t('Email'),    'left', 'title');
                $tr->addCell(_t('Phone'),    'left', 'title');
                
                // controls the background filling
                $colour= FALSE;
                
                // data rows
                foreach ($members as $member)
                {
                    $style = $colour ? 'datap' : 'datai';
                    $tr->addRow();
                    $tr->addCell($member->id,                   'left', $style);
                    $tr->addCell($member->name,                 'left', $style);
                    $tr->addCell($member->category_description, 'left', $style);
                    $tr->addCell($member->email,                'left', $style);
                    $tr->addCell($member->phone_number,         'left', $style);
                    
                    $colour = !$colour;
                }
                
                // footer row
                $tr->addRow();
                $tr->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 5);
                
                // stores the file
                $tr->save("app/output/members.{$format}");
                
                if (OS == 'WIN')
                {
                    parent::openFile("app\output\members.{$format}");
                }
                else
                {
                    parent::openFile("app/output/members.{$format}");
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
