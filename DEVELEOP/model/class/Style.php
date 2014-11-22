<?php

require_once '../model/data/PDOMySQLUserDataModel.php';

class Style {


  // Variables :
  private $s_id;      // Int
  private $s_name;    // String
  private $s_desc;    // String
  private $s_style;   // String
  private $s_active;  // Boolean
  private $s_createdby;   // Int
  private $s_creationdate; // String
  private $s_modifiedby;  // Int
  private $s_modifieddate;// String


  // Default Constructor
  public function __construct($in_id, $in_name,$in_desc, $in_style, $in_active,
              $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->s_id = $in_id;
    $this->s_name = $in_name;
    $this->s_desc = $in_desc;
    $this->s_style = $in_style;
    $this->s_active = $in_active;
    $this->s_createdby = $in_createdby;
    $this->s_creationdate = $in_creationdate;
    $this->s_modifiedby = $in_modifiedby;
    $this->s_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // s_id GETTER
  public function getSId() {

    return $this->s_id;

  } // getSId END


  // s_name GETTER/SETTER
  public function setSName($s_name) {

    $this->s_name = $s_name;

  } // setSName END
  public function getSName() {

    return $this->s_name;

  } // getSName END


  // s_desc GETTER/SETTER
  public function setSDesc($s_desc) {

    $this->s_desc = $s_desc;

  } // setSDesc END
  public function getSDesc() {

    return $this->s_desc;

  } // getSDesc END


  // s_style GETTER/SETTER
  public function setSStyle($s_style) {

    $this->s_style = $s_style;

  } // setSStyle END
  public function getSStyle() {

    return $this->s_style;

  } // getSStyle END


  // s_active GETTER/SETTER
  public function setSActive($s_active) {

    $this->s_active = $s_active;

  } // setSActive END
  public function getSActive() {

    return $this->s_active;

  } // getSActive END

  
  // s_createdby GETTER
  public function getSCreatedby() {

    return $this->s_createdby;

  } // getSCreatedby END


  // s_creationdate GETTER
  public function getSCreationdate() {

    return $this->s_creationdate;

  } // getSCreationdate END


  // s_modifiedby GETTER/SETTER
  public function setSModifiedby($s_modifiedby) {

    $this->s_modifiedby = $s_modifiedby;

  } // setSModifiedby END
  public function getSModifiedby() {

    return $this->s_modifiedby;

  } // getSModifiedby END


  // s_modifieddate GETTER/SETTER
  public function setSModifieddate($s_modifieddate) {

    $this->s_modifieddate = $s_modifieddate;

  } // setSModifieddate END
  public function getSModifieddate() {

    return $this->s_modifieddate;

  } // getSModifieddate END


} // Style END


?>