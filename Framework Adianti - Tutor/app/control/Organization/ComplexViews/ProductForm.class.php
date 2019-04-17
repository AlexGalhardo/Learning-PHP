<?php
/**
 * Product Form
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ProductForm extends TPage
{
    protected $form;
    
    // trait with onSave, onClear, onEdit, ...
    use Adianti\Base\AdiantiStandardFormTrait;
    
    // trait with saveFile, saveFiles, ...
    use Adianti\Base\AdiantiFileSaveTrait;
    
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_Product');
        $this->form->setFormTitle(_t('Product'));
        
        // define the database and the Active Record
        $this->setDatabase('samples');
        $this->setActiveRecord('Product');
        
        // create the form fields
        $id          = new TEntry('id');
        $description = new TEntry('description');
        $stock       = new TEntry('stock');
        $sale_price  = new TEntry('sale_price');
        $unity       = new TCombo('unity');
        $photo_path  = new TFile('photo_path');
        
        // allow just these extensions
        $photo_path->setAllowedExtensions( ['gif', 'png', 'jpg', 'jpeg'] );
        
        // enable progress bar, preview, and file remove actions
        $photo_path->enableFileHandling();
        
        $id->setEditable( FALSE );
        $unity->addItems( ['PC' => 'Pieces', 'GR' => 'Grain'] );
        $stock->setNumericMask(2, ',', '.', TRUE); // TRUE: process mask when editing and saving
        $sale_price->setNumericMask(2, ',', '.', TRUE); // TRUE: process mask when editing and saving
        
        // add the form fields
        $this->form->addFields( [new TLabel('ID', 'red')],          [$id] );
        $this->form->addFields( [new TLabel('Description', 'red')], [$description] );
        $this->form->addFields( [new TLabel('Stock', 'red')],       [$stock],
                                [new TLabel('Sale Price', 'red')],  [$sale_price] );
        $this->form->addFields( [new TLabel('Unity', 'red')],       [$unity] );
        $this->form->addFields( [new TLabel('Photo Path', 'red')],  [$photo_path] );
        
        $id->setSize('50%');
        
        $description->addValidation('Description', new TRequiredValidator);
        $stock->addValidation('Stock', new TRequiredValidator);
        $sale_price->addValidation('Sale Price', new TRequiredValidator);
        $unity->addValidation('Unity', new TRequiredValidator);
        $photo_path->addValidation('Photo Path', new TRequiredValidator);
        
        // add the actions
        $this->form->addAction( 'Save', new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addAction( 'Clear', new TAction([$this, 'onEdit']), 'fa:eraser red');
        $this->form->addActionLink( 'List', new TAction(['ProductList', 'onReload']), 'fa:table blue');

        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', 'ProductList'));
        $vbox->add($this->form);

        parent::add($vbox);
    }
    
    /**
     * Overloaded method onSave()
     * Executed whenever the user clicks at the save button
     */
    public function onSave()
    {
        try
        {
            TTransaction::open('samples');
            
            // form validations
            $this->form->validate();
            
            // get form data
            $data   = $this->form->getData();
            
            // store product
            $object = new Product;
            $object->fromArray( (array) $data);
            $object->store();
            
            // copy file to target folder
            $this->saveFile($object, $data, 'photo_path', 'files/images');
            
            // send id back to the form
            $data->id = $object->id;
            $this->form->setData($data);
            
            TTransaction::close();
            new TMessage('info', AdiantiCoreTranslator::translate('Record saved'));
        }
        catch (Exception $e)
        {
            $this->form->setData($this->form->getData());
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
