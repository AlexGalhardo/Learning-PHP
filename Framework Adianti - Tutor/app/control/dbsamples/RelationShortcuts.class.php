<?php
class RelationShortcuts extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            echo '<pre>';
            TTransaction::open('samples'); // abre uma transação
            
            // simplified version, load related objects (1-N)
            $contacts = Customer::find(1)->hasMany('Contact');
            var_dump($contacts);
            
            // complete version, load related objects (1-N)
            $contacts = Customer::find(1)->hasMany('Contact', 'customer_id', 'id', 'type');
            var_dump($contacts);
                        
            // simplified version, filter related objects (1-N), and then load
            $contacts = Customer::find(1)->filterMany('Contact')->where('type', '=', 'MSN')->load();
            var_dump($contacts);
            
            // complete version, filter related objects (1-N), and then load
            $contacts = Customer::find(1)->filterMany('Contact', 'customer_id', 'id', 'type')->where('type', '=', 'MSN')->load();
            var_dump($contacts);
            
            // simplified version, load related objects (N-N), through associative table (pivot)
            $skills = Customer::find(1)->belongsToMany('Skill');
            var_dump($skills);
            
            // complete version, load related objects (N-N), through associative table (pivot)
            $skills = Customer::find(1)->belongsToMany('Skill', 'CustomerSkill', 'customer_id', 'skill_id');
            var_dump($skills);
            
            echo '</pre>';
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
