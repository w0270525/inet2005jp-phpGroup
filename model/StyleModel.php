<?php

require_once '../model/class/Style.php';
require_once '../model/data/PDOMySQLStyleDataModel.php';

class StyleModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLStyleDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    // get all Style from the CMS
    public function getAllStyles()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfPageObjects = array();

        $this->m_DataAccess->selectStyles();

        while($row =  $this->m_DataAccess->fetchStyles())

        {

            $currentPage =$this->constructStyle($row);
            $arrayOfPageObjects[] = $currentPage;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfPageObjects;
    }

    // Retrieve the current style;
    public function getActiveStyle() {

      // Open DB;
      $this->m_DataAccess->connectToDB();
      // Select;
      $this->m_DataAccess->selectActiveStyle();
      // Get row;
      $row = $this->m_DataAccess->fetchStyles();
      // Construct Style Object;
      $currentStyle = $this->constructStyle($row);
      // Close DB;
      $this->m_DataAccess->closeDB();
      // Return Object;
      return $currentStyle;

    } // getActiveStyle END


    // Style = getStyle(Int styleId);
    // returns a single Style fetched from the last select query that was run
    public function getStyle($styleID)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->selectStyleByIntId($styleID);
        $record =  $this->m_DataAccess->fetchStyles();
        $fetchedPage = $this->constructStyle($record);
        $this->m_DataAccess->closeDB();
        return $fetchedPage;
    } // end getStyle


    // gets an style by name and returns it right away
    public function getStyleByName($name)
    {
        $this->m_DataAccess->connectToDB();

        $record = $this->m_DataAccess->selectStyleByName($name);

        $fetchedArticle = $this->constructStyle($record);

        $this->m_DataAccess->closeDB();

        return $fetchedArticle;
    }



    // attempts to insert a style into the databse and will return 1 if success
    public function addStyle($s_name,   $s_desc, $s_style ,$userId )
    {

        $currentStyle = new Style(null,$s_name,  $s_desc,$s_style,  0, $userId, null ,$userId ,null);
        return $this->m_DataAccess->insertStyle($currentStyle);
    }



    //  Updates a Style in the CMS
    public function updateStyle($styleToUpdate)
    {
        return $this->m_DataAccess->updateStyle($styleToUpdate);

    }



    //forms a Style from the input array and returns it
    private function constructStyle($row)
    {
        $currentStyle = new Style($this->m_DataAccess->fetchStyleID($row),
            $this->m_DataAccess->fetchStyleName($row),
            $this->m_DataAccess->fetchStyleDescription($row),
            $this->m_DataAccess->fetchStyleStyle($row),
            $this->m_DataAccess->fetchStyleActive($row),
            $this->m_DataAccess->fetchStyleCreatedBy($row),
            $this->m_DataAccess->fetchStyleCreatedDate($row),
            $this->m_DataAccess->fetchStyleLastModifiedBy($row),
            $this->m_DataAccess->fetchStyleLastModifiedDate($row));
        return $currentStyle;


    }



    function removeStyle($id)
    {
        $currentStyle=  $this->getStyle($id);
        return $this->m_DataAccess->deleteStyle($currentStyle)  ;
    }
}
?>
