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
}
?>
