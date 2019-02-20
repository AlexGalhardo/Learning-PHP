<?php
class CommandLineFacade
{
    public function getCustomers()
    {
        TTransaction::open('samples');
        $customers = Customer::getObjects();
        var_dump($customers);
        TTransaction::close();
    }
}
?>