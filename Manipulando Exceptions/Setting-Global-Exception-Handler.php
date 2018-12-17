<?php

function handleUncaughtException($e){
    // Display generic error message to the user
    echo "Opps! Something went wrong. Please try again, or contact us if the problem persists.";
    
    // Construct the error string
    $error = "Uncaught Exception: " . $message = date("Y-m-d H:i:s - ");
    $error .= $e->getMessage() . " in file " . $e->getFile() . " on line " . $e->getLine() . "\n";
    
    // Log details of error in a file
    error_log($error, 3, "var/log/exceptionLog.log");
}
 
// Register custom exception handler
set_exception_handler("handleUncaughtException");
 
// Throw an exception
throw new Exception("Testing Exception!");
