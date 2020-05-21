<?php

require_once 'RestLib.php';
require_once '../entities/Vehicle.php';
require_once '../entities/VehicleHistory.php';
require_once '../entities/RSU.php';
require_once '../entities/RSUHistory.php';
require_once '../entities/CarMantanence.php';
require_once '../dbHandler/dbHandler.php';

class ServiceHander extends RestLib {

  public function badRequest(){
    $statusCode = 400;
    $responseData ['error'] = true;
    $responseData ['msg'] = "Bad Request";
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getVehicles(){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getVehicles();
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $vehicle = new Vehicle($row["VEHICLE_ID"], $row["VEHICLE_OWNER_NAME"], $row["VEHICLE_OWNER_EMAIL"], $row["VEHICLE_MODEL_NAME"],
                                $row["VEHICLE_MODEL_YEAR"],
                                $row["VEHICLE_LAT"], $row["VEHICLE_LONG"], $row["VEHICLE_STATE_FLAG"], $row["VEHICLE_EMERG_NOTE"]);
        array_push($responseData, $vehicle);
      }
    } else {
      $statusCode = 404;
      $response ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getvehiclebyid($id){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getVehicleById($id);
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $responseData = new Vehicle($row["VEHICLE_ID"], $row["VEHICLE_OWNER_NAME"], $row["VEHICLE_OWNER_EMAIL"], $row["VEHICLE_MODEL_NAME"], $row["VEHICLE_MODEL_YEAR"],
                                  $row["VEHICLE_LAT"], $row["VEHICLE_LONG"], $row["VEHICLE_STATE_FLAG"], $row["VEHICLE_EMERG_NOTE"]);
      }
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function updateVehicleLocation($vehicleLat, $vehicleLong, $vehicleId){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->updateVehicleLocation($vehicleLat, $vehicleLong, $vehicleId);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data Updated";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function updateVehicleState($vehicleStateFlag, $vehicleId){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->updateVehicleState($vehicleStateFlag, $vehicleId);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data Updated";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getvehicelhistory($id){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getVehicleHistory($id);
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $vehicleHist = new VehicleHistory($row["VEHICLE_HISTORY_ID"], $row["VEHICLE_ID"], $row["CASE"],
                                $row["CASE_NOTE"], $row["CASE_LAT"], $row["CASE_LONG"], $row["CASE_STATE"]);
        array_push($responseData, $vehicleHist);
      }
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function insertVehicleHistory($vehicleId, $case, $caseNote, $caseLat, $caseLong, $caseState){
    $responseData = array();
    $db = new dbHandler();
    $db->resetVehicleHistory($vehicleId);
    $result = $db->insertVehicleHistory($vehicleId, $case, $caseNote, $caseLat, $caseLong, $caseState);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data inserted";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function resetVehicleHistory($id){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->resetVehicleHistory($id);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data Updated";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getRSU(){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getRSUs();
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $rsu = new RSU($row["RSU_ID"], $row["RSU_LONG"], $row["RSU_LAT"],
                        $row["RSU_EMERG_NOTES"], $row["RSU_STATE"]);
        array_push($responseData, $rsu);
      }
    } else {
      $statusCode = 404;
      $response ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getRSUById($id){
    $responseData = array();
    $db = new dbHandler();
    if($db->resetRSUHistory() == TRUE){
      $result = $db->getRSUById($id);
      if ($result->num_rows > 0) {
        $statusCode = 200;
        while($row = $result->fetch_assoc()) {
          $responseData = new RSU($row["RSU_ID"], $row["RSU_LONG"], $row["RSU_LAT"],
                          $row["RSU_EMERG_NOTES"], $row["RSU_STATE"]);
        }
      } else {
        $statusCode = 404;
        $responseData ['msg'] = "No Data";
      }
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function updateRSUState($rsuId, $RSUState, $RSUEmergNote){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->updateRSUState($rsuId, $RSUState, $RSUEmergNote);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data Updated";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getRSUHistory($id){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getRSUHistory($_GET['id']);
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $rsuHistory = new RSUHistory($row["RSU_HISTORY_ID"], $row["RSU_ID"], $row["CASE"], $row["CASE_NOTE"], $row["CASE_STATE"]);
        array_push($responseData, json_decode(json_encode($rsuHistory), true));
      }
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function insertRSUHistory($RSUId, $case, $caseNote, $caseState){
    $responseData = array();
    $db = new dbHandler();
    $db->resetRSUHistory($RSUId);
    $result = $db->insertRSUHistory($RSUId, $case, $caseNote, $caseState);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data inserted";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function resetRSUHistory($id){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->resetRSUHistory($id);
    if ($result) {
      $statusCode = 200;
      $responseData ['msg'] = "Data Updated";
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "Error";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getCarMaintenance(){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getCarMaintenance();
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $carMantanence = new CarMantanence($row["CAR_MAINTENANCE_ID"], $row["CAR_MAINTENANCE_NAME"], $row["CAR_MAINTENANCE_LAT"],
                        $row["CAR_MAINTENANCE_LONG"], $row["CAR_MAINTENANCE_MOBILE"], $row["CAR_MAINTENANCE_EMAIL"]);
        array_push($responseData, json_decode(json_encode($carMantanence), true));
      }
    } else {
      $statusCode = 404;
      $responseData ['msg'] = "No Data";
    }
    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  public function getCarMaintenanceRange($lat, $long){
    $responseData = array();
    $db = new dbHandler();
    $result = $db->getCarMaintenanceRange($lat, $long);
    if ($result->num_rows > 0) {
      $statusCode = 200;
      while($row = $result->fetch_assoc()) {
        $carMantanence = new CarMantanence($row["CAR_MAINTENANCE_ID"], $row["CAR_MAINTENANCE_NAME"], $row["CAR_MAINTENANCE_LAT"],
                        $row["CAR_MAINTENANCE_LONG"], $row["CAR_MAINTENANCE_MOBILE"], $row["CAR_MAINTENANCE_EMAIL"]);
        array_push($responseData, json_decode(json_encode($carMantanence), true));
      }
    } else {
      $statusCode = 404;
      $response ['msg'] = "No Data";
    }

    $requestContentType = $_SERVER['HTTP_ACCEPT'];
  	$this ->setHttpHeaders('application/json', $statusCode);
    $this ->encodeData('application/json', $responseData);
  }

  //Distance between two points
  public function distance($lat1, $long1, $lat2, $long2, $unit) {
    $responseData = array();
    if (($lat1 == $lat2) && ($long1 == $long2)) {
      return 0;
    }
    else {
      $theta = $long1 - $long2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        $responseData ['distance'] = $miles * 1.609344;
      } else if ($unit == "N") {
        $responseData ['distance'] = $miles * 0.8684;
      } else {
        $responseData ['distance'] = $miles;
      }
      $statusCode = 200;
      $requestContentType = $_SERVER['HTTP_ACCEPT'];
    	$this ->setHttpHeaders('application/json', $statusCode);
      $this ->encodeData('application/json', $responseData);
    }
  }
}

?>
