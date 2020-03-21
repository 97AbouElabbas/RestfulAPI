<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

require_once '../entities/VehicleHistory.php';

class dbHandler {
  private $con;

  function __construct(){
    //import dbConnect class
    require_once dirname(__File__).'/dbConnect.php';
    //get object
    $db = new dbConnect();

    $this->con = $db->connect();
  }

  //VEHICLES TABLE CRUD
  public function getVehicles(){
		$sql = "SELECT * FROM VEHICLES";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  public function getVehicleById($vehicleId){
		$sql = "SELECT * FROM VEHICLES WHERE VEHICLE_ID = ".$vehicleId."";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
	}

  public function getVehicleHistory($vehicleId){
		$sql = "SELECT * FROM VEHICLES_HISTORY WHERE VEHICLE_ID = ".$vehicleId."";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  public function insertVehicleHistory($vehicleId, $case, $caseNote, $caseLat, $caseLong, $caseState){
    $sql = "INSERT INTO `VEHICLES_HISTORY` (`VEHICLE_ID`, `CASE`, `CASE_NOTE`, `CASE_LAT`, `CASE_LONG`, `CASE_STATE`)
    VALUES ('".$vehicleId."', '".$case."', '".$caseNote."', '".$caseLat."', '".$caseLong."', '".$caseState."')";
    if($this->con->query($sql) === TRUE){
      $this->con->commit();
      $this->con->close();
      return TRUE;
    }else{
      $this->con->close();
      return FALSE;
    }
  }

  //RSU TABLE CRUD
  public function getRSUs(){
    $sql = "SELECT * FROM RSU";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  public function getRSUById($rsuId){
		$sql = "SELECT * FROM RSU WHERE RSU_ID = ".$rsuId."";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
	}

  public function getRSUHistory($rsuId){
		$sql = "SELECT * FROM RSU_HISTORY WHERE RSU_ID = ".$rsuId."";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  public function insertRSUHistory($RSUId, $case, $caseNote, $caseState){
    $sql = "INSERT INTO `RSU_HISTORY` (`RSU_ID`, `CASE`, `CASE_NOTE`, `CASE_STATE`)
    VALUES ('".$RSUId."', '".$case."', '".$caseNote."', '".$caseState."')";
    if($this->con->query($sql) === TRUE){
      $this->con->commit();
      $this->con->close();
      return TRUE;
    }else{
      $this->con->close();
      return FALSE;
    }
  }

  //car_maintenance CRUD
  public function getCarMaintenance(){
    $sql = "SELECT * FROM CAR_MAINTENANCE";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  public function getCarMaintenanceRange($lat, $long){
    $sql = "SELECT * FROM CAR_MAINTENANCE WHERE acos(sin(RADIANS(".$lat.")) * sin(RADIANS(CAR_MAINTENANCE_LAT)) + cos(RADIANS(".$lat.")) * cos(RADIANS(CAR_MAINTENANCE_LAT)) * cos(RADIANS(CAR_MAINTENANCE_LONG) - (RADIANS(".$long.")))) * 6371 <= 5";
    $result = $this->con->query($sql);
    $this->con->close();
    return $result;
  }

  //Distance between two points
  public function distance($lat1, $long1, $lat2, $long2, $unit) {
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
        return ($miles * 1.609344);
      } else if ($unit == "N") {
        return ($miles * 0.8684);
      } else {
        return $miles;
      }
    }
  }
}

?>
