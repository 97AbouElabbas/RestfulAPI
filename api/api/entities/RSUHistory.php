<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */

class RSUHistory{

    // table name
    private $table_name = "rsu_history";

    // object properties
    public $RSUHistoryId;
    public $RSUId;
    public $case;
    public $caseNote;
    public $caseState;

    //Constructors
    function __construct($RSUHistoryId, $RSUId, $case, $caseNote,$caseState) {
        $this->RSUHistoryId = $RSUHistoryId;
        $this->RSUId = $RSUId;
        $this->case = $case;
        $this->caseNote = $caseNote;
        $this->caseState = $caseState;
    }
}
?>
