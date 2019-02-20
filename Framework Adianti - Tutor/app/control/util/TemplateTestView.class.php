<?php
/**
 * Template View pattern implementation
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class TemplateTestView extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        // load the styles
        TPage::include_css('app/resources/styles.css');
        
        // create the HTML Renderer
        $this->html = new THtmlRenderer('app/resources/teste.html');

        try
        {
            $replace = array();
            $replace['level1'] = [ [ 'content1'  => 'Content 1',
                                     'level2' => [ [ 'content2'=> 'Content 2',
                                                     'level3'=> [ [
                                                         'content3' => 'Content3',
                                                         'level4' => [ [
                                                            'content4'  => 'Content4',
                                                            'level5' => [ [
                                                                'content5' => 'Content5'
                                                            ] ]
                                                            ]] ] ] ] ] ] ];
                                                      
            // replace the main section variables
            $this->html->enableSection('main', $replace);
            
            parent::add($this->html);            
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
