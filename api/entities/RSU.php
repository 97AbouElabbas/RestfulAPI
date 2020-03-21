<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

class RSU{

    // table name
    private $table_name = "RSU";

    // object properties
    public $RSUId;
    public $RSULong;
    public $RSULat;
    public $RSUEmergNote;
    public $RSUState;

    //Constructors
    function __construct($RSUId, $RSULong, $RSULat, $RSUEmergNote, $RSUState) {
        $this->RSUId = $RSUId;
        $this->RSULong = $RSULong;
        $this->RSULat = $RSULat;
        $this->RSUEmergNote = $RSUEmergNote;
        $this->RSUState = $RSUState;
    }
}
?>
