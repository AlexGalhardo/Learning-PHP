<?php
/**
 * SystemMenuUpdate
 *
 * @version    1.0
 * @package    control
 * @subpackage admin
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class SystemMenuUpdate extends TPage
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        parent::__construct();
        
        if (TSession::getValue('login') !== 'admin')
        {
            new TMessage('error',  _t('Permission denied') );
            return;
        }
    }
    
    /**
     * Ask for Update menu
     */
    public function onAskUpdate()
    {
        try
        {
            if (!file_exists('menu-dist.xml'))
            {
                throw new Exception(_t('File not found') . ':<br> menu-dist.xml');
            }
            
            $action = new TAction(array($this, 'onUpdateMenu'));
            new TQuestion(_t('Update menu overwriting existing file?'), $action);
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
    
    /**
     * Update menu
     */
    public static function onUpdateMenu($param)
    {
        try
        {
            if (file_exists('menu.xml') AND is_writable('menu.xml'))
            {
                $new_menu = SystemPageService::getMenu();
                copy('menu-dist.xml', 'menu.xml');
                
                $menu = new TMenuParser('menu.xml');
                
                foreach ($new_menu as $module => $properties)
                {
                    if (!$menu->moduleExists( $module ))
                    {
                        $menu->appendModule( $module, str_replace('fa-', 'fa:', $properties->icon) . ' fa-fw ' . $properties->color );
                    }
                    
                    if ($properties->items)
                    {
                        foreach ($properties->items as $item => $item_properties)
                        {
                            $menu->appendPage( $module, $item_properties->label, $item_properties->action, str_replace('fa-', 'fa:', $item_properties->icon) . ' fa-fw ' . $item_properties->icon_color);
                        }
                    }
                }
                
                new TMessage('info', _t('Menu updated successfully'));
                TScript::create('setTimeout(function(){ location.reload(); },1000)');
            }
            else
            {
                throw new Exception(_t('Permission denied') . ':<br> menu.xml');
            }
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
