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
  $serviceHander->insertRSUHistory($_GET['rsuId'], $_GET['case'], $_GET['caseNote'], $_GET['caseState']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->insertRSUHistory($_POST['rsuId'], $_POST['case'], $_POST['caseNote'], $_POST['caseState']);
} else {
  $serviceHander->badRequest();
}

?>
