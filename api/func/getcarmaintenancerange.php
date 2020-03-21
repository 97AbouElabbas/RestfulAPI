<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
$CMS = array();
require_once '../entities/CarMantanence.php';
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  $result = $db->getCarMaintenanceRange($_GET['lat'], $_GET['long']);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $carMantanence = new CarMantanence($row["CAR_MAINTENANCE_ID"], $row["CAR_MAINTENANCE_NAME"], $row["CAR_MAINTENANCE_LAT"],
                        $row["CAR_MAINTENANCE_LONG"], $row["CAR_MAINTENANCE_MOBILE"], $row["CAR_MAINTENANCE_EMAIL"]);
        array_push($CMS, json_decode(json_encode($carMantanence), true));
      }
      echo json_encode($CMS);
  } else {
    $response ['msg'] = "No Data";
    echo json_encode($response);
  }
} else {
  $response ['error'] = true;
  $response ['msg'] = "Required fields are missing";
  echo json_encode($response);
}
?>