## $_SESSION
- verifica se usuário está logado
   - session_start();
   - if(!isset($_SESSION['logado'])):
      - header("Location: index.php");
   - endif;
- fazer logout do usuário
   - session_start();
   - session_destroy();
   - header("Location: index.php");