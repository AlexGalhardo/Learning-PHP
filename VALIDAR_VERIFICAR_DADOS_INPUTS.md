## VALIDAR DADOS $_POST
- condição ternária
   - $email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
- validar email
   - if (!filter_var($email, FILTER_VALIDATE_EMAIL)):