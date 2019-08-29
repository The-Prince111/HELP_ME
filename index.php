<?php
  require_once('/CONFIG/db_conn.php');
  
  if (isset($_GET['controller']) && isset($_GET['action'])) 
    {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
     } 
     else 
     {
    $controller = 'aura';   //default controller
    $action     = 'account';	//default action
    }
require_once('CONFIG/route.php');
?>