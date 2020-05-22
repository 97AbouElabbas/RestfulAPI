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
  $serviceHander->distance($_GET['lat1'], $_GET['long1'], $_GET['lat2'], $_GET['long2'], 'k');
} else {
  $serviceHander->badRequest();
}
?>
