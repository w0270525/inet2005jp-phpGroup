<?php

require_once '../model/class/ContentArea.php';
require_once '../model/data/PDOMySQLContentAreaModel.php';

class ContentAreaModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLContentAreaDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    // get all ContentAreas from the CMS
    public function getAllContentAreas()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfPageObjects = array();

        $this->m_DataAccess->selectContentArea();
        $int=0;

        while($row =  $this->m_DataAccess-> fetchContentAreas())

        {

            $currentContentArea =$this->constructContentArea($row);
            $arrayOfContentAreaObjects[$int] = $currentContentArea;
            $int++;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfContentAreaObjects;
    }

    // returns a single ContentArea fetched from the CMS
    public function getContentArea($ContentAreaID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectContentAreaById($ContentAreaID);

        $record =  $this->m_DataAccess->fetchContentAreas();

        $fetchedContentArea = $this->constructContentArea($record);

        $this->m_DataAccess->closeDB();

        return $fetchedContentArea;
    }

    //  Updates a contentarea in the CMS
    public function updateContentArea($ContentAreaToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateContentArea($ContentAreaToUpdate-> getID(),
            $ContentAreaToUpdate->getName(),
            $ContentAreaToUpdate->getContentArea(),
            $ContentAreaToUpdate->getAlias(),
            $ContentAreaToUpdate->getDesc(),
            $ContentAreaToUpdate->getStyle(),
            $ContentAreaToUpdate->getCreatedby(),
            $ContentAreaToUpdate->getModifiedby(),
            $ContentAreaToUpdate->getAModifieddate());

        return "$recordsAffected record(s) updated succesfully!";
    }



    //forms a Content Area from the input array and returns it
    private function constructContentArea($row)
    {
        $currentContentArea = new ContentArea(null,
            $this->m_DataAccess->fetchContentAreaName($row),
            $this->m_DataAccess->fetchContentAreaAlias($row),
            $this->m_DataAccess->fetchContentAreaDescription($row),
            $this->m_DataAccess->fetchContentAreaOrder($row),
            null,
            $this->m_DataAccess->fetchContentAreaAssocPage($row),
            $this->m_DataAccess->fetchContentAreaCreatedBy($row),
            $this->m_DataAccess->fetchContentAreaCreatedDate($row),
            $this->m_DataAccess->fetchContentAreaModifiedBy($row),
            $this->m_DataAccess->fetchContentAreaLastModifiedDate($row));
       // $this->m_DataAccess->selectContentAreaArticles($currentContentArea->getId());
      //  $currentContentArea->setArticles($this->m_DataAccess->fetchContentAreaArticles($row));
        return $currentContentArea;



    }



    //adds a content are to the database
    function addContentArea($contentArea){
       return $this->m_DataAccess->insertContentArea($contentArea);

    }

    function getContentAreaByName($name){
         $this->m_DataAccess->selectContentAreaByName($name);
         return      $this->m_DataAccess->fetchContentAreas();

    }
}
?>
