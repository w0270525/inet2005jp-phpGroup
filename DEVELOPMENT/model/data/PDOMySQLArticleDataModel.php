<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once  ('functions.php');
require_once 'iArticleDataModel.php';
class PDOMySQLArticleDataModel implements iArticleDataModel
{
    private $connObject;
    private $dbConnection;
    private $result;
    private $stmt;

    // iCustomerDataAccess methods
    public function connectToDB()
    {
        if(isset($this->connObject)) $this->closeDB();
        $this->connObject = new connect();
        $this->connObject->connectToDB();
        $this->dbConnection = $this->connObject->getConnection();


    }

    // disconnect from CMS Database by destroying connection object
    public function closeDB()
    {
        $this->connObject=null;
    }

    // gets all the Articles from the database
    // returns an array with Articles information including roles
    public function selectArticles()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        $selectStatement = "SELECT * FROM ARTICLE ";
        $selectStatement .= " LEFT JOIN PAGE ON a_assocpage = PAGE.p_id ";
        $selectStatement .= " LIMIT :start,:count;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticles failed  in PDOMySQLPageArticleModel: : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }

    public function selectArticleByArticleId($articleID)
    {
        $selectStatement = "SELECT * FROM ARTICLE";
        $selectStatement .= " LEFT JOIN PAGE ON a_assocpage = PAGE.p_id ";
        $selectStatement .= " WHERE ARTICLE.a_id = :articleID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$articleID', $articleID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByArticleId failed  in PDOMySQLPageArticleModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Articles asscoiated with a specific page ID
    public function selectArticleByPageId($pageID)
    {
        $selectStatement = "SELECT * FROM ARTICLE";
        $selectStatement .= " LEFT JOIN PAGE ON a_assocpage = PAGE.p_id ";
        $selectStatement .= " WHERE PAGE.p_id = :pageID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByPageId failed  in PDOMySQLPageArticleModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Articles  result query of the Content Managemtn System
    public function fetchArticle()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('fetchArticle failed  in PDOMySQLPageArticleModel: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS user
    // need to add modified by param
//    public function updateArticle($userID,$first_name,$last_name,$username)
//    {
//        $updateStatement = "UPDATE user";
//        $updateStatement .= " SET u_fname = :firstName,u_lname=:lastName, u_username=:username";
//        $updateStatement .= " WHERE u_id = :userID;";
//
//        try
//        {
//            $this->stmt = $this->dbConnection->prepare($updateStatement);
//            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
//            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
//            $this->stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
//            $this->stmt->bindParam(':userName', $username, PDO::PARAM_STR);
//            $this->stmt->execute();
//
//            return $this->stmt->rowCount();
//        }
//        catch(PDOException $ex)
//        {
//            die('Update failed : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
//        }
//    }

    // returns the Article id
    public function fetchArticleID($row)
    {
        return $row['a_id'];
    }

    // returns the Article  Name
    public function fetchArticleName($row)
    {
        return $row['a_name'];
    }

    // returs the Article title
    public function fetchArticleTitle($row)
    {
        return $row['a_title'];
    }

    // returns the  Article description
    public function fetchArticleDescription($row)
    {
        return $row['a_desc'];
    }

    // returns the Article blurb
    public function fetchArticleBlurb($row)
    {
        return $row['a_blurb'];

    }
    // returns the Article content ares
    public function fetchArticleContentArea($row)
    {
        return $row['a_blurb'];

    }
    // returns the Article cotnent
    public function fetchArticleContent($row)
    {
        return $row['a_content'];
    }

    // returns the Article asscoiated page
    public function fetchArticleAssocPage($row)
    {
        return $row['a_assocpage'];
    }

    // returns the Article modified by
    public function fetchArticleLastModifiedBy($row)
    {
        return $row['a_lastmodifiedby']   ;
    }

    // returns user creation date
    public function fetchArticleCreatedDate($row)
    {
        return $row['a_creationdate'];
    }

    // retrun user creator
    public function fetchArticleCreatedBy($row)
    {
        return $row['a_createdby'];
    }

    // returns last modified date
    public function fetchArticleLastModifiedDate($row)
    {
        return $row['a_modifieddate'];
    }
}

?>
