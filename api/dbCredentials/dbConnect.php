<?php
/**
 * Abdelrahman Abou-Elabbas
 * V2x Project
 */
 
class dbConnect {
  private $con;

  function __construct(){

  }

  function connect(){
    //import dbCredentials database constants
    include_once dirname(__FILE__).'/dbCredentials';

    // Call mysql liberary
    $this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // check connection
    if (mysqli_connect_errno()){
      echo "Failed to connect with database".mysqli_connect_err();
    }

    return $this->con;
  }
}
?>
