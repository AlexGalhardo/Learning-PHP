<?php
/**
 * Route translator
 *
 * @version    3.0
 * @package    core
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class AdiantiRouteTranslator
{
    public static function translate($url, $format = TRUE)
    {
        $routes = array();
        $routes['class=CustomerFormView&method=onEdit'] = 'customer-edit';
        $routes['class=CustomerDataGridView&method=onDelete'] = 'customer-delete';
        $routes['class=CustomerDataGridView&method=onReload'] = 'customer-list';
        
        $keys = array_map('strlen', array_keys($routes));
        array_multisort($keys, SORT_DESC, $routes);
        
        foreach ($routes as $pattern => $short)
        {
            if (strpos($url, $pattern) !== FALSE)
            {
                $url = str_replace($pattern.'&', $short.'?', $url);
                $url = str_replace($pattern, $short, $url);
                return $url;
            }
        }
        
        if ($format)
        {
            return 'index.php?'.$url;
        }
        
        return $url;
    }
}
