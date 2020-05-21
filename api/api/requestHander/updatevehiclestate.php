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
  $serviceHander->updateVehicleState($_GET['vehicleStateFlag'], $_GET['vehicleId']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->updateVehicleState($_POST['vehicleStateFlag'], $_POST['vehicleId']);
} else {
  $serviceHander->badRequest();
}
?>
