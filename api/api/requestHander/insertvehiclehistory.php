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
  $serviceHander->insertVehicleHistory($_GET['vehicleId'], $_GET['case'], $_GET['caseNote'], $_GET['caseLat'],
                                         $_GET['caseLong'], $_GET['caseState']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->insertVehicleHistory($_POST['vehicleId'], $_POST['case'], $_POST['caseNote'], $_POST['caseLat'],
                                      $_POST['caseLong'], $_POST['caseState']);
} else {
  $serviceHander->badRequest();
}
?>
