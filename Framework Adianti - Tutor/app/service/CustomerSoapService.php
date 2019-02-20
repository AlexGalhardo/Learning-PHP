<?php
class CustomerSoapService
{
    /**
     * Retorna todos clientes entre $from e $to
     * @param $from Código inicial
     * @param $to Código final
     */
    public static function getBetween( $from, $to )
    {
        TTransaction::open('samples');
        $response = array();
        
        // define o critério
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id', '>=', $from));
        $criteria->add(new TFilter('id', '<=', $to));
        
        // carrega os clientes
        $all = Customer::getObjects( $criteria );
        foreach ($all as $customer)
        {
            $response[] = $customer->toArray();
        }
        TTransaction::close();
        return $response;
    }
    
    /**
     * Exibe no Standard Output todos clientes entre $param['from'] e $param['to']
     * @param @param Vetor de parâmetros recebido
     */
    public static function printBetween( $param )
    {
        $from = $param['from'];
        $to   = $param['to'];

        TTransaction::open('samples');
        $response = array();
        
        // define o critério
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id', '>=', $from));
        $criteria->add(new TFilter('id', '<=', $to));
        
        // carrega os clientes
        $all = Customer::getObjects( $criteria );
        foreach ($all as $customer)
        {
            $response[] = $customer->toArray();
        }
        TTransaction::close();
        print_r( $response );
    }
}
