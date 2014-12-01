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

        while($row =  $this->m_DataAccess-> fetchStyles())

        {

            $currentPage =$this->constructStyle($row);
            $arrayOfPageObjects[] = $currentPage;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfPageObjects;
    }

    // returns a single Style fetched from the CMS
    public function getStyle($styleID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectStyleById($styleID);

        $record =  $this->m_DataAccess->fetchStyle();

        $fetchedPage = $this->constructStyle($record);

        $this->m_DataAccess->closeDB();

        return $fetchedPage;
    }

    //  Updates a Style in the CMS
    public function updatePage($styleToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateStyle($styleToUpdate-> getID(),
            $styleToUpdate->getName(),
            $styleToUpdate->getStyle(),
            $styleToUpdate->getDesc(),
            $styleToUpdate->getStyle(),
            $styleToUpdate->getCreatedby(),
            $styleToUpdate->getActve(),
            $styleToUpdate->getCreateDate(),
            $styleToUpdate->getModifiedby(),
            $styleToUpdate->getAModifieddate());

        return "$recordsAffected record(s) updated succesfully!";
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
}
?>
