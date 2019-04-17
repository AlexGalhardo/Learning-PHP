<?php
class FormScreenLabelsView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // barcodes
        $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
        $bar1 = $generator->getBarcode('1231723897', $generator::TYPE_CODE_128, 5, 100);
        $bar2 = $generator->getBarcode('1231723897', $generator::TYPE_EAN_13, 5, 100);
        
        // qrcodes
        $renderer = new \BaconQrCode\Renderer\Image\Svg();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $renderer->setMargin(0);
        $writer = new \BaconQrCode\Writer($renderer);
        $qrcode = $writer->writeString('Hello World!');
        
        $panel = new TPanelGroup('Barcodes and QRCodes');
        $panel->add($bar1);
        $panel->add('<br>');
        $panel->add($bar2);
        $panel->add('<br>');
        $panel->add($qrcode);
        parent::add($panel);
    }
}
