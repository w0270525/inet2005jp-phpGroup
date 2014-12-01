<?php

include_once("Article.php");

class ContentArea {


  // Variables :
  private $c_a_id;            // Int
  private $c_a_name;          // String
  private $c_a_alias;         // String
  private $c_a_desc;          // String
  private $c_a_order;         // Int
  private $c_a_articles;      // Array of Article Object
  private $c_a_assocpage;     // Int
  private $c_a_createdby;     // Int
  private $c_a_creationdate;  // String
  private $c_a_modifiedby;    // Int
  private $c_a_modifieddate;  // String


  // Default Constructor
  public function __construct($in_id, $in_name, $in_alias, $in_desc, $in_order, $in_articles,
            $in_assocpage, $in_createdby, $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->c_a_id = $in_id;
    $this->c_a_name = $in_name;
    $this->c_a_alias = $in_alias;
    $this->c_a_desc = $in_desc;
    $this->c_a_order = $in_order;
    $this->c_a_articles = $in_articles;
    $this->c_a_assocpage = $in_assocpage;
    $this->c_a_createdby = $in_createdby;
    $this->c_a_creationdate = $in_creationdate;
    $this->c_a_modifiedby = $in_modifiedby;
    $this->c_a_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // c_a_id GETTER
  public function getId() {

    return $this->c_a_id;

  } // getAId END


  // c_a_name GETTER/SETTER
  public function setName($c_a_name) {

    $this->c_a_name = $c_a_name;

  } // setName END
  public function getName() {

    return $this->c_a_name;

  } // getName END


  // a_alias GETTER/SETTER
  public function setAlias($c_a_alias) {

    $this->c_a_alias = $c_a_alias;

  } // setAlias END
  public function getAlias() {

    return $this->c_a_alias;

  } // getAlias END


  // c_a_desc GETTER/SETTER
  public function setDesc($c_a_desc) {

    $this->c_a_desc = $c_a_desc;

  } // setDesc END
  public function getDesc() {

    return $this->c_a_desc;

  } // getDesc END


  // c_a_order GETTER/SETTER
  public function setOrder($c_a_order) {

    $this->c_a_order = $c_a_order;

  } // setOrder END
  public function getOrder() {

    return $this->c_a_order;

  } // getOrder END


  // c_a_articles GETTER
  public function getArticles() {

    return $this->c_a_articles;

  } // getArticles END


  // c_a_assocpage GETTER/SETTER
  public function setAssocpage($c_a_assocpage) {

    $this->c_a_assocpage = $c_a_assocpage;

  } // setAssocpage END
  public function getAssocpage() {

    return $this->c_a_assocpage;

  } // getAssocpage END


  // c_a_createdby GETTER
  public function getCreatedby() {

    return $this->c_a_createdby;

  } // getCreatedby END

  // c_a_creationdate GETTER
  public function getCreationdate() {

    return $this->c_a_creationdate;

  } // getCreationdate END


  // c_a_modifiedby GETTER/SETTER
  public function setModifiedby($c_a_modifiedby) {

    $this->c_a_modifiedby = $c_a_modifiedby;

  } // setModifiedby END
  public function getModifiedby() {

    return $this->c_a_modifiedby;

  } // getModifiedby END


  // c_a_modifieddate GETTER/SETTER
  public function setModifieddate($c_a_modifieddate) {

    $this->c_a_modifieddate = $c_a_modifieddate;

  } // setModifieddate END
  public function getModifieddate() {

    return $this->c_a_modifieddate;

  } // getModifieddate END


} // ContentArea END


?>