<?php 
  session_start();
  unset($_SESSION["loginSession"]);
  header("Location: index.php");
?>