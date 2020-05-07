<?php

/*
Reading the Entire Contents of a File
The fread() function can be used in conjugation with the filesize() function to read the entire file at once. The filesize() function returns the size of the file in bytes.
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Open the file for reading
    $handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
        
    // Reading the entire file
    $content = fread($handle, filesize($file));
        
    // Closing the file handle
    fclose($handle);
        
    // Display the file content
    echo $content;
} else{
    echo "ERROR: File does not exist.";
}

/*
The easiest way to read the entire contents of a file in PHP is with the readfile() function. This function allows you to read the contents of a file without needing to open it. The following example will generate the same output as above example:
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Reads and outputs the entire file
    readfile($file) or die("ERROR: Cannot open the file.");
} else{
    echo "ERROR: File does not exist.";
}

/*
Another way to read the whole contents of a file without needing to open it is with the file_get_contents() function. This function accepts the name and path to a file, and reads the entire file into a string variable. Here's an example:
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Reading the entire file into a string
    $content = file_get_contents($file) or die("ERROR: Cannot open the file.");
        
    // Display the file content 
    echo $content;
} else{
    echo "ERROR: File does not exist.";
}

/*
One more method of reading the whole data form a file is the PHP's file() function. It does a similar job to file_get_contents() function, but it returns the file contents as an array of lines, rather than a single string. Each element of the returned array corresponds to a line in the file.

To process the file data, you need to iterate over the array using a foreach loop. Here's an example, which reads a file into an array and then displays it using the loop:
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Reading the entire file into an array
    $arr = file($file) or die("ERROR: Cannot open the file.");
    foreach($arr as $line){
        echo $line;
    }
} else{
    echo "ERROR: File does not exist.";
}