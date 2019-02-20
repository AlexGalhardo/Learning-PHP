<?php
class EmbeddedPDFView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $object = new TElement('object');
        $object->data  = 'http://www.adianti.com.br/framework_files/adianti_framework.pdf';
        $object->type  = 'application/pdf';
        $object->style = "width: 100%; height:600px";
        
        parent::add($object);
    }
}
