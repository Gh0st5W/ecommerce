<?php
  session_start();

  session_unset();

  session_destroy();

  /* Después de hacer los destroys redirijo a la página principal */
  header('Location: /website/index.php');
?>
