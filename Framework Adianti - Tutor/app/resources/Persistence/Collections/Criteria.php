<?php
$criteria = new TCriteria;
$criteria->add(new TFilter('age', '<', 16), TExpression::OR_OPERATOR); 
$criteria->add(new TFilter('age', '>', 60), TExpression::OR_OPERATOR); 
echo $criteria->dump(); // (age < 16 OR age > 60)

$criteria = new TCriteria;
$criteria->add(new TFilter('age', 'BETWEEN', 16, 60));
echo $criteria->dump(); // (age BETWEEN 16 AND 60)

$criteria = new TCriteria;
$criteria->add(new TFilter('age','IN',     array(24,25,26))); 
$criteria->add(new TFilter('age','NOT IN', array(10))); 
echo $criteria->dump(); // (age IN (24,25,26) AND age NOT IN (10))

$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', 'pedro%'), TExpression::OR_OPERATOR); 
$criteria->add(new TFilter('nome', 'like', 'maria%'), TExpression::OR_OPERATOR); 
echo $criteria->dump(); // (nome like 'pedro%' OR nome like 'maria%')

$criteria = new TCriteria;
$criteria->add(new TFilter('cellphone', 'IS NOT', NULL)); 
$criteria->add(new TFilter('gender',   '=',      'F')); 
echo $criteria->dump(); // (cellphone IS NOT NULL AND gender = 'F')
 
$criteria = new TCriteria;
$criteria->add(new TFilter('state', 'IN',     array('RS', 'SC', 'PR'))); 
$criteria->add(new TFilter('state', 'NOT IN', array('AC', 'PI'))); 
echo $criteria->dump(); // (state IN ('RS','SC','PR') AND state NOT IN ('AC','PI'))

// subselect
$criteria = new TCriteria;
$criteria->add(new TFilter('id', 'IN', '(SELECT customer_id FROM purchases)'));
echo $criteria->dump(); // (id IN (SELECT customer_id FROM purchases))

// no escape strings
$criteria = new TCriteria;
$criteria->add(new TFilter('birthdate', '<=', "NOESC:date(now()) - '2 years'::interval"));
echo $criteria->dump(); // (birthdate <= date(now()) - '2 years'::interval)

// composed criteria
$criteria1 = new TCriteria;
$criteria1->add(new TFilter('gender',  '= ', 'F')); 
$criteria1->add(new TFilter('age',   '>', '18')); 

$criteria2 = new TCriteria; 
$criteria2->add(new TFilter('gender',  '= ', 'M')); 
$criteria2->add(new TFilter('age', '<', '16')); 

$criteria = new TCriteria; 	
$criteria->add($criteria1, TExpression::OR_OPERATOR); 
$criteria->add($criteria2, TExpression::OR_OPERATOR); 
echo $criteria->dump(); // ((gender = 'F' AND age > '18') OR (gender = 'M' AND age < '16'))
