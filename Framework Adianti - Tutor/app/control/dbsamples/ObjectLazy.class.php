<?php
class ObjectLazy extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            
            $customer= new Customer(4); // carrega o cliente 4
            echo $customer->city->name; // chama get_city()
            echo '<br>';
            echo $customer->city_name;  // chama get_city_name()
            
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>