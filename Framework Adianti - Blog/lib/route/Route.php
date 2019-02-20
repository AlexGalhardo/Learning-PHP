<?php
class Route
{
    public static $actions;
    
    public static function get($action, $callback)
    {
        $args = $_GET;
        if ( (isset($_GET['action']) AND $_GET['action'] == $action) OR
            (!isset($_GET['action']) AND $action == '') )
        {
            if (is_callable($callback))
            {
                call_user_func($callback, $_GET);
            }
        }
        self::$actions[$action] = $callback;
    }
    
    public static function run($action, $args)
    {
        call_user_func(self::$actions[$action], $args);
    }
}
