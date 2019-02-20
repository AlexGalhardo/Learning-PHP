<?php
class CollectionArray extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            
            // load an indexed array with all products
            $products = Product::getIndexedArray('id', 'description');
            var_dump($products);
            
            // load an indexed array with all products with masks
            $products = Product::getIndexedArray('key:{id}', 'description:{description}');
            var_dump($products);
            
            // load an indexed array with all products filtered by unity
            $products = Product::where('unity', '=', 'PC')
                               ->orderBy('id')
                               ->getIndexedArray('id', 'description');
            var_dump($products);
            
            // load an indexed array with all products filtered by array of ids
            $products = Product::where('id', 'in', [1,2,3,4])
                               ->orderBy('id')
                               ->getIndexedArray('id', 'description');
            var_dump($products);
            
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
