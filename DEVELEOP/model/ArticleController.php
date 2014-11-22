<?php

require_once '../model/class/Article.php';
require_once '../model/data/PDOMySQLUserDataModel.php';

class UserModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLUserDataModel();
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

        while($row =  $this->m_DataAccess->fetchArticles())
        {

            $currentArticle =$this->constructUser($row);
            $arrayOfArticleObjects[] = $currentArticle;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfArticleObjects;
    }

    // returns a single Article fetched from the CMS
    public function getUser($articleID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectUserById($articleID);

        $record =  $this->m_DataAccess->fetchUsers();

        $fetchedArticle = $this->constructUser($record);

        $this->m_DataAccess->closeDB();

        return $fetchedArticle;
    }

    //  Updates a user in the CMS
    public function updateArticle($articleToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateArticle($articleToUpdate->getID(),
            $ArticleToUpdate->getFirstname(),
            $ArticleoUpdate->getLastName(),
            $ArticleToUpdate->getUsername());

        return "$recordsAffected record(s) updated succesfully!";
    }



    //forms a user from the input array and returns it
    private function constructArticle($row)
    {
        $currentUser = new User($this->m_DataAccess->fetchUserID($row),
            $this->m_DataAccess->fetchArticleId($row),
            $this->m_DataAccess->fetchArticleContent($row),
            $this->m_DataAccess->fetchArticleName($row),
            $this->m_DataAccess->fetchArticleTitle($row),
            $this->m_DataAccess->fetchArticleContent($row),
            $this->m_DataAccess->fetchArticleAssocPage($row),
            $this->m_DataAccess->fetchArticleCreator($row),
            $this->m_DataAccess->fetchArticleCreationDate($row),
            $this->m_DataAccess->fetchArticleLastModifiedBy($row),
            $this->m_DataAccess->fetchArticleLastModifiedDate($row));
        return $currentUser;
    }
}
?>
