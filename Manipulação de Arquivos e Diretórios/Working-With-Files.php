<?php

/*
Working with Files in PHP
Since PHP is a server side programming language, it allows you to work with files and directories stored on the web server. In this tutorial you will learn how to create, access, and manipulate files on your web server using the PHP file system functions.

Opening a File with PHP fopen() Function
To work with a file you first need to open the file. The PHP fopen() function is used to open a file. The basic syntax of this function can be given with:

fopen(filename, mode)
The first parameter passed to fopen() specifies the name of the file you want to open, and the second parameter specifies in which mode the file should be opened. For example:
*/

$handle = fopen("data.txt", "r");

/*
The file may be opened in one of the following modes:

Modes	What it does
r	Open the file for reading only.
r+	Open the file for reading and writing.
w	Open the file for writing only and clears the contents of file. If the file does not exist, PHP will attempt to create it.
w+	Open the file for reading and writing and clears the contents of file. If the file does not exist, PHP will attempt to create it.
a	Append. Opens the file for writing only. Preserves file content by writing to the end of the file. If the file does not exist, PHP will attempt to create it.
a+	Read/Append. Opens the file for reading and writing. Preserves file content by writing to the end of the file. If the file does not exist, PHP will attempt to create it.
x	Open the file for writing only. Return FALSE and generates an error if the file already exists. If the file does not exist, PHP will attempt to create it.
x+	Open the file for reading and writing; otherwise it has the same behavior as 'x'.
If you try to open a file that doesn't exist, PHP will generate a warning message. So, to avoid these error messages you should always implement a simple check whether a file or directory exists or not before trying to access it, with the PHP file_exists() function.
*/

$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Attempt to open the file
    $handle = fopen($file, "r");
} else{
    echo "ERROR: File does not exist.";
}

/*
Tip:Operations on files and directories are prone to errors. So it's a good practice to implement some form of error checking so that if an error occurs your script will handle the error gracefully. See the tutorial on PHP error handling.
*/