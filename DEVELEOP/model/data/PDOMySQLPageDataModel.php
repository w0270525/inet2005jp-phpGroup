<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once  ('functions.php');
require_once 'iPageDataModel.php';
class PDOMySQLPageDataModel implements iPageDataModel
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

    // gets all the Pages from the database
    // returns an array with Pages information
    public function selectPages()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;
        $selectStatement = "SELECT * FROM PAGE ";
        $selectStatement .= " LEFT JOIN ARTICLE ON PAGE.p_id = ARTICLE.a_assocpage ";
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
            die('select Pages() failed : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }

    public function selectPageById($pageID)
    {
        $selectStatement = "SELECT * FROM PAGE";
        $selectStatement .= " LEFT JOIN ARTICLE ON PAGE.p_id = ARTICLE.a_assocpage ";
        $selectStatement .= " WHERE ARTICLE.a_id = :pageID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Select Pages() by articles ID failed : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Articles asscoiated with a specific page ID
    public function selectArticleByPageId($pageID)
    {
        $selectStatement = "SELECT * FROM PAGE";
        $selectStatement .= " LEFT JOIN ARTICLE ON PAGE.p_id = ARTICLE.a_assocpage ";
        $selectStatement .= " WHERE ARTICLE.a_assocpage= :pageID;";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Select Pages by articles ID failed : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Page  result query of the Content Managemtn System
    public function fetchPage()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Fetch Article failed : Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS user
    // need to add modified by param
     public function updatePage($userID,$first_name,$last_name,$username)
    {
         $updateStatement = "UPDATE PAGE";
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
            die('Update failed : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Article id
    public function fetchPageID($row)
    {
        return $row['p_id'];
    }

    // returns the Page  Name
    public function fetchPageName($row)
    {
        return $row['p_name'];
    }

    // returs the Page Alias
    public function fetchPageAlias($row)
    {
        return $row['p_alias'];
    }

    // returns the  Page description
    public function fetchPageDescription($row)
    {
        return $row['p_desc'];
    }

    // returns the Page blurb
    public function fetchPageStyle($row)
    {
        return $row['p_style'];

    }


    // returns the page modified by
    public function fetchPageLastModifiedBy($row)
    {
        return $row['p_lastmodifiedby']   ;
    }

    // returns page creation date
    public function fetchPageCreatedDate($row)
    {
        return $row['p_creationdate'];
    }

    // retrun page creator
    public function fetchPageCreatedBy($row)
    {
        return $row['p_createdby'];
    }

    // returns last modified date
    public function fetchPageLastModifiedDate($row)
    {
        return $row['p_modifieddate'];
    }
}

?>
