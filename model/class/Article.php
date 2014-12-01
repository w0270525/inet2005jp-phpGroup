<?php


class Article {


  // Variables :
  private $a_id;            // Int
  private $a_contentarea;   // Int
  private $a_name;          // String
  private $a_title;         // String
  private $a_desc;          // String
  private $a_blurb;         // String
  private $a_content;       // String
  private $a_assocpage;     // Int
  private $a_allpages;      // Bool
  private $a_createdby;     // Int
  private $a_creationdate;  // String
  private $a_modifiedby;    // Int
  private $a_modifieddate;  // String


  // Default Constructor
  public function __construct($in_id, $in_contentarea, $in_name, $in_title, $in_desc,
                   $in_blurb, $in_content, $in_assocpage, $in_allpages, $in_createdby,
                                  $in_creationdate, $in_modifiedby, $in_modifieddate) {

    $this->a_id = $in_id;
    $this->a_contentarea = $in_contentarea;
    $this->a_name = $in_name;
    $this->a_title = $in_title;
    $this->a_desc = $in_desc;
    $this->a_blurb = $in_blurb;
    $this->a_content = $in_content;
    $this->a_assocpage = $in_assocpage;
    $this->a_allpages = $in_allpages;
    $this->a_createdby = $in_createdby;
    $this->a_creationdate = $in_creationdate;
    $this->a_modifiedby = $in_modifiedby;
    $this->a_modifieddate = $in_modifieddate;

  } // Default Constructor END


  // a_id GETTER
  public function getId() {

    return $this->a_id;

  } // getAId END


  // a_contentarea GETTER/SETTER
  public function setContentarea($a_contentarea) {

    $this->a_contentarea = $a_contentarea;

  } // setAContentarea END
  public function getContentarea() {

    return $this->a_contentarea;

  } // getAContentarea END


  // a_name GETTER/SETTER
  public function setName($a_name) {

    $this->a_name = $a_name;

  } // setAName END
  public function getName() {

    return $this->a_name;

  } // getAName END


  // a_title GETTER/SETTER
  public function setTitle($a_title) {

    $this->a_title = $a_title;

  } // setATitle END
  public function getTitle() {

    return $this->a_title;

  } // getATitle END


  // a_desc GETTER/SETTER
  public function setDesc($a_desc) {

    $this->a_desc = $a_desc;

  } // setADesc END
  public function getDesc() {

    return $this->a_desc;

  } // getADesc END


  // a_blurb GETTER/SETTER
  public function setBlurb($a_blurb) {

    $this->a_blurb = $a_blurb;

  } // setABlurb END
  public function getBlurb() {

    return $this->a_blurb;

  } // getABlurb END


  // a_content GETTER/SETTER
  public function setContent($a_content) {

    $this->a_content = $a_content;

  } // setAContent END
  public function getContent() {

    return $this->a_content;

  } // getAContent END


  // a_assocpage GETTER/SETTER
  public function setAssocpage($a_assocpage) {

    $this->a_assocpage = $a_assocpage;

  } // setAAssocpage END
  public function getAssocPage() {

    return $this->a_assocpage;

  } // getAAssocpage END


  // a_allpages GETTER/SETTER
  public function setAllPages($a_allpages) {

    $this->a_allpages = $a_allpages;

  } // setAllPages END
  public function getAllPages() {

    return $this->a_allpages;

  } // getAllPages END


  // a_createdby GETTER
  public function getCreatedBy() {

    return $this->a_createdby;

  } // getACreatedby END


  // a_creationdate GETTER
  public function getCreatedDate() {

    return $this->a_creationdate;

  } // getACreationdate END


  // a_modifiedby GETTER/SETTER
  public function setModifiedBy($a_modifiedby) {

    $this->a_modifiedby = $a_modifiedby;

  } // setAModifiedby END
  public function getModifiedBy() {

    return $this->a_modifiedby;

  } // getAModifiedby END


  // a_modifieddate GETTER/SETTER
  public function setModifiedDate($a_modifieddate) {

    $this->a_modifieddate = $a_modifieddate;

  } // setAModifieddate END
  public function getModifiedDate() {

    return $this->a_modifieddate;

  } // getAModifieddate END


} // Article END


?>