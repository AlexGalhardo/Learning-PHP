<?php
/**
 * FormReusableView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FormReusableView extends BootstrapFormBuilder
{
    public function __construct()
    {
        parent::__construct();
        parent::setFormTitle('Form reusable');
        
        $id      = new TEntry('id');
        $name    = new TEntry('name');
        $address = new TEntry('address');
        $phone   = new TEntry('phone');
        $email   = new TEntry('email');
        $gender  = new TCombo('gender');
        $status  = new TCombo('status');
        
        parent::addFields( [new TLabel('Id')], [$id] );
        parent::addFields( [new TLabel('Name')], [$name] );
        parent::addFields( [new TLabel('Address')], [$address] );
        parent::addFields( [new TLabel('Phone')], [$phone] );
        parent::addFields( [new TLabel('Email')], [$email] );
        parent::addFields( [new TLabel('Gender')], [$gender] );
        parent::addFields( [new TLabel('Status')], [$status] );
        
        $gender->addItems( [ 'M' => 'Male', 'F' => 'Female' ] );
        $status->addItems( [ 'S' => 'Single', 'C' => 'Committed', 'M' => 'Married' ] );
    }
}
