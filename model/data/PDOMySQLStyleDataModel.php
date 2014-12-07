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
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectStyles failed in PDOMySQLStyleDataModel  : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }

    // int = selectStyleByPageId (Integer pageId);
    // selects styles based on  ID where pageid is an int. returns the row count of the query result
    public function selectStyleByIntId($styleId)
    {
        // prepare statement
        $selectStatement = "SELECT * FROM STYLE  WHERE s_id = :id;";
        $Id =intval($styleId);
        try
        {   // execute statement
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':id', $Id, PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectStyleByPageId failed in PDOMySQLStyleDataModel  : '.$selectStatement.' : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }/// end get style by int id


    public function selectActiveStyle() {

      // prepare statement
      $selectStatement = "SELECT * FROM STYLE ";
      $selectStatement .= "WHERE s_active = 1;";

      try
      {   // execute statement
        $this->stmt = $this->dbConnection->prepare($selectStatement);
        $this->stmt->execute();
        return $this->stmt->rowCount();
      }
      catch(PDOException $ex)
      {
        die('selectActiveStyle failed in PDOMySQLStyleDataModel  : '.$selectStatement.' : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
      }

    } // selectActiveStyle END


    //selects a style from the databse base on the name
    // returns the row count
    public function selectStyleByName($name)
    {

        $selectStatement = "SELECT * FROM STYLE  JOIN USER ON s_createdby = USER.u_id WHERE s_name = :name ;";


        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectStyles failed in PDOMySQLStyleDataModel  : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }


    //  int = selectStyleById (Style style);
    // returns the Style based  on ID of style sent in
    public function selectStyleById($style)
    {
        // prepeare the statment
        $selectStatement = "SELECT * FROM STYLE ";
        $selectStatement .= " LEFT JOIN PAGES ON s_id = PAGES.p_style";
        $selectStatement .= " WHERE s_id= :styleID;";
        try
        {
            // bind and execute
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':styleID', $style->getId(), PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectStyleByStyleId failed in PDOMySQLStyleDataModel: ".$selectStatement ."  : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
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


    // inserts a record of a style into to database
    public function insertStyle($style){

        // ensure that the style is not going to inferfer with active style
         $this->selectStyles();
        while($row =$this->fetchStyles())
            if($row["s_active"]==1)
                $style->setActive(0);
        $insertStmt = "INSERT INTO STYLE Values (default, :s_name, :s_desc, :s_style, :s_active, :createdby, NOW(), :createdby, NOW());";


        try{
            $this->stmt = $this->dbConnection->prepare($insertStmt);
            $this->stmt->bindParam(':s_name', $style->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':s_desc', $style->getDesc(), PDO::PARAM_STR);
            $this->stmt->bindParam(':s_style', $style->getStyle(), PDO::PARAM_STR);
            $this->stmt->bindParam(':s_active', $style->getActive(), PDO::PARAM_INT);
            $this->stmt->bindParam(':createdby', $style->getCreatedBy(), PDO::PARAM_INT);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('insertStyle failed in PDOMySQLStyleDataModel : '.$insertStmt. ' Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }

    }



    // itn = updateStyle (Style style);
    //Updates the style object and returns row count
    public function updateStyle($style)
    {
        $updateStatement = "UPDATE STYLE  SET s_name= :name ,s_desc= :desc, s_style = :style, s_lastmodifiedby = :modifiedby , s_active=:s_active";
       $updateStatement .= " WHERE s_id = :styleId;";

        try{
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':name', $style->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':desc', $style->getDesc(), PDO::PARAM_STR);
            $this->stmt->bindParam(':style', $style->getStyle(), PDO::PARAM_STR);
            $this->stmt->bindParam(':modifiedby', CMS_getUser()->getId(), PDO::PARAM_INT);
            $this->stmt->bindParam(':styleId', $style->getId(), PDO::PARAM_INT);
            $this->stmt->bindParam(':s_active', $style->getActive(), PDO::PARAM_INT);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('updateStyle failed in PDOMySQLStyleDataModel : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }

    // Integer deleteStyle(Style styleId);
    // removes a style from the database and returns the row count.
    // returns 9999 is style is active and will not delete
    public function deleteStyle($style)
    {

        if($style->getActive() ==1) return 9999;// active style, dont dlete
        $deleteStatement = "DELETE FROM STYLE   ";
        $deleteStatement .= " WHERE s_id = :styleId;";

        try{
            $this->stmt = $this->dbConnection->prepare($deleteStatement);
            $this->stmt->bindParam(':styleId', $style->getId(), PDO::PARAM_INT);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('udeletem Style failed in PDOMySQLStyleDataModel : '. $deleteStatement .'not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }


    // Integer = deactivateStyle()
    // sets the active style to inactive
    public function deactivateStyles()
    {
        $updateStatement = "UPDATE STYLE  SET s_active = 0 , s_lastmodifiedby = ".CMS_getUser()->getId()."  , s_modifieddate = NOW() WHERE s_active = 1;  ";
        try{
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('deactivateStyles Style failed in PDOMySQLStyleDataModel : '. $updateStatement .'not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }

    }

    // Integer = activateStyle(Integer styleId);
    // activate a style from the databse
    public function activateStyles($id)
    {
        $updateStatement = "UPDATE STYLE  SET s_active = 1  , s_lastmodifiedby = :userId ,s_modifieddate = NOW()  WHERE s_id = :id ; ";
        try{
            $id=intval($id);
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $this->stmt->bindParam(':userId', CMS_getUser()->getId(), PDO::PARAM_INT);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('activateStyles Style failed in PDOMySQLStyleDataModel : '. $updateStatement .'not select records from CMS  Database via PDO: ' . $ex->getMessage());
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
