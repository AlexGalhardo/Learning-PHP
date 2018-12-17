<?php

/*
Removing Files with PHP unlink() Function
You can delete files or directories using the PHP's unlink() function, like this:
*/

$file = "note.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Attempt to delete the file
    if(unlink($file)){
        echo "File removed successfully.";
    } else{
        echo "ERROR: File cannot be removed.";
    }
} else{
    echo "ERROR: File does not exist.";
}
