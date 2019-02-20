<?php
/**
 * FormButtonStyleView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormButtonStyleView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        parent::include_css('app/resources/myframe.css');
        
        $vbox = new TVBox;
        
        $bt1a = new TButton('bt1a');
        $bt1b = new TButton('bt1b');
        $bt1c = new TButton('bt1c');
        
        $bt1a->setLabel('BS disk');
        $bt1b->setLabel('BS edit');
        $bt1c->setLabel('BS remove');
        
        $bt1a->setImage('bs:floppy-disk red');
        $bt1b->setImage('bs:edit green');
        $bt1c->setImage('bs:remove-circle blue');
        
        $hbox1 = new THBox;
        $hbox1->addRowSet( $bt1a, $bt1b, $bt1c );
        $frame1 = new TFrame;
        $frame1->setLegend('Bootstrap Glyphicons');
        $frame1->add($hbox1);
        
        $bt2a = new TButton('bt2a');
        $bt2b = new TButton('bt2b');
        $bt2c = new TButton('bt2c');
        
        $bt2a->setLabel('FA save');
        $bt2b->setLabel('FA edit');
        $bt2c->setLabel('FA trash');
        
        $bt2a->setImage('fa:save red');
        $bt2b->setImage('fa:edit green');
        $bt2c->setImage('fa:trash-o blue');
        
        $hbox2 = new THBox;
        $hbox2->addRowSet( $bt2a, $bt2b, $bt2c );
        $frame2 = new TFrame;
        $frame2->setLegend('Font awesome icons');
        $frame2->add($hbox2);
        
        $bt3a = new TButton('bt3a');
        $bt3b = new TButton('bt3b');
        $bt3c = new TButton('bt3c');
        
        $bt3a->setLabel('Warning');
        $bt3b->setLabel('Info');
        $bt3c->setLabel('Success');
        
        $bt3a->class = 'btn btn-warning btn-sm';
        $bt3b->class = 'btn btn-info';
        $bt3c->class = 'btn btn-success btn-lg';
        
        $hbox3 = new THBox;
        $hbox3->addRowSet( $bt3a, $bt3b, $bt3c );
        $frame3 = new TFrame;
        $frame3->setLegend('Bootstrap styles and sizes');
        $frame3->add($hbox3);
        
        $bt4a = new TButton('bt4a');
        $bt4b = new TButton('bt4b');
        $bt4c = new TButton('bt4c');
        
        $bt4a->setLabel('Popover 1');
        $bt4b->setLabel('Popover 2');
        $bt4c->setLabel('Popover 3');
        
        $bt4a->popover = 'true';
        $bt4a->popside = 'top';
        $bt4a->poptitle = 'Pop title 1';
        $bt4a->popcontent = 'This is the <br>popover for button 1';
        
        $bt4b->popover = 'true';
        $bt4b->popside = 'bottom';
        $bt4b->poptitle = 'Pop title 2';
        $bt4b->popcontent = 'This is the <br>popover for button 2';
        
        $bt4c->popover = 'true';
        $bt4c->popside = 'right';
        $bt4c->poptitle = 'Pop title 3';
        $bt4c->popcontent = 'This is the <br>popover for button 3';
        
        $hbox4 = new THBox;
        $hbox4->addRowSet( $bt4a, $bt4b, $bt4c );
        $frame4 = new TFrame;
        $frame4->setLegend('Buttons with popover');
        $frame4->add($hbox4);
        
        
        $bt5a = new TButton('bt5a');
        $bt5b = new TButton('bt5b');
        $bt5c = new TButton('bt5c');
        
        $bt5a->setLabel('Action 1');
        $bt5b->setLabel('Action 2');
        $bt5c->setLabel('Action 3');
        
        $bt5a->addFunction("alert('action 1');");
        $bt5b->addFunction("alert('going to another page');__adianti_load_page('index.php?class=FormQuickView');");
        $bt5c->addFunction("if (confirm('Want to go?') == true) { __adianti_load_page('index.php?class=ContainerWindowView'); }");
        
        $hbox5 = new THBox;
        $hbox5->addRowSet( $bt5a, $bt5b, $bt5c );
        $frame5 = new TFrame;
        $frame5->setLegend('Buttons with Javascript actions');
        $frame5->add($hbox5);
        
        $vbox->add($frame1);
        $vbox->add($frame2);
        $vbox->add($frame3);
        $vbox->add($frame4);
        $vbox->add($frame5);
        parent::add($vbox);
    }
}
?>