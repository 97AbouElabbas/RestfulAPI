<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  $result = $db->distance($_GET['lat1'], $_GET['long1'], $_GET['lat2'], $_GET['long2'], 'k');
  //echo json_encode($result);
  //if (!empty($result)) {
    $response ['distance'] = $result;
    echo json_encode($response);
  //} else {
  //  $response ['msg'] = "No Data";
  //  echo json_encode($response);
  // }
} else {
  $response ['error'] = true;
  $response ['msg'] = "Required fields are missing";
  echo json_encode($response);
}
?>