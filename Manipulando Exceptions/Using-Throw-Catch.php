<?php

function division($dividend, $divisor){
    // Throw exception if divisor is zero
    if($divisor == 0){
        throw new Exception('Division by zero.');
    } else{
        $quotient = $dividend / $divisor;
        echo "<p>$dividend / $divisor = $quotient</p>";
    }
}
 
try{
    division(10, 2);
    division(30, -4);
    division(15, 0);
    
    // If exception is thrown following line won't execute
    echo '<p>All divisions performed successfully.</p>';
} catch(Exception $e){
    // Handle the exception
    echo "<p>Caught exception: " . $e->getMessage() . "</p>";
}
 
// Continue execution
echo "<p>Hello World!</p>";

// Turn off default error reporting
error_reporting(0);
 
try{
    $file = "somefile.txt";
    
    // Attempt to open the file
    $handle = fopen($file, "r");
    if(!$handle){
        throw new Exception("Cannot open the file!", 5);
    }
    
    // Attempt to read the file contents
    $content = fread($handle, filesize($file));
    if(!$content){
        throw new Exception("Could not read file!", 10);
    }
    
    // Closing the file handle
    fclose($handle);
    
    // Display file contents
    echo $content;
} catch(Exception $e){
    echo "<h3>Caught Exception!</h3>";
    echo "<p>Error message: " . $e->getMessage() . "</p>";    
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
    echo "<p>Error code: " . $e->getCode() . "</p>";
    echo "<p>Trace: " . $e->getTraceAsString() . "</p>";
}
