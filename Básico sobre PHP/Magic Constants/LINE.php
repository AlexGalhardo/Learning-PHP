<?php

/*
What is Magic Constants
In the PHP constants chapter we've learned how to define and use constants in PHP script.

PHP moreover also provide a set of special predefined constants that change depending on where they are used. These constants are called magic constants. For example, the value of __LINE__ depends on the line that it's used on in your script.

Magic constants begin with two underscores and end with two underscores. The following section describes some of the most useful magical PHP constants.

__LINE__


The __LINE__ constant returns the current line number of the file, like this:
*/

echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 2
echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 3
echo "Line number " . __LINE__ . "<br>"; // Displays: Line number 4