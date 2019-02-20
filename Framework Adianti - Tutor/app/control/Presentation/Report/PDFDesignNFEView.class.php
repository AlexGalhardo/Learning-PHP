<?php
/**
 * PDF Designed Customer report
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class PDFDesignNFEView extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form and a inner table
        $this->form = new TForm('form_pdf_nfe');
        $table = new TTable;
        $this->form->add($table);

        // creates an action button
        $save_button = new TButton('generate');
        $save_button->setAction(new TAction(array($this, 'onGenerate')), 'Generate');
        $save_button->setImage('fa:check-circle-o green');

        // add a row for the form action
        $table->addRowSet($save_button);

        // define wich are the form fields
        $this->form->setFields(array($save_button));
        
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
            $designer = new TPDFDesigner;
            $designer->fromXml('app/reports/nfe.pdf.xml');
            $designer->generate();
            
            $designer->SetFont('Arial', 'B', 8);
            $designer->setFontColorRGB( '#4C4491' );
            $designer->writeAtAnchor('for_ie',        '23234234234');
            $designer->writeAtAnchor('for_cnpj',      '001.111.222.0001/00');
            $designer->writeAtAnchor('nome',          utf8_decode('Cliente demonstração da silva'));
            $designer->writeAtAnchor('endereco',      utf8_decode('Rua das demonstrações'));
            $designer->writeAtAnchor('bairro',        'Centro');
            $designer->writeAtAnchor('municipio',     'Cidade teste');
            $designer->writeAtAnchor('fone',          '(11) 1234-5678');
            $designer->writeAtAnchor('uf',            'RS');
            $designer->writeAtAnchor('ie',            '45645645656');
            $designer->writeAtAnchor('cep',           '00.0000-000');
            $designer->writeAtAnchor('cnpjcpf',       '000.000.000-00');
            $designer->writeAtAnchor('dataemissao',   '12/12/1912');
            $designer->writeAtAnchor('dataentrada',   '12/12/1912');
            $designer->writeAtAnchor('datasaida',     '12/12/1912');
            $designer->writeAtAnchor('protocolo',     '1234567890');
            $designer->writeAtAnchor('valor_produtos','1.000,00');
            $designer->writeAtAnchor('frete',         '100,00');
            $designer->writeAtAnchor('desconto',      '50,00');
            $designer->writeAtAnchor('valor_nota',    '1.050,00');
            $designer->writeAtAnchor('complementares',utf8_decode('Obs: Esta é a observação.'));
            
            $designer->gotoAnchorXY('details');
            $designer->SetFont('Arial', '', 8);
            $designer->Cell( 62, 10, '12121212', 1, 0, 'C');
            $designer->Cell(140, 10, utf8_decode('Guaraná'), 1, 0, 'L');
            $designer->Cell( 30, 10, '999', 1, 0, 'C');
            $designer->Cell( 15, 10, '', 1, 0, 'C');
            $designer->Cell( 20, 10, '', 1, 0, 'C');
            $designer->Cell( 20, 10, 'PC', 1, 0, 'C');
            $designer->Cell( 35, 10, '100', 1, 0, 'C');
            $designer->Cell( 30, 10, '5,00', 1, 0, 'R');
            $designer->Cell( 24, 10, '0,25', 1, 0, 'R');
            $designer->Cell( 24, 10, '500', 1, 0, 'R');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '0', 1, 0, 'R');
            $designer->Cell( 20, 10, '0', 1, 0, 'R');
            $designer->Cell( 20, 10, '0', 1, 0, 'R');
            
            $designer->Ln(10);
            $designer->gotoAnchorX('details');
            $designer->Cell( 62, 10, '12121212', 1, 0, 'C');
            $designer->Cell(140, 10, utf8_decode('Chocolate'), 1, 0, 'L');
            $designer->Cell( 30, 10, '999', 1, 0, 'C');
            $designer->Cell( 15, 10, '', 1, 0, 'C');
            $designer->Cell( 20, 10, '', 1, 0, 'C');
            $designer->Cell( 20, 10, 'PC', 1, 0, 'C');
            $designer->Cell( 35, 10, '100', 1, 0, 'C');
            $designer->Cell( 30, 10, '5,00', 1, 0, 'R');
            $designer->Cell( 24, 10, '0,25', 1, 0, 'R');
            $designer->Cell( 24, 10, '500', 1, 0, 'R');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '', 1, 0, 'L');
            $designer->Cell( 24, 10, '0', 1, 0, 'R');
            $designer->Cell( 20, 10, '0', 1, 0, 'R');
            $designer->Cell( 20, 10, '0', 1, 0, 'R');
            
            $file = 'app/output/nfe.pdf';
            
            if (!file_exists($file) OR is_writable($file))
            {
                $designer->save($file);
                //parent::openFile($file);
                
                $window = TWindow::create(_t('Designed PDF NFE'), 0.8, 0.8);
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
?>
