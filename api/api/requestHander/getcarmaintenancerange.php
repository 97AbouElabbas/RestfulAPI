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
  $serviceHander->getCarMaintenanceRange($_GET['lat'], $_GET['long']);
} else {
  $serviceHander->badRequest();
}
?>
