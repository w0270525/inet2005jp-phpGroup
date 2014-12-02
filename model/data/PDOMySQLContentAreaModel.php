<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('functions.php');
require_once 'iContentAreaDataModel.php';
class PDOMySQLContentAreaDataModel implements iContentAreaDataModel
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

    // gets all the ContentAreas from the database
    // Selects thw content REA BASED ON id
    //Returns a rowcount of the result
    public function selectContentArea()
    {
          $selectStatement = "SELECT * FROM CONTENT_AREAS LEFT JOIN   USER ON c_a_createdby = USER.u_id ";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectContentAreas() failed  in PDOMySQLPageContentAreaModel: \n'.$selectStatement.'\n Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }


    // Selects thw content REA BASED ON id
    //Returns a rowcount of the result
    public function selectContentAreaByID($ContentAreaID)
    {
        $selectStatement = "SELECT * FROM CONTENT_AREAS LEFT JOIN   USER ON c_a_createdby = USER.u_id ";

        $selectStatement .= " WHERE ContentArea.a_id = :ContentAreaID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$ContentAreaID', $ContentAreaID, PDO::PARAM_INT);

            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectContentAreaByContentAreaId failed  in PDOMySQLPageContentAreaModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }


    // selectsd content area by name
    public function selectContentAreaByName($name)
    {
        $selectStatement = "SELECT * FROM CONTENT_AREAS LEFT JOIN   USER ON c_a_createdby = USER.u_id ";

        $selectStatement .= " WHERE c_c_name  = :name;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':name', $name, PDO::PARAM_INT);

            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectContentAreaByPageId failed  in PDOMySQLPageContentAreaModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }


    // returns the ContentAreas asscoiated with a specific PAGES ID
    public function selectContentAreaByPageId($pageID)
    {
        $selectStatement = "SELECT * FROM ContentArea";
        $selectStatement .= " LEFT JOIN PAGES ON a_assocpage = PAGES.p_id ";
        $selectStatement .= " WHERE PAGES.p_id = :pageID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectContentAreaByPageId failed  in PDOMySQLPageContentAreaModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the ContentAreas  result query of the Content Managemtn System
    public function fetchContentAreaArticles()
    {
        try
        {
            $arrayOfArticle =   array();$int=0;
            while($row= $this->stmt->fetch(PDO::FETCH_ASSOC))
            {

             $arrayOfArticle[$int]=$row["a_id"];$int++ ;
            }
            return $arrayOfArticle;
        }
        catch(PDOException $ex)
        {
            die('fetchContentAreaArticles failed  in PDOMySQLPageContentAreaModel: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }


      // selsct she content area articls for a specuifucs page
    public function selectContentAreaArticles($contentID)
    {
        $selectStatement =  "SELECT * FROM ARTICLE JOIN CONTENT_AREAS ON a_contentarea  = CONTENT_AREAS.c_a_id  ";
        $selectStatement .= " WHERE ARTICLE.a_contentarea = :c_id;";



        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':c_id', $contentID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectContentAreaByPageId failed  in PDOMySQLPageContentAreaModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // adds a content aREA IN TO THE DATABSE
    public function insertContentArea($contentArea)
    {
        try{
            $this->stmt = $this->dbConnection->prepare(' SELECT  COUNT(*) FROM CONTENT_AREAS ');
            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('insertpage  failed retrieving vount of CONTENT_AREASTABLE in PDOMySQLPageDataModel:\n: Could not insert records from CMS  Database via PDO: ' . $ex->getMessage());
        }
      $count = $this->stmt->fetch(PDO::FETCH_ASSOC);

        $insertStatement = "INSERT INTO  CONTENT_AREAS  VALUES (DEFAULT, :c_name, :c_alais, :c_desc,  '.$count.' , :c_createdby , default,:c_modifiedby , default );";


        try{
            $this->stmt = $this->dbConnection->prepare($insertStatement);
            $this->stmt->bindParam(':c_name', $contentArea->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':c_alais', $contentArea->getAlias(), PDO::PARAM_STR);
            $this->stmt->bindParam(':c_desc', $contentArea->getDesc(), PDO::PARAM_INT);

            $this->stmt->bindParam(':c_createdby', $contentArea->getCreatedBy(), PDO::PARAM_STR);
            $this->stmt->bindParam(':c_modifiedby', $contentArea->getCreatedBy(), PDO::PARAM_STR);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('insertpage  failed  in PDOMySQLPageDataModel:\n'.$insertStatement.' Could not insert records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }

    //retruns ams array of content aread
    function fetchContentAreas()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('fetchContentArea failed  in PDOMySQLPageContentAreaModel: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS user
    // need to add modified by param
//    public function updateContentArea($userID,$first_name,$last_name,$username)
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

    // returns the ContentArea id
    public function fetchContentAreaID($row)
    {
        return $row['c_a_id'];
    }

    // returns the ContentArea  Name
    public function fetchContentAreaName($row)
    {
        return $row['c_a_name'];
    }

    // returs the ContentArea title
    public function fetchContentAreaAlias($row)
    {
        return $row['c_a_alias'];
    }

    // returns the  ContentArea description
    public function fetchContentAreaDescription($row)
    {
        return $row['c_a_desc'];
    }

    // returns the ContentArea blurb
//    public function fetchContentAreaBlurb($row)
//    {
//        return $row['a_blurb'];
//
//    }

    // returns the ContentArea cotnent
//    public function fetchContentAreaContent($row)
//    {
//        return $row['a_content'];
//    }

    // returns pages in all ContentAreas
//    public function fetchContentAreaInAllPages($row)
//    {
//        return $row['a_allpages'];
//    }

    // returns the ContentArea asscoiated PAGE  id
    public function fetchContentAreaAssocPage($row)
    {return null;
        //return $row['c_a_assocpage'];
    }

    // returns the ContentArea modified by
    public function fetchContentAreaModifiedBy($row)
    {
        return $row['c_a_lastmodifiedby']   ;
    }

    // returns user creation date
    public function fetchContentAreaCreatedDate($row)
    {
        return $row['c_a_creationdate'];
    }

    // retrun user creator
    public function fetchContentAreaCreatedBy($row)
    {
        return $row['c_a_createdby'];
    }

    // returns last modified date
    public function fetchContentAreaLastModifiedDate($row)
    {
        return $row['c_a_modifieddate'];
    }
    public function fetchContentAreaOrder($row)
    {
        return $row['c_a_order'];
    }

}

?>
