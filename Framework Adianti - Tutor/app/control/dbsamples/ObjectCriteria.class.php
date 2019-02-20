<?php
class ObjectCriteria extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            /**
             * Creates a criteria where the age is
             * less than 16 OR the age is greater than 60
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('age', '<', 16), TExpression::OR_OPERATOR);
            $criteria->add(new TFilter('age', '>', 60), TExpression::OR_OPERATOR);
            echo $criteria->dump();
            echo "<br>\n";
            
            /**
             * Creates a criteria where the age is
             * less than 16 OR the age is greater than 60
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('age', 'BETWEEN', 16, 60));
            echo $criteria->dump();
            echo "<br>\n";
            
            /**
             * Creates a criteria where the age is IN a (24,25,26)
             * and the age is not in (10)
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('age','IN',     array(24,25,26)));
            $criteria->add(new TFilter('age','NOT IN', array(10)));
            echo $criteria->dump();
            echo "<br>\n";
            
            /**
             * Creates a criteria where name start with pedro
             * OR name start with maria
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('nome', 'like', 'pedro%'), TExpression::OR_OPERATOR);
            $criteria->add(new TFilter('nome', 'like', 'maria%'), TExpression::OR_OPERATOR);
            echo $criteria->dump();
            echo "<br>\n";
            
            /**
             * Creates a criteria where cellphone is not NULL
             * AND genre is FEMALE
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('cellphone', 'IS NOT', NULL));
            $criteria->add(new TFilter('gender',   '=',      'F'));
            echo $criteria->dump();
            echo "<br>\n";
            
            /**
             * Creates a criteria where state is IN the set ('RS', 'SC', 'PR')
             * AND state NOT IN array('AC', 'PI')
             */
            $criteria = new TCriteria;
            $criteria->add(new TFilter('state', 'IN',     array('RS', 'SC', 'PR')));
            $criteria->add(new TFilter('state', 'NOT IN', array('AC', 'PI')));
            echo $criteria->dump();
            echo "<br>\n";
            
            $criteria = new TCriteria;
            $criteria->add(new TFilter('id', 'IN', '(SELECT customer_id FROM purchases)'));
            echo $criteria->dump(); // (id IN (SELECT customer_id FROM purchases))
            echo "<br>\n";
            
            $criteria = new TCriteria;
            $criteria->add(new TFilter('birthdate', '<=', "NOESC:date(now()) - '2 years'::interval"));
            echo $criteria->dump(); // (birthdate <= date(now()) - '2 years'::interval)
            echo "<br>\n";
            
            /**
             * Creates a criteria where the gender is Female
             * and age is greater than 18
             */
            $criteria1 = new TCriteria;
            $criteria1->add(new TFilter('gender',  '= ', 'F'));
            $criteria1->add(new TFilter('age',   '>', '18'));
            
            /*
             * Creates a criteria where the gender is Male
             * and age is less than 16
             */
            $criteria2 = new TCriteria;
            $criteria2->add(new TFilter('gender',  '= ', 'M'));
            $criteria2->add(new TFilter('age', '<', '16'));
            
            /**
             * Creates a criteria that combines the two previous
             * criterias with the OR operator.
             */
            $criteria = new TCriteria;
            $criteria->add($criteria1, TExpression::OR_OPERATOR);
            $criteria->add($criteria2, TExpression::OR_OPERATOR);
            echo $criteria->dump();
            echo "<br>\n";
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>
