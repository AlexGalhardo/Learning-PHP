<?php
/**
 * HomeView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class HomeView extends TPage
{
    private $label;
    private $source;
    
    public function __construct($param)
    {
        parent::__construct($param);
        
        $xml = simplexml_load_file('menu.xml');
        foreach ($xml as $xmlElement)
        {
            $atts   = $xmlElement->attributes();
            $index  = $this->translateLabel( (string) $atts['label'] );
            if (empty($param['menu']) OR $index == _t($param['menu']))
            {
                if ($xmlElement->menu)
                {
                    foreach ($xmlElement->menu->menuitem as $subXmlElement)
                    {
                        $subindex = $this->translateLabel( (string) $subXmlElement['label'] );
                        $subatts   = $subXmlElement->attributes();
                        
                        if (empty($param['submenu']) OR $subindex == _t($param['submenu']))
                        {
                            $items = [];
                            if ($subXmlElement->menu)
                            {
                                foreach ($subXmlElement->menu->menuitem as $option)
                                {
                                    $optatts   = $option->attributes();
                                    $label  = $this->translateLabel( (string) $option['label'] );
                                    
                                    $action = (string) $option-> action;
                                    $icon   = str_replace('fa:', 'fa fa-', (string) $option-> icon);
                                    if (!empty($label))
                                    {
                                        $items[] = array('label'  => $label,
                                                          'action' => str_replace('#', '&', $action),
                                                          'icon'   => $icon);
                                    }
                                    if ($option->menu)
                                    {
                                        foreach ($option->menu->menuitem as $option2)
                                        {
                                            $optatts   = $option2->attributes();
                                            $label  = $this->translateLabel( (string) $option2['label'] );
                                            $action = (string) $option2-> action;
                                            $icon   = str_replace('fa:', 'fa fa-', (string) $option2-> icon);
                                            if (!empty($label))
                                            {
                                                $items[] = array('label'  => $label,
                                                                  'action' => str_replace('#', '&', $action),
                                                                  'icon'   => $icon);
                                            }
                                        }
                                    }
                                }
                            }
                            
                            $items = $this->sortItems($items);
                            $this->html = new THtmlRenderer('app/resources/home.html');
                            $this->html->enableSection('main', ['menu' => $index,
                                                                'submenu' => $subindex ] );
                            $this->html->enableSection('items', $items, TRUE);
                            $this->html->enableTranslation();
                            
                            $element = new TElement('div');
                            $element->style = 'margin-bottom:30px; clear:both';
                            parent::add($this->html);
                            parent::add($element);
                        }
                    }
                }
            }
        }
        

    }
    
    /**
     * Sort items in two columns
     */
    public function sortItems($items)
    {
        $new_items = [];
        $idx_col1 = 0;
        $idx_col2 = 1;
        
        foreach ($items as $key => $item)
        {
            if ($key < ( count($items) /2 ))
            {
                $new_items[$idx_col1] = $item;
                $idx_col1 +=2;
            }
            else
            {
                $new_items[$idx_col2] = $item;
                $idx_col2 +=2;
            }
        }
        ksort($new_items);
        return $new_items;
    }
    
    /**
     * Translate label
     */
    public function translateLabel($label)
    {
        if (substr($label, 0, 3) == '_t{')
        {
            return _t(substr($label,3,-1));
        }
        
        return $label;
    }
}
