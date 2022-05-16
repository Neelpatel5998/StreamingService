<?php
class Account {
  
  private $con;
  private $errorArray = array();
  
  public function __construct() {
      $this->con = $con;
  }
  
  public function validateFirstName($fn) {
      if(strlen($fn) < 2 || strlen($fn) > 25) {
          array_push($this->errorArray, Constants::$firstNameCharacters);
      }
  }
  
  public function validateLastName($ln) {
      if(strlen($ln) < 2 || strlen($ln) > 25) {
          array_push($this->errorArray, Constants::$lastNameCharacters);
      }
  }
  
  public function getError($error) {
      if(in_array($error, $this->errorArray)) {
          return $error;
      }
  }
  
}
?>
