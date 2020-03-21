<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

class Vehicle{

    // table name
    private $table_name = "VEHICLES";

    // object properties
    public $vehicleId;
    public $vehicleOwnerName;
    public $vehicleOwnerEmail;
    public $vehicleModelName;
    public $vehicleModelYear;
    public $vehicleLat;
    public $vehicleLong;
    public $vehicleStateFlag;
    public $vehicleEmergencyNote;

    //Constructors
    //SELECT * FROM Places WHERE acos(sin(1.3963) * sin(Lat) + cos(1.3963) * cos(Lat) * cos(Lon - (-0.6981))) * 6371 <= 1000
    // function __construct($vehicleModelName, $vehicleModelYear, $vehicleLat,
    //                       $vehicleLong, $vehicleStateFlag, $vehicleEmergencyNote) {
    //     $this->vehicleModelName = $vehicleModelName;
    //     $this->vehicleModelYear = $vehicleModelYear;
    //     $this->vehicleLat = $vehicleLat;
    //     $this->vehicleLong = $vehicleLong;
    //     $this->vehicleStateFlag = $vehicleStateFlag;
    //     $this->vehicleEmergencyNote = $vehicleEmergencyNote;
    // }

    function __construct($vehicleId, $vehicleOwnerName, $vehicleOwnerEmail,$vehicleModelName, $vehicleModelYear, $vehicleLat,
                          $vehicleLong, $vehicleStateFlag, $vehicleEmergencyNote) {
        $this->vehicleId = $vehicleId;
        $this->vehicleOwnerName = $vehicleOwnerName;
        $this->vehicleOwnerEmail = $vehicleOwnerEmail;
        $this->vehicleModelName = $vehicleModelName;
        $this->vehicleModelYear = $vehicleModelYear;
        $this->vehicleLat = $vehicleLat;
        $this->vehicleLong = $vehicleLong;
        $this->vehicleStateFlag = $vehicleStateFlag;
        $this->vehicleEmergencyNote = $vehicleEmergencyNote;
    }


    //function __construct($vehicleModelName, $vehicleModelYear) {
    //    $this->vehicleModelName = $vehicleModelName;
    //    $this->vehicleModelYear = $vehicleModelYear;
    //}
}
?>
