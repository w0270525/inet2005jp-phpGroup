<?php


class Style {


  // Variables :
  private $s_id;      // Int
  private $s_name;    // String
  private $s_desc;    // String
  private $s_style;   // String
  private $s_active;  // Boolean


  // Default Constructor
  public function __construct($in_id, $in_name,$in_desc, $in_style, $in_active) {

    $this->s_id = $in_id;
    $this->s_name = $in_name;
    $this->s_desc = $in_desc;
    $this->s_style = $in_style;
    $this->s_active = $in_active;

  } // Default Constructor END


  // s_id GETTER/SETTER
  public function setSId($s_id) {

    $this->s_id = $s_id;

  } // setSId END
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


} // Style END


?>