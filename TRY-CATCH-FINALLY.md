```php


function dividir($x, $y) {
    if ($y == 0) {
        throw new Exception('é uma divisão por zero');
    }
    $resultado = $x / $y;
    return $resultado;
};
 
try {
    echo dividir(10,2)."<br/>";
    echo dividir(5,0)."<br/>";    
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} finally {
    echo "<br> Finalizado.";
}

class DivideByZeroException extends Exception {};
class DivideByNegativeException extends Exception {};

function process_divide($denominator)
{
    try
    {
        if ($denominator == 0)
        {
            throw new DivideByZeroException();
        }
        else if ($denominator < 0)
        {
            throw new DivideByNegativeException();
        }
        else
        {
            echo 100 / $denominator;
        }
    }
    catch (DivideByZeroException $ex)
    {
        echo "Divide by zero exception!";
    }
    catch (DivideByNegativeException $ex)
    {
        echo "Divide by negative number exception!";
    }
    catch (Exception $x)
    {
        echo "UNKNOWN EXCEPTION!";
    }
}