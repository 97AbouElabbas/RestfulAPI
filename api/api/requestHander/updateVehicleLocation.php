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
  $serviceHander->updateVehicleLocation($_GET['vehicleLat'], $_GET['vehicleLong'], $_GET['vehicleId']);
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $serviceHander->updateVehicleLocation($_POST['vehicleLat'], $_POST['vehicleLong'], $_POST['vehicleId']);
} else {
  $serviceHander->badRequest();
}
?>
