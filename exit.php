<?php
        session_start();
        unset($_SESSION['NUM']);
        unset($_SESSION['id']);
        unset($_SESSION['NAME']);
       header("Location:login.php");
  

?>