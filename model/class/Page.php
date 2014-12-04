<?php

include_once("Style.php");
include_once("ContentArea.php");

class Page {


  // Variables :
  private $p_id;            // Int
  private $p_name;          // String
  private $p_alias;         // String
  private $p_desc;          // String
  private $p_style;         // Style Object
  private $p_contentareas;  // Array of ContentArea Object
  private $p_createdby;     // Int
  private $p_creationdate;  // String
  private $p_modifiedby;    // Int
  private $p_modifieddate;  // String


  // Default Constructor.
  public function __construct($in_id, $in_name, $in_alias, $in_desc, $in_style,$in_contentareas,
     $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->p_id = $in_id;
    $this->p_name = $in_name;
    $this->p_alias = $in_alias;
    $this->p_desc = $in_desc;
    $this->p_style = $in_style;
    $this->p_contentareas = $in_contentareas;
    $this->p_createdby = $in_createdby;
    $this->p_creationdate = $in_creationdate;
    $this->p_modifiedby = $in_modifiedby;
    $this->p_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // p_id GETTER
  public function getId() {

    return $this->p_id;

  } // getPId END


  // p_name GETTER/SETTER
  public function setName($p_name) {

    $this->p_name = $p_name;

  } // setPName END
  public function getName() {

    return $this->p_name;

  } // getPName END


  // p_alias GETTER/SETTER
  public function setAlias($p_alias) {

    $this->p_alias = $p_alias;

  } // setPAlias END
  public function getAlias() {

    return $this->p_alias;

  } // getPAlias END


  // p_desc GETTER/SETTER
  public function setDesc($p_desc) {

    $this->p_desc = $p_desc;

  } // setPDesc END
  public function getDesc() {

    return $this->p_desc;

  } // getPDesc END


  // p_style GETTER/SETTER
  public function setStyle($p_style) {

    $this->p_style = $p_style;

  } // setPStyle END
  public function getStyle() {

    return $this->p_style;

  } // getPStyle END


  // p_contentareas GETTER/SETTER
  public function setContentAreas($p_contentareas) {

    $this->p_contentareas = $p_contentareas;

  } // setContentAreas END
  public function getContentAreas() {

    return $this->p_contentareas;

  } // getContentAreas END


  // p_createdby GETTER
  public function getCreatedBy() {

    return $this->p_createdby;

  } // getPCreatedby END


  // p_creationdate GETTER
  public function getCreatedDate() {

    return $this->p_creationdate;

  } // getPCreationdate END


  // p_modifiedby GETTER/SETTER
  public function setModifiedBy($p_modifiedby) {

    $this->p_modifiedby = $p_modifiedby;

  } // setPModifiedby END
  public function getModifiedBy() {

    return $this->p_modifiedby;

  } // getPModifiedby END


  // p_modifieddate GETTER/SETTER
  public function setModifiedDate($p_modifieddate) {

    $this->p_modifieddate = $p_modifieddate;

  } // setPModifieddate END
  public function getModifiedDate() {

    return $this->p_modifieddate;

  } // getPModifieddate END


} // Page END


?>