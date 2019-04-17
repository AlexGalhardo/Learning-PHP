<?php
class ProductService
{
    /**
     * Retorna todos produtos entre $from e $to
     * @param $request HTTP request
     */
    public static function getBetween( $request )
    {
        TTransaction::open('samples');
        $response = array();
        
        // define o critério
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id', '>=', $request['from']));
        $criteria->add(new TFilter('id', '<=', $request['to']));
        
        // carrega os produtos
        $all = Product::getObjects( $criteria );
        foreach ($all as $product)
        {
            $response[] = $product->toArray();
        }
        TTransaction::close();
        return $response;
    }
}