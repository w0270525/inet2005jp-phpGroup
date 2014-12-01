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
  public function getId() {

    return $this->s_id;

  } // getSId END


  // s_name GETTER/SETTER
  public function setName($s_name) {

    $this->s_name = $s_name;

  } // setSName END
  public function getName() {

    return $this->s_name;

  } // getSName END


  // s_desc GETTER/SETTER
  public function setDesc($s_desc) {

    $this->s_desc = $s_desc;

  } // setSDesc END
  public function getDesc() {

    return $this->s_desc;

  } // getSDesc END


  // s_style GETTER/SETTER
  public function setStyle($s_style) {

    $this->s_style = $s_style;

  } // setSStyle END
  public function getStyle() {

    return $this->s_style;

  } // getSStyle END


  // s_active GETTER/SETTER
  public function setActive($s_active) {

    $this->s_active = $s_active;

  } // setSActive END
  public function getActive() {

    return $this->s_active;

  } // getSActive END

  
  // s_createdby GETTER
  public function getCreatedBy() {

    return $this->s_createdby;

  } // getSCreatedby END


  // s_creationdate GETTER
  public function getCreatedDate() {

    return $this->s_creationdate;

  } // getSCreationdate END


  // s_modifiedby GETTER/SETTER
  public function setModifieBy($s_modifiedby) {

    $this->s_modifiedby = $s_modifiedby;

  } // setSModifiedby END
  public function getModifiedBy() {

    return $this->s_modifiedby;

  } // getSModifiedby END


  // s_modifieddate GETTER/SETTER
  public function setModifiedDate($s_modifieddate) {

    $this->s_modifieddate = $s_modifieddate;

  } // setSModifieddate END
  public function getModifiedDate() {

    return $this->s_modifieddate;

  } // getSModifieddate END


} // Style END


?>