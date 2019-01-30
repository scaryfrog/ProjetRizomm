<?php
  require_once('connexion.php');
  session_start();

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'administrateurs';
    $action     = 'conn';
  }
 
    require_once('views/layout.php'); 

?>