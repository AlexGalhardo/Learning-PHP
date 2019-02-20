<?php
class ObjectRender extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            $product = Product::find(4);
            
            // render attributes inside braces
            echo $product->render('The product <b>{id}</b> is <u>{description}</u>');
            
            echo '<br>';
            
            // evaluate attributes inside braces
            echo $product->evaluate('= {sale_price} * {stock}');
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
