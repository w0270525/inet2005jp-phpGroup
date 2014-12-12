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

    // get all Articles from the CMS
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

    // Get all articles associated with given page;
    public function getAllArticlesByPageId($pageId) {

      // Open DB;
      $this->m_DataAccess->connectToDB();
      // Define Array;
      $arrayOfArticles = array();
      // Select;
      $this->m_DataAccess->selectArticleByPageId($pageId);
      // Loop through, and populate;
      while($row = $this->m_DataAccess->fetchArticle()) {

        $currentArticle = $this->constructArticle($row);
        $arrayOfArticles[] = $currentArticle;

      } // while END
      // Close DB;
      $this->m_DataAccess->closeDB();
      // Return Array;
      return $arrayOfArticles;

    } // getAllArticlesByPageId END

    // returns a single Article fetched from the CMS
    public function getArticle($articleID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectArticleByArticleId($articleID);

        $record =  $this->m_DataAccess->fetchArticle();

        $fetchedArticle = $this->constructArticle($record);

        $this->m_DataAccess->closeDB();

        return $fetchedArticle;
    }

    // gets an article by name and returns it right away
    public function getArticleByName($name)
    {
        $this->m_DataAccess->connectToDB();

        $record = $this->m_DataAccess->selectArticleByArticleName($name);

        $fetchedArticle = $this->constructArticle($record);

        $this->m_DataAccess->closeDB();

        return $fetchedArticle;
    }


//  Updates a article in the CMS
public function updateArticle($articleToUpdate)
{
   return  $this->m_DataAccess->updateArticle($articleToUpdate);
}


    //  Updates a article in the CMS
    public function updatetArticle($articleToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateArticle($articleToUpdate->getId(),
            $articleToUpdate->getName(),
            $articleToUpdate->getContentArea(),
            $articleToUpdate->getTile(),
            $articleToUpdate->getDesc(),
            $articleToUpdate->getBlurb(),
            $articleToUpdate->getContent(),
            $articleToUpdate->getAssocPage(),
            $articleToUpdate->getCreatedBy(),
            $articleToUpdate->getModifiedBy(),
            $articleToUpdate->getModifieDate(),
            $articleToUpdate->getActive());
        $this->m_DataAccess->closeDB();
        return "$recordsAffected record(s) updated succesfully!";
    }

    // attempts to update a recod into the databse and will return 1 if success
    public function insertArticle($article)
    {
        $this->m_DataAccess->connectToDB();
       $article->setModifiedBy(CMS_getUser()->getid());
        $this->m_DataAccess->closeDB();
        return $this->m_DataAccess->insertArticle($article) ;
    }

    // Article = contructArticle(Array[QueryResult] $row);
    //forms a article from the input array and returns it
    private function constructArticle($row)
    {
        $currentArticle = new Article($this->m_DataAccess->fetchArticleID($row),
            $this->m_DataAccess->fetchArticleContentArea($row),
            $this->m_DataAccess->fetchArticleName($row),
            $this->m_DataAccess->fetchArticleTitle($row),
            $this->m_DataAccess->fetchArticleDescription($row),
            $this->m_DataAccess->fetchArticleBlurb($row),
            $this->m_DataAccess->fetchArticleContent($row),
            $this->m_DataAccess->fetchArticleAssocPage($row),
            $this->m_DataAccess->fetchArticleInAllPages($row),
            $this->m_DataAccess->fetchArticleCreatedBy($row),
            $this->m_DataAccess->fetchArticleCreatedDate($row),
            $this->m_DataAccess->fetchArticleLastModifiedBy($row),
            $this->m_DataAccess->fetchArticleLastModifiedDate($row),
            $this->m_DataAccess->fetchArticleInActive($row));
        return $currentArticle;
    }


        public function removeArticle($article){
            $this->m_DataAccess->connectToDB();
             $array= $this->m_DataAccess->deleteArticle($article);
            $this->m_DataAccess->closeDB();
            return $array;


        }

    public function getAllActiveArticlesByPageId($article){
        $this->m_DataAccess->connectToDB();$arrayOfArticles = array();
         $this->m_DataAccess->selectActiveArticlesByPageId($article);
        while($row = $this->m_DataAccess->fetchArticle()) {

            $currentArticle = $this->constructArticle($row);
            $arrayOfArticles[] = $currentArticle;

        } // while END
        $this->m_DataAccess->closeDB();
        return $arrayOfArticles;


    }



    public function getArticleCountByCreatorId($id)
    {
        $this->m_DataAccess->connectToDB();
        $result  =  $this->m_DataAccess->getArticleCountByCreatorId($id);
        $this->m_DataAccess->closeDB();
        return $result;

    }

    // grabs the articles created by a specifeid yser
    public function selectArticlesByCreator($id)
    {
        $arrayOfArticleObjects = array();
        $this->m_DataAccess->connectToDB();
        $result = $this->m_DataAccess->selectArticlesByCreator($id);
        $this->m_DataAccess->closeDB();
        foreach($result as $article)
            $arrayOfArticleObjects[]=$this->constructArticle($article);
        return  $arrayOfArticleObjects;

    }



}
?>
