<?php

/*
Reading from Files with PHP fread() Function
Now that you have understood how to open and close files. In the following section you will learn how to read data from a file. PHP has several functions for reading data from a file. You can read from just one character to the entire file with a single operation.

Reading Fixed Number of Characters
The fread() function can be used to read a specified number of characters from a file. The basic syntax of this function can be given with.

fread(file handle, length in bytes)
This function takes two parameter — A file handle and the number of bytes to read. The following example reads 20 bytes form the "data.txt" file including spaces. Let's suppose the file "data.txt" contains a paragraph of text "The quick brown fox jumps over the lazy dog."
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Open the file for reading
    $handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
        
    // Read fixed number of bytes from the file
    $content = fread($handle, "20");
        
    // Closing the file handle
    fclose($handle);
        
    // Display the file content 
    echo $content;
} else{
    echo "ERROR: File does not exist.";
}