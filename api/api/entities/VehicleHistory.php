<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

class VehicleHistory{

    // table name
    private $table_name = "VEHICLES_HISTORY";

    // object properties
    public $vehicleHistoryId;
    public $vehicleId;
    public $case;
    public $caseNote;
    public $caseLat;
    public $caseLong;
    public $caseState;

    //Constructors

    function __construct($vehicleHistoryId, $vehicleId, $case, $caseNote,
                          $caseLat, $caseLong, $caseState) {
        $this->vehicleHistoryId = $vehicleHistoryId;
        $this->vehicleId = $vehicleId;
        $this->case = $case;
        $this->caseNote = $caseNote;
        $this->caseLat = $caseLat;
        $this->caseLong = $caseLong;
        $this->caseState = $caseState;
    }
}
?>
