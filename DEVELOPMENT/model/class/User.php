<?php
require_once '../model/data/PDOMySQLUserDataModel.php';


class User {


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
  private $u_r_id;

  // Default Contructor
  public function __construct($in_id, $in_fname, $in_lname, $in_username, $in_pass, $in_salt,
                           $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate,$u_r_id){
//
//      $this->__construct($in_id, $in_fname, $in_lname, $in_username, $in_pass, $in_salt,
//          $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate);
       $this->u_r_id=$u_r_id;
//

//  public function __construct($in_id, $in_fname, $in_lname, $in_username, $in_pass, $in_salt,
//                           $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

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
  public function getId() {

    return $this->u_id;

  } // getUId END


  // u_fname GETTER/SETTER
  public function setFirstName($u_fname) {

    $this->u_fname = $u_fname;

  } // setUFname END
  public function getFirstName() {

    return $this->u_fname;

  } // getUFname END


  // u_lname GETTER/SETTER
  public function setLastName($u_lname) {

    $this->u_lname = $u_lname;

  } // setULname END
  public function getLastName() {

    return $this->u_lname;

  } // getULname END


  // u_username GETTER/SETTER
  public function setUsername($u_username) {

    $this->u_username = $u_username;

  } // setUUsername END
  public function getUsername() {

    return $this->u_username;

  } // getUUsername END


  // u_pass GETTER/SETTER
  public function setPass($u_pass) {

    $this->u_pass = $u_pass;

  } // setUPass END
  public function getPass() {

    return $this->u_pass;

  } // getUPass END


  // u_salt GETTER/SETTER
  public function setSalt($u_salt) {

    $this->u_salt = $u_salt;

  } // setUSalt END
  public function getSalt() {

    return $this->u_salt;

  } // getUSalt END


  // u_createdby GETTER
  public function getCreatedby() {

    return $this->u_createdby;

  } // getUCreatedby END


  // u_creationdate GETTER
  public function getCreationDate() {

    return $this->u_creationdate;

  } // getUCreationdate END


  // u_modifiedby GETTER/SETTER
  public function setModifiedBy($u_modifiedby) {

    $this->u_modifiedby = $u_modifiedby;

  } // setUModifiedby END
  public function getModifiedBy() {

    return $this->u_modifiedby;

  } // getUModifiedby END


  // u_modifieddate GETTER/SETTER
  public function setModifiedDate($u_modifieddate) {

    $this->u_modifieddate = $u_modifieddate;

  } // setUModifieddate END

  public function getModifiedDate() {

    return $this->u_modifieddate;

  } // getUModifieddate END

    // role id GETTER/SETTER
    public function setRoleId($u_modifieddate) {

        $this->u_modifieddate = $u_modifieddate;

    }
    public function getRoleId() {

        return $this->u_r_id;

    } // getUModifieddate END
} // User END


?>