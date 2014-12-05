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
            $articleToUpdate->getModifieDate());

        return "$recordsAffected record(s) updated succesfully!";
    }

    // attempts to insert a recod into the databse and will return 1 if success
    public function addArticle($conentArea,$a_name,$a_title, $a_desc, $a_blurb, $a_content, $a_page, $all_pages,$userId )
    {
       $arrya =array(1,2,3);
       $currentArticle = new Article(null,$conentArea,$a_name,$a_title, $a_desc, $a_blurb, $a_content,$a_page,$all_pages,$userId ,null,$userId,null);
      return $this->m_DataAccess->insertArticle($currentArticle);
    }

    //forms a article from the input array and returns it
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
            $this->m_DataAccess->fetchArticleInAllPages($row),
            $this->m_DataAccess->fetchArticleCreatedBy($row),
            $this->m_DataAccess->fetchArticleCreatedDate($row),
            $this->m_DataAccess->fetchArticleLastModifiedBy($row),
            $this->m_DataAccess->fetchArticleLastModifiedDate($row));
        return $currentUser;


    }


        public function removeArticle($article){
             return $this->m_DataAccess->deleteArticle($article);

        }
}
?>
