<?php
/**
 * PDF Designed Shapes
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PDFDesignShapesView extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Designed PDF shapes'));
        
        // create the form fields
        $name = new TEntry('name');
        
        $this->form->addFields( [new TLabel('Name', 'red')], [$name] );
        $this->form->addAction('Generate', new TAction(array($this, 'onGenerate')), 'fa:check-circle-o green');
        
        $name->addValidation('Name', new TRequiredValidator);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }

    /**
     * method onGenerate()
     * Executed whenever the user clicks at the generate button
     */
    function onGenerate()
    {
        try
        {
            $data = $this->form->getData();
            $this->form->validate();
            
            $designer = new TPDFDesigner;
            $designer->fromXml('app/reports/forms.pdf.xml');
            $designer->replace('{name}', $data->name );
            $designer->generate();
            
            $designer->gotoAnchorXY('anchor1');
            $designer->SetFontColorRGB('#FF0000');
            $designer->SetFont('Arial', 'B', 18);
            $designer->Write(20, 'Dynamic text !');
            
            $file = 'app/output/pdf_shapes.pdf';            
            if (!file_exists($file) OR is_writable($file))
            {
                $designer->save($file);
                // parent::openFile($file);
                
                $window = TWindow::create(_t('Designed PDF shapes'), 0.8, 0.8);
                $object = new TElement('object');
                $object->data  = $file;
                $object->type  = 'application/pdf';
                $object->style = "width: 100%; height:calc(100% - 10px)";
                $window->add($object);
                $window->show();
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $file);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
