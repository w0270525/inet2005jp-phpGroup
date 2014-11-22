<?php


class User_ {


  // Variables :
  private $u_id;
  private $u_fname;
  private $u_lname;
  private $u_username;
  private $u_pass;
  private $u_salt;
  private $u_createdby;
  private $u_creationdate;
  private $u_modifiedby;
  private $u_modifieddate;


  // Default Contructor
  public function __construct($in_id, $in_fname, $in_lname, $in_username, $in_pass, $in_salt,
                           $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->u_id = $in_id;
    $this->u_fname = $in_fname;
    $this->u_lname = $in_lname;
    $this->u_username = $in_username;
    $this->u_pass = $in_pass;
    $this->u_salt = $in_salt;
    $this->u_createdby = $in_createdby;
    $this->u_creationdate = $in_creationdate;
    $this->u_modifiedby = $in_modifiedby;
    $this->u_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // u_id GETTER
  public function getUId() {

    return $this->u_id;

  } // getUId END


  // u_fname GETTER/SETTER
  public function setUFname($u_fname) {

    $this->u_fname = $u_fname;

  } // setUFname END
  public function getUFname() {

    return $this->u_fname;

  } // getUFname END


  // u_lname GETTER/SETTER
  public function setULname($u_lname) {

    $this->u_lname = $u_lname;

  } // setULname END
  public function getULname() {

    return $this->u_lname;

  } // getULname END


  // u_username GETTER/SETTER
  public function setUUsername($u_username) {

    $this->u_username = $u_username;

  } // setUUsername END
  public function getUUsername() {

    return $this->u_username;

  } // getUUsername END


  // u_pass GETTER/SETTER
  public function setUPass($u_pass) {

    $this->u_pass = $u_pass;

  } // setUPass END
  public function getUPass() {

    return $this->u_pass;

  } // getUPass END


  // u_salt GETTER/SETTER
  public function setUSalt($u_salt) {

    $this->u_salt = $u_salt;

  } // setUSalt END
  public function getUSalt() {

    return $this->u_salt;

  } // getUSalt END


  // u_createdby GETTER
  public function getUCreatedby() {

    return $this->u_createdby;

  } // getUCreatedby END


  // u_creationdate GETTER
  public function getUCreationdate() {

    return $this->u_creationdate;

  } // getUCreationdate END


  // u_modifiedby GETTER/SETTER
  public function setUModifiedby($u_modifiedby) {

    $this->u_modifiedby = $u_modifiedby;

  } // setUModifiedby END
  public function getUModifiedby() {

    return $this->u_modifiedby;

  } // getUModifiedby END


  // u_modifieddate GETTER/SETTER
  public function setUModifieddate($u_modifieddate) {

    $this->u_modifieddate = $u_modifieddate;

  } // setUModifieddate END
  public function getUModifieddate() {

    return $this->u_modifieddate;

  } // getUModifieddate END


} // User END


?>