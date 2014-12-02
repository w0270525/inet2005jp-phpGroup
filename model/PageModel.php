<?php

require_once '../model/class/Page.php';
require_once '../model/data/PDOMySQLPageDataModel.php';

class PageModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLPageDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    // get all users from the CMS
    public function getAllPages()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfPageObjects = array();

        $this->m_DataAccess->selectPages();
        $int=0;

        while($row =  $this->m_DataAccess-> fetchPage())

        {

            $currentPage =$this->constructPage($row);
            $arrayOfPageObjects[$int] = $currentPage;
            $int++;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfPageObjects;
    }

    // returns a single Page fetched from the CMS
    public function getPage($pageID)
    {
        $this->m_DataAccess->connectToDB();

  //      $this->m_DataAccess->selectPageById($pageID);

   //     $record =  $this->m_DataAccess->fetchPage();
        $record = $this->m_DataAccess->selectPageById($pageID);

        $fetchedPage = $this->constructPage($record);

        $this->m_DataAccess->closeDB();

        return $fetchedPage;
    }

    //  Updates a user in the CMS
    public function updatePage($pageToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updatePage($pageToUpdate-> getID(),
            $pageToUpdate->getName(),
            $pageToUpdate->getContentArea(),
            $pageToUpdate->getAlias(),
            $pageToUpdate->getDesc(),
            $pageToUpdate->getStyle(),
            $pageToUpdate->getCreatedby(),
            $pageToUpdate->getModifiedby(),
            $pageToUpdate->getAModifieddate());

        return "$recordsAffected record(s) updated succesfully!";
    }

    public    function getPageByName($name)
       {
           $this->m_DataAccess->selectPagesByName($name);
           return $this->constructPage($this->m_DataAccess->fetchPage());
       }


    public function addPage($row)
    {
        return   $this->m_DataAccess->insertPage($row);
    }

    //forms a Article from the input array and returns it
    private function constructPage($row)
    {
        $currentPage = new Page($this->m_DataAccess->fetchPageID($row),
            $this->m_DataAccess->fetchPageName($row),
            $this->m_DataAccess->fetchPageAlias($row),
            $this->m_DataAccess->fetchPageDescription($row),
            $this->m_DataAccess->fetchPageStyle($row),
             null,
            $this->m_DataAccess->fetchPageCreatedBy($row),
            $this->m_DataAccess->fetchPageCreatedDate($row),
            $this->m_DataAccess->fetchPageLastModifiedBy($row),
            $this->m_DataAccess->fetchPageLastModifiedDate($row),
        $this->m_DataAccess->fetchPageStyle($row));
        return $currentPage;


    }
}
?>
