<?php
class ExecuteSample extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            /**
             * Aqui vai o código
             */
             
            throw new Exception('sdf');
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>