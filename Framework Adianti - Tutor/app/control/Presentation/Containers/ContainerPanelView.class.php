<?php
/**
 * ContainerPanelView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ContainerPanelView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates a panel
        $panel = new TPanel(480, 260);
        $panel->style = "background-image: url(app/images/background.png);";
        
        // creates a label with the title
        $titulo = new TLabel('Panel Layout');
        $titulo->setFontSize(18);
        $titulo->setFontFace('Arial');
        $titulo->setFontColor('red');
        
        // put the title label in the panel
        $panel->put($titulo, 120, 4);
        
        $imagem = new TImage('app/images/mouse.png');
        // put the image in the panel
        $panel->put($imagem, 260, 140);
        
        // create the input widgets
        $id         = new TEntry('id');
        $name       = new TEntry('name');
        $address    = new TEntry('address');
        $telephone  = new TEntry('telephone');
        $city       = new TCombo('city');
        
        $items      = array();
        $items['1'] = 'Porto Alegre';
        $items['2'] = 'Lajeado';
        
        // add the options to the combo
        $city->addItems($items);
        
        // adjust the size of the fields
        $id->setSize(70);
        $name->setSize(140);
        $address->setSize(140);
        $telephone->setSize(140);
        $city->setSize(140);
        
        // create the labels
        $label1 = new TLabel('Code');
        $label2 = new TLabel('Name');
        $label3 = new TLabel('City');
        $label4 = new TLabel('Address');
        $label5 = new TLabel('Telephone');
        
        // put the widgets in the panel
        $panel->put($label1,    10,  40);
        $panel->put($id,        10,  60);
        $panel->put($label2,    30,  90);
        $panel->put($name,      40, 110);
        $panel->put($label3,   100, 140);
        $panel->put($city,     100, 160);
        $panel->put($label4,   230,  40);
        $panel->put($address,  230,  60);
        $panel->put($label5,   200,  90);
        $panel->put($telephone,200, 110);
        
        $label6=new TLabel('Obs');
        $label6->setFontStyle('b');
        $label6->setValue('PS: The panel background is just for understanding purposes.');
        $panel->put($label6,   2,   237);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($panel);
        
        parent::add($vbox);
    }
}
