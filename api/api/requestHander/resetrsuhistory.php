<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

 // Imports
 require_once '../serviceHandler/ServiceHander.php';

 // Global variables
 $serviceHander = new ServiceHander();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $serviceHander->resetRSUHistory($_GET['RSUId']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->resetRSUHistory($_POST['RSUId']);
} else {
  $serviceHander->badRequest();
}
?>
