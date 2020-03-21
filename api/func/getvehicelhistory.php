<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
$vehicleHists = array();
require_once '../entities/VehicleHistory.php';
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  $result = $db->getVehicleHistory($_GET['id']);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $vehicleHist = new VehicleHistory($row["VEHICLE_HISTORY_ID"], $row["VEHICLE_ID"], $row["CASE"],
                                $row["CASE_NOTE"], $row["CASE_LAT"], $row["CASE_LONG"], $row["CASE_STATE"]);
        array_push($vehicleHists, json_decode(json_encode($vehicleHist), true));
      }
      echo json_encode($vehicleHists);
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
