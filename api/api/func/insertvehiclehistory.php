<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
require_once '../entities/RSUHistory.php';
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  //echo json_encode($_GET['vehicleId']);
  $result = $db->insertVehicleHistory($_GET['vehicleId'], $_GET['case'], $_GET['caseNote'], $_GET['caseLat'],
                                         $_GET['caseLong'], $_GET['caseState']);
  if ($result) {
    $response ['msg'] = "Data inserted";
    echo json_encode($response);
  } else {
    $response ['msg'] = "Error";
    echo json_encode($response);
  }
} 
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
  $db = new dbHandler();
  $result = $db->insertVehicleHistory($_POST['vehicleId'], $_POST['case'], $_POST['caseNote'], $_POST['caseLat'],
                                      $_POST['caseLong'], $_POST['caseState']);
  if ($result) {
    $response ['msg'] = "Data inserted";
    echo json_encode($response);
  } else {
    $response ['msg'] = "Error";
    echo json_encode($response);
  }
}
else {
  $response ['error'] = true;
  $response ['msg'] = "Required fields are missing";
  echo json_encode($response);
}
?>
