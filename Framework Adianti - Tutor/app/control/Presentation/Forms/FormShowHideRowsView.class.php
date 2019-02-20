<?php
/**
 * FormShowHideRowsView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormShowHideRowsView extends TPage
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
        $this->form = new BootstrapFormBuilder('form_show_hide');
        $this->form->setFormTitle(_t('Show/hide rows'));
        
        // create the form fields
        $type        = new TCombo('type');
        $item_price  = new TEntry('item_price');
        $units       = new TEntry('units');
        $hour_price  = new TEntry('hour_price');
        $hours       = new TEntry('hours');
        
        $type->setChangeAction(new TAction(array($this, 'onChangeType')));
        $combo_items = array();
        $combo_items['p'] ='Product';
        $combo_items['s'] ='Service';
        $type->addItems($combo_items);
        
        // default value
        $type->setValue('p');
        
        // fire change event
        self::onChangeType( ['type' => 'p'] );
        
        // add the fields inside the form
        $this->form->addFields( [new TLabel('Type')],       [$type] );
        $this->form->addFields( [new TLabel('Item price')], [$item_price] );
        $this->form->addFields( [new TLabel('Units')],      [$units] );
        $this->form->addFields( [new TLabel('Hour price')], [$hour_price] );
        $this->form->addFields( [new TLabel('Hours')],      [$hours] );
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Event executed when type is changed
     */
    public static function onChangeType($param)
    {
        if ($param['type'] == 'p')
        {
            TQuickForm::showField('form_show_hide', 'item_price');
            TQuickForm::showField('form_show_hide', 'units');
            TQuickForm::hideField('form_show_hide', 'hour_price');
            TQuickForm::hideField('form_show_hide', 'hours');
        }
        else
        {
            TQuickForm::hideField('form_show_hide', 'item_price');
            TQuickForm::hideField('form_show_hide', 'units');
            TQuickForm::showField('form_show_hide', 'hour_price');
            TQuickForm::showField('form_show_hide', 'hours');
        }
    }
}
