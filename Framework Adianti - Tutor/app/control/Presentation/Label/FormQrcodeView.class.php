<?php
/**
 * FormQrcodeView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormQrcodeView extends TPage
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
        $this->form->setFormTitle(_t('QRCode'));
        
        // create the form fields
        $template = new TText('template');
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Template')],  [$template] );
        
        $template->setSize('80%', 100);
        
        $label  = '' . "\n";
        $label .= '<b>Código</b>: {$id}' . "\n";
        $label .= '<b>Nome</b>: {$description}' . "\n";
        $label .= '#qrcode#' . "\n";
        $label .= '{$id_pad}';
        
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
            
            $properties['leftMargin']    = 12;
            $properties['topMargin']     = 12;
            $properties['labelWidth']    = 64;
            $properties['labelHeight']   = 54;
            $properties['spaceBetween']  = 4;
            $properties['rowsPerPage']   = 5;
            $properties['colsPerPage']   = 3;
            $properties['fontSize']      = 12;
            $properties['barcodeHeight'] = 20;
            $properties['imageMargin']   = 0;
            
            $generator = new AdiantiBarcodeDocumentGenerator;
            $generator->setProperties($properties);
            $generator->setLabelTemplate($data->template);
            
            TTransaction::open('samples');
            $products = Product::all();
            
            foreach ($products as $product)
            {
                $product->id_pad      = str_pad($product->id, 10, '0', STR_PAD_LEFT);
                $product->description = substr($product->description, 0, 15);
                $generator->addObject($product);
            }
            
            
            $generator->setBarcodeContent('{id}-{description}');
            $generator->generate();
            $generator->save('app/output/qrcodes.pdf');
            
            $window = TWindow::create(_t('QRCode'), 0.8, 0.8);
            $object = new TElement('object');
            $object->data  = 'app/output/qrcodes.pdf';
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
