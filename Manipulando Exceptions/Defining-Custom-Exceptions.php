<?php

// Extending the Exception class
class EmptyEmailException extends Exception {}
class InvalidEmailException extends Exception {}
 
$email = "someuser@example..com";
 
try{
    // Throw exception if email is empty
    if($email == ""){
        throw new EmptyEmailException("<p>Please enter your E-mail address!</p>");
    }
    
    // Throw exception if email is not valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {           
        throw new InvalidEmailException("<p><b>$email</b> is not a valid E-mail address!</p>");
    }
    
    // Display success message if email is valid
    echo "<p>SUCCESS: Email validation successful.</p>";
} catch(EmptyEmailException $e){
    echo $e->getMessage();
} catch(InvalidEmailException $e){
    echo $e->getMessage();
}
