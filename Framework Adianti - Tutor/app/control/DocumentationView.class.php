<?php
/**
 * DocumentationView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class DocumentationView extends TWindow
{
    private $label;
    private $source;
    
    public function __construct()
    {
        // parent classs constructor
        parent::__construct();
        parent::setSize(0.95, 0.8);
        
        $config = AdiantiApplicationConfig::get();
        ini_set('highlight.comment', $config['highlight']['comment']);
        ini_set('highlight.default', $config['highlight']['default']);
        ini_set('highlight.html',    $config['highlight']['html']);
        ini_set('highlight.keyword', $config['highlight']['keyword']);
        ini_set('highlight.string',  $config['highlight']['string']);
        
        // scroll to put the source inside
        $wrapper = new TElement('div');
        $wrapper->class = 'sourcecodewrapper';
        
        $this->source = new TSourceCode;
        $wrapper->add($this->source);
        parent::add($wrapper);
    }
    
    /**
     * Method onHelp
     * Shows the source code for this sample, along with an explanation
     */
    function onHelp($param)
    {
        if (isset($param['classname']) AND $param['classname'])
        {
            $folder    = 'app/control';
            $classname = $param['classname'];
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder),
                                                   RecursiveIteratorIterator::SELF_FIRST) as $entry)
            {
                if (is_dir($entry))
                {
                    if (file_exists("{$entry}/{$classname}.class.php"))
                    {
                        $resource = str_replace('app/control', 'app/resources', "{$entry}/{$classname}.txt");
                        $this->source->loadFile("{$entry}/{$classname}.class.php");
                        parent::setTitle("{$entry}/{$classname}.class.php");
                        return;
                    }
                }
            }
        }
        else
        {
            $this->source->loadFile('index.php');
            parent::setTitle('index.php');
        }
    }
}
