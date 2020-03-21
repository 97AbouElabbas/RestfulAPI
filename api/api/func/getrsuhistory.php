<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

$response = array();
$RSULists = array();
require_once '../entities/RSUHistory.php';
require_once '../dbCredentials/dbHandler.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $db = new dbHandler();
  $result = $db->getRSUHistory($_GET['id']);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $rsuHistory = new RSUHistory($row["RSU_HISTORY_ID"], $row["RSU_ID"], $row["CASE"], $row["CASE_NOTE"], $row["CASE_STATE"]);
        array_push($RSULists, json_decode(json_encode($rsuHistory), true));
      }
      echo json_encode($RSULists);
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
