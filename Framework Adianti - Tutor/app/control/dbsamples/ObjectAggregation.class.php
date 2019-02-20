<?php
class ObjectAggregation extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transa��o
            $customer= new Customer(4); // carrega o cliente 4
            $customer->addSkill(new Skill(1));
            $customer->addSkill(new Skill(2));
            $customer->store();
            new TMessage('info', 'Habilidades adicionadas');
            TTransaction::close(); // fecha a transa��o.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>