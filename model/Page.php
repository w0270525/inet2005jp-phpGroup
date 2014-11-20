<?php

require_once "../model/Style.php";

class Page {


  // Variables :
  private $p_id;    // Int
  private $p_name;  // String
  private $p_alias; // String
  private $p_desc;  // String
  private $p_style; // Style Object


  // Default Constructor.
  public function __construct($in_id, $in_name, $in_alias, $in_desc, $in_style) {

    $this->p_id = $in_id;
    $this->p_name = $in_name;
    $this->p_alias = $in_alias;
    $this->p_desc = $in_desc;
    $this->p_style = $in_style;

  } // Default Constructor END


  // p_id GETTER/SETTER
  public function setPId($p_id) {

    $this->p_id = $p_id;

  } // setPId END
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


} // Page END


?>