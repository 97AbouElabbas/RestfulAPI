<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
require_once '../entities/Vehicle.php';
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  $result = $db->getVehicleById($_GET['id']);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vehicle = new Vehicle($row["VEHICLE_ID"], $row["VEHICLE_OWNER_NAME"], $row["VEHICLE_OWNER_EMAIL"], $row["VEHICLE_MODEL_NAME"], $row["VEHICLE_MODEL_YEAR"],
                                $row["VEHICLE_STATE_FLAG"], $row["VEHICLE_LAT"], $row["VEHICLE_LONG"], $row["VEHICLE_EMERG_NOTE"]);
        echo json_encode($vehicle); 
      }
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
