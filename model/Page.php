<?php

require_once "../model/Style.php";

class Page {


  // Variables :
  private $p_id;          // Int
  private $p_name;        // String
  private $p_alias;       // String
  private $p_desc;        // String
  private $p_style;       // Style Object
  private $p_createdby;   // Int
  private $p_createddate; // String
  private $p_modifiedby;  // Int
  private $p_modifieddate;// String


  // Default Constructor.
  public function __construct($in_id, $in_name, $in_alias, $in_desc, $in_style,
              $in_createdby, $in_createddate, $in_modifiedby, $in_modifieddate) {

    $this->p_id = $in_id;
    $this->p_name = $in_name;
    $this->p_alias = $in_alias;
    $this->p_desc = $in_desc;
    $this->p_style = $in_style;
    $this->p_createdby = $in_createdby;
    $this->p_createddate = $in_createddate;
    $this->p_modifiedby = $in_modifiedby;
    $this->p_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // p_id GETTER
  public function getPId() {

    return $this->p_id;

  } // getPId END


  // p_name GETTER/SETTER
  public function setPName($p_name) {

    $this->p_name = $p_name;

  } // setPName END
  public function getPName() {

    return $this->p_name;

  } // getPName END


  // p_alias GETTER/SETTER
  public function setPAlias($p_alias) {

    $this->p_alias = $p_alias;

  } // setPAlias END
  public function getPAlias() {

    return $this->p_alias;

  } // getPAlias END


  // p_desc GETTER/SETTER
  public function setPDesc($p_desc) {

    $this->p_desc = $p_desc;

  } // setPDesc END
  public function getPDesc() {

    return $this->p_desc;

  } // getPDesc END


  // p_style GETTER/SETTER
  public function setPStyle($p_style) {

    $this->p_style = $p_style;

  } // setPStyle END
  public function getPStyle() {

    return $this->p_style;

  } // getPStyle END


  // p_createdby GETTER
  public function getPCreatedby() {

    return $this->p_createdby;

  } // getPCreatedby END


  // p_createddate GETTER
  public function getPCreateddate() {

    return $this->p_createddate;

  } // getPCreateddate END


  // p_modifiedby GETTER/SETTER
  public function setPModifiedby($p_modifiedby) {

    $this->p_modifiedby = $p_modifiedby;

  } // setPModifiedby END
  public function getPModifiedby() {

    return $this->p_modifiedby;

  } // getPModifiedby END


  // p_modifieddate GETTER/SETTER
  public function setPModifieddate($p_modifieddate) {

    $this->p_modifieddate = $p_modifieddate;

  } // setPModifieddate END
  public function getPModifieddate() {

    return $this->p_modifieddate;

  } // getPModifieddate END


} // Page END


?>