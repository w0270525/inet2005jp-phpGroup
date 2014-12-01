<?php

require_once '../model/class/Article.php';
require_once '../model/data/PDOMySQLArticleDataModel.php';

class ArticleModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLArticleDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    // get all users from the CMS
    public function getAllArticles()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfArticleObjects = array();

        $this->m_DataAccess->selectArticles();

        while($row =  $this->m_DataAccess->fetchArticle())
        {

            $currentArticle =$this->constructArticle($row);
            $arrayOfArticleObjects[] = $currentArticle;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfArticleObjects;
    }

    // returns a single Article fetched from the CMS
    public function getArticle($articleID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectArticleById($articleID);

        $record =  $this->m_DataAccess->fetchArticles();

        $fetchedArticle = $this->constructArticle($record);

        $this->m_DataAccess->closeDB();

        return $fetchedArticle;
    }

    //  Updates a user in the CMS
    public function updateArticle($articleToUpdate)
    {
        $this->m_DataAccess->connectToDB();
        $a=new Article();$a->
        $recordsAffected = $this->m_DataAccess->updateArticle($articleToUpdate->getId(),
            $articleToUpdate->getName(),
            $articleToUpdate->getContentArea(),
            $articleToUpdate->getTile(),
            $articleToUpdate->getDesc(),
            $articleToUpdate->getBlurb(),
            $articleToUpdate->getContent(),
            $articleToUpdate->getAssocpage(),
            $articleToUpdate->getCreatedby(),
            $articleToUpdate->getModifiedby(),
            $articleToUpdate->getAModifieddate());

        return "$recordsAffected record(s) updated succesfully!";
    }



    //forms a user from the input array and returns it
    private function constructArticle($row)
    {
        $currentUser = new Article($this->m_DataAccess->fetchArticleID($row),
            $this->m_DataAccess->fetchArticleContentArea($row),
            $this->m_DataAccess->fetchArticleName($row),
            $this->m_DataAccess->fetchArticleTitle($row),
            $this->m_DataAccess->fetchArticleDescription($row),
            $this->m_DataAccess->fetchArticleBlurb($row),
            $this->m_DataAccess->fetchArticleContent($row),
            $this->m_DataAccess->fetchArticleAssocPage($row),
            $this->m_DataAccess->fetchArticleCreatedBy($row),
            $this->m_DataAccess->fetchArticleCreatedDate($row),
            $this->m_DataAccess->fetchArticleLastModifiedBy($row),
            $this->m_DataAccess->fetchArticleLastModifiedDate($row));
        return $currentUser;


    }
}
?>
