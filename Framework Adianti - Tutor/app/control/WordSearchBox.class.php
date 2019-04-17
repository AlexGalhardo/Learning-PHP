<?php
/**
 * WordSearch Box
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class WordSearchBox extends TPage
{
    private $form;
    
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        $this->adianti_target_container = 'word-search-box';
        
        $this->form = new TForm('word_search_form');
        
        $input = new TEntry('input');
        $input->placeholder = _t('Search code');
        $input->setSize(170);
        $input->style = 'height:32px;';
        $input->setExitAction(new TAction(array($this, 'getResults')));
        $input->setCompletion(array_keys(AdiantiClassMap::getMap()));
        $this->form->add($input);
        $this->form->setFields(array($input));
        parent::add($this->form);
    }
    
    /**
     * Get search results
     */
    public static function getResults($param)
    {
        if (!empty($param['input']))
        {
            $new_params = ['input'=> $param['input']];
            AdiantiCoreApplication::loadPage('WordSearchResults', 'onLoad', $new_params);
        }
    }
    
    /**
     * Show this controller
     */
    public function show()
    {
        parent::show();
        TScript::create("$('#word_search_form input').on('keypress', function(e) {
                             if(e.keyCode == 13) {
                                 $(this).blur();
                                return false;
                             }
                        });
                        $('#word_search_form').submit(function() {
                          return false;
                        });
                        ");
    }
}
