<?php

/*
Renaming Files with PHP rename() Function
You can rename a file or directory using the PHP's rename() function, like this:
*/

$file = "file.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Attempt to rename the file
    if(rename($file, "newfile.txt")){
        echo "File renamed successfully.";
    } else{
        echo "ERROR: File cannot be renamed.";
    }
} else{
    echo "ERROR: File does not exist.";
}