<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('functions.php');
require_once 'iStyleDataModel.php';
class PDOMySQLStyleDataModel implements iStyleDataModel
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

    // gets all the Style from the database
    // returns an array with Style information includeing the relating tables
    public function selectStyles()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;
        $selectStatement = "SELECT * FROM STYLE  LEFT JOIN USER ON s_createdby = USER.u_id";
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
            die('selectStyles failed in PDOMySQLStyleDataModel  : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }

    //returns the styles based on PAGES ID
    public function selectStyleByPageId($pageID)
    {
        $selectStatement = "SELECT * FROM STYLE ";
        $selectStatement .= " LEFT JOIN PAGES ON s_id = PAGES.p_style";
        $selectStatement .= " WHERE PAGES.p_id= :pageID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectStyleByPageId failed in PDOMySQLStyleDataModel  : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Style based  on ID
    public function selectStyleById($styleID)
    {
        $selectStatement = "SELECT * FROM STYLE ";
        $selectStatement .= " LEFT JOIN PAGES ON s_id = PAGES.p_style";
        $selectStatement .= " WHERE s_id= :styleID;";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':styleID', $styleID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectStyleByStyleId failed in PDOMySQLStyleDataModel  : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the PAGES  result query of the Content Managemtn System
    public function fetchStyles()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('fetchstyle failed in PDOMySQLStyleDataModel  : Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS user
    // need to add modified by param
    public function updateStyle($userID,$first_name,$last_name,$username)
    {
        $updateStatement = "UPDATE PAGES";
        $updateStatement .= " SET u_fname = :firstName,u_lname=:lastName, u_username=:username";
        $updateStatement .= " WHERE u_id = :userID;";

        try{
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
            $this->stmt->bindParam(':userName', $username, PDO::PARAM_STR);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('updateStyle failed in PDOMySQLStyleDataModel : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Style id
    public function fetchStyleID($row)
    {
        return $row['s_id'];
    }

    // returns the Style  Name
    public function fetchStyleName($row)
    {
        return $row['s_name'];
    }

    // returs the Style Style
    public function fetchStyleStyle($row)
    {
        return $row['s_style'];
    }

    // returns the  Style description
    public function fetchStyleDescription($row)
    {
        return $row['s_desc'];
    }

    // returns the pages with style
    public function fetchStylePages($row)
    {
        return $row['p_id'];

    }


    // returns the Style modified by
    public function fetchStyleLastModifiedBy($row)
    {
        return $row['s_lastmodifiedby']   ;
    }

    // returns Style creation date
    public function fetchStyleCreatedDate($row)
    {
        return $row['s_creationdate'];
    }

    // retrun PAGES creator
    public function fetchStyleCreatedBy($row)
    {
        return $row['s_createdby'];
    }

    // returns last modified date
    public function fetchStyleLastModifiedDate($row)
    {
        return $row['s_modifieddate'];
    }

    public function fetchStyleActive($row){
        return $row['s_active'];
    }
}

?>
