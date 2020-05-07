<?php

/*
Closing a File with PHP fclose() Function
Once you've finished working with a file, it needs to be closed. The fclose() function is used to close the file, as shown in the following example:
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Open the file for reading
    $handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
        
    /* Some code to be executed */
        
    // Closing the file handle
    fclose($handle);
} else{
    echo "ERROR: File does not exist.";
}


/*
Note:Although PHP automatically closes all open files when script terminates, but it's a good practice to close a file after performing all the operations.
*/

?>