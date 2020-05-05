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

  $serviceHander->updateRSUState($_GET['rsuId'], $_GET['RSUState'], $_GET['RSUEmergNote']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->updateRSUState($_POST['rsuId'], $_POST['RSUState'], $_POST['RSUEmergNote']);
} else {
  $serviceHander->badRequest();
}
?>
