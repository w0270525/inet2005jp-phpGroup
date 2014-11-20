<?php


class ContentArea {


  // Variables :
  private $c_a_id;            // Int
  private $c_a_name;          // String
  private $c_a_alias;         // String
  private $c_a_desc;          // String
  private $c_a_order;         // Int
  private $c_a_assocpage;     // Int
  private $c_a_createdby;     // Int
  private $c_a_creationdate;  // String
  private $c_a_modifiedby;    // Int
  private $c_a_modifieddate;  // String


  // Default Constructor
  public function __construct($in_id, $in_name, $in_alias, $in_desc, $in_order, $in_assocpage,
                            $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->c_a_id = $in_id;
    $this->c_a_name = $in_name;
    $this->c_a_alias = $in_alias;
    $this->c_a_desc = $in_desc;
    $this->c_a_order = $in_order;
    $this->c_a_assocpage = $in_assocpage;
    $this->c_a_createdby = $in_createdby;
    $this->c_a_creationdate = $in_creationdate;
    $this->c_a_modifiedby = $in_modifiedby;
    $this->c_a_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // c_a_id GETTER
  public function getCAId() {

    return $this->c_a_id;

  } // getAId END


  // c_a_name GETTER/SETTER
  public function setCAName($c_a_name) {

    $this->c_a_name = $c_a_name;

  } // setCAName END
  public function getCAName() {

    return $this->c_a_name;

  } // getCAName END


  // a_alias GETTER/SETTER
  public function setCAAlias($c_a_alias) {

    $this->c_a_alias = $c_a_alias;

  } // setCAAlias END
  public function getCAAlias() {

    return $this->c_a_alias;

  } // getCAAlias END


  // c_a_desc GETTER/SETTER
  public function setCADesc($c_a_desc) {

    $this->c_a_desc = $c_a_desc;

  } // setCADesc END
  public function getCADesc() {

    return $this->c_a_desc;

  } // getCADesc END


  // c_a_order GETTER/SETTER
  public function setCAOrder($c_a_order) {

    $this->c_a_order = $c_a_order;

  } // setCAOrder END
  public function getCAOrder() {

    return $this->c_a_order;

  } // getCAOrder END


  // c_a_assocpage GETTER/SETTER
  public function setCAAssocpage($c_a_assocpage) {

    $this->c_a_assocpage = $c_a_assocpage;

  } // setCAAssocpage END
  public function getCAAssocpage() {

    return $this->c_a_assocpage;

  } // getCAAssocpage END


  // c_a_creationdate GETTER
  public function getCACreationdate() {

    return $this->c_a_creationdate;

  } // getCACreationdate END


  // c_a_modifiedby GETTER/SETTER
  public function setCAModifiedby($c_a_modifiedby) {

    $this->c_a_modifiedby = $c_a_modifiedby;

  } // setCAModifiedby END
  public function getCAModifiedby() {

    return $this->c_a_modifiedby;

  } // getCAModifiedby END


  // c_a_modifieddate GETTER/SETTER
  public function setCAModifieddate($c_a_modifieddate) {

    $this->c_a_modifieddate = $c_a_modifieddate;

  } // setCAModifieddate END
  public function getCAModifieddate() {

    return $this->c_a_modifieddate;

  } // getCAModifieddate END


} // ContentArea END


?>