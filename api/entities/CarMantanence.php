<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */
class CarMantanence{

    // table name
    private $table_name = "car_maintenance";

    // object properties
    public $CarMantanenceId;
    public $CarMantanenceName;
    public $CarMantanenceLat;
    public $CarMantanenceLong;
    public $CarMantanenceMobile;
    public $CarMantanenceEmail;

    //Constructors
    function __construct($CarMantanenceId, $CarMantanenceName, $CarMantanenceLat, 
                            $CarMantanenceLong, $CarMantanenceMobile, $CarMantanenceEmail) {
        $this->CarMantanenceId = $CarMantanenceId;
        $this->CarMantanenceName = $CarMantanenceName;
        $this->CarMantanenceLat = $CarMantanenceLat;
        $this->CarMantanenceLong = $CarMantanenceLong;
        $this->CarMantanenceMobile = $CarMantanenceMobile;
        $this->CarMantanenceEmail = $CarMantanenceEmail;
    }
}
?>