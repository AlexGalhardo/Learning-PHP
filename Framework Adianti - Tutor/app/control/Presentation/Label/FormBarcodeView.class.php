<?php
/**
 * FormBarcodeView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormBarcodeView extends TPage
{
    private $form;
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // create the form
        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle(_t('Barcode'));
        
        // create the form fields
        $method   = new TCombo('method');
        $template = new TText('template');
        
        $method->addItems( [ 'C39' => 'C39', 'C39+' => 'C39+', 'C39E' => 'C39E', 'C39E+' => 'C39E+', 'C93' => 'C93', 'S25' => 'S25', 'S25+' => 'S25+', 'I25' => 'I25', 'I25+' => 'I25+', 'C128' => 'C128', 'C128A' => 'C128A', 'C128B' => 'C128B', 'C128C' => 'C128C', 'EAN2' => 'EAN2', 'EAN5' => 'EAN5', 'EAN8' => 'EAN8', 'EAN13' => 'EAN13', 'UPCA' => 'UPCA', 'UPCE' => 'UPCE', 'MSI' => 'MSI', 'MSI+' => 'MSI+', 'POSTNET' => 'POSTNET', 'PLANET' => 'PLANET', 'RMS4CC' => 'RMS4CC', 'KIX' => 'KIX', 'IMB' => 'IMB', 'CODABAR' => 'CODABAR', 'CODE11' => 'CODE11', 'PHARMA' => 'PHARMA', 'PHARMA2T' => 'PHARMA2T'] );
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Method')],    [$method] );
        $this->form->addFields( [new TLabel('Template')],  [$template] );
        
        $template->setSize('100%', 100);
        
        $label  = '' . "\n";
        $label .= '<b>Código</b>: {$id}' . "\n";
        $label .= '<b>Nome</b>: {$description}' . "\n";
        $label .= '#barcode#' . "\n";
        $label .= '        {$barcode}';
        
        $method->setValue('EAN13');
        $template->setValue($label);
        
        // define the form action 
        $this->form->addAction('Send', new TAction(array($this, 'onSend')), 'fa:check-circle-o green');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Simulates an save button
     * Show the form content
     */
    public function onSend($param)
    {
        try
        {
            $data = $this->form->getData();
            $this->form->setData($data);
            
            $properties['barcodeMethod'] = $data->method;
            $properties['leftMargin']    = 12;
            $properties['topMargin']     = 12;
            $properties['labelWidth']    = 64;
            $properties['labelHeight']   = 54;
            $properties['spaceBetween']  = 4;
            $properties['rowsPerPage']   = 5;
            $properties['colsPerPage']   = 3;
            $properties['fontSize']      = 12;
            $properties['barcodeHeight'] = 15;
            $properties['imageMargin']   = 0;
            
            $generator = new AdiantiBarcodeDocumentGenerator;
            $generator->setProperties($properties);
            $generator->setLabelTemplate($data->template);
            
            TTransaction::open('samples');
            $products = Product::all();
            
            foreach ($products as $product)
            {
                $product->barcode     = str_pad($product->id, 10, '0', STR_PAD_LEFT);
                $product->description = substr($product->description, 0, 15);
                $generator->addObject($product);
            }
            
            $generator->setBarcodeContent('barcode');
            $generator->generate();
            $generator->save('app/output/barcodes.pdf');
            
            $window = TWindow::create(_t('Barcode'), 0.8, 0.8);
            $object = new TElement('object');
            $object->data  = 'app/output/barcodes.pdf';
            $object->type  = 'application/pdf';
            $object->style = "width: 100%; height:calc(100% - 10px)";
            $window->add($object);
            $window->show();
            
            TTransaction::close();
            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
