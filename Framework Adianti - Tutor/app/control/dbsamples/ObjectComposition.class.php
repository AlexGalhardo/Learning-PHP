<?php
class ObjectComposition extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transaчуo
            $customer= new Customer(4); // carrega o cliente 4
            
            $contact1 = new Contact;
            $contact2 = new Contact;

            $contact1->type  = 'fone';
            $contact1->value = '78 2343-4545';
            $contact2->type  = 'fone';
            $contact2->value = '78 9494-0404';
            
            $customer->addContact($contact1);
            $customer->addContact($contact2);
            
            $customer->store();
            
            new TMessage('info', 'Contatos adicionados');
            TTransaction::close(); // fecha a transaчуo.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>