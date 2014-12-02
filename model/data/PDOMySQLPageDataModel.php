<?php
/*
 * PDOMySQLPageDataModel
 * Used to retrieve information from the database regading site pages and there contents
 *
 * USES - Most functionality is done by running proper select method function then running the proper
 * fetch info function immediaty after to retreive the data
 */
require_once('functions.php');
require_once 'iPageDataModel.php';
class PDOMySQLPageDataModel implements iPageDataModel
{
    private $connObject;
    private $dbConnection;
    private $result;
    private $stmt;
    private $SELECT =" SELECT * FROM PAGES ";

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



    // gets all the Pages from the database and the user who created the page
    // returns an count of the operation
    public function selectPages()
    {
        $selectStatement = $this->SELECT ;
        $selectStatement .= "    JOIN USER  ON p_createdby = USER.u_id ";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );


            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectPages failed  in PDOMySQLPageDataModel:'.$selectStatement.' Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }


// gets   the Pages from the database with specific name
// returns an count of the operation
public function selectPagesByName($name)
{

    $selectStatement = $this->SELECT . "    JOIN USER  ON p_createdby = USER.u_id WHERE p_name = :name ";
    try
    {
        $this->stmt = $this->dbConnection->prepare($selectStatement );
        $this->stmt->bindParam(':name', $name, PDO::PARAM_STR);

        $this->stmt->execute();
        return $this->stmt->rowCount();
    }
    catch(PDOException $ex)
    {
        die('selectPagesByName failed  in PDOMySQLPageDataModel:'.$selectStatement.' Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
    }
}


    // gets all the Articles from the database asscicated with a page
    // returns the count of the result
    public function selectPageArticles($id)
    {

        $selectStatement = "SELECT * FROM ARTICLE  Where a_assocpage  = :p_id OR a_allpages=1 ;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':p_id', $id, PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('selectPagesArticles failed  in PDOMySQLPageDataModel:'.$selectStatement .' Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }
    }


   // returns an array of page articles  retrieved from selectPageArticles($id)
    public function fetchPageArticles()
    {

        $pageArticles= array();$counter = 0 ;
        while ($row =$this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $pageArticles[$counter]=$row;
            $counter++;
        }
        return  $pageArticles;
    }



    //  selectPageByPageID
    //  returns information on a page including the associated articles
    //  ** unlike most of the select methods, this one returns right away with the result
    public function selectPageById($pageID)
    {
        $selectStatement = $this->SELECT.'   where p_id = :id ;';

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':id', $pageID, PDO::PARAM_INT);
            $this->stmt->execute();
            $selectedPage= $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die('selectPageById failed  in PDOMySQLPageDataModel find articles: '.$selectStatement.' : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }

        //assign the page articles then return
        $this->selectPageArticles($pageID);
        $selectedPage["p_articles"]=$this->fetchPageArticles();
        return  $selectedPage;
    }

    // returns the Articles asscoiated with a specific PAGES ID
    public function selectArticleByPageId($pageID)
    {
        $selectStatement = $this->SELECT . " LEFT JOIN ARTICLE ON PAGES.p_id = ARTICLE.a_assocpage ";
        $selectStatement .= " WHERE ARTICLE.a_assocpage= :pageID;";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':$pageID', $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByPageId failed  in PDOMySQLPageDataModel: : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
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
            die('selectArticleByPageId failed  in PDOMySQLPageDataModel:  : Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS page
    //
     public function updatePage($page)
    {
         $updateStatement = "UPDATE PAGES";
        $updateStatement .= " SET p_name = :firstName,p_alias=:lastName, p_desc =:descr , u_modifiedby = :mod,u_modifiedbdate = NOW()";
       $updateStatement .= " WHERE u_id = :userID;";

        try{
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':p_name', $page->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':p_alias', $page->getAlias(), PDO::PARAM_STR);
            $this->stmt->bindParam(':descr', $page->getDesc(), PDO::PARAM_INT);
            $this->stmt->bindParam(':mod', $page->getModifedBy(), PDO::PARAM_STR);
            $this->stmt->bindParam(':mod', $page->getModifedBy(), PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('updatePage failed  in PDOMySQLPageDataModel:\n '.$updateStatement.': Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }






     public function insertPage($page)
    {
        $insertStatement = "INSERT INTO  PAGES  VALUES (DEFAULT,:p_name, :p_alais, :p_desc, :p_createdby , default,:p_modifiedby , default,null);";


        try{
            $this->stmt = $this->dbConnection->prepare($insertStatement);
            $this->stmt->bindParam(':p_name', $page->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':p_alais', $page->getAlias(), PDO::PARAM_STR);
            $this->stmt->bindParam(':p_desc', $page->getDesc(), PDO::PARAM_INT);
            $this->stmt->bindParam(':p_createdby', $page->getCreatedBy(), PDO::PARAM_STR);
            $this->stmt->bindParam(':p_modifiedby', $page->getCreatedBy(), PDO::PARAM_STR);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('insertpage  failed  in PDOMySQLPageDataModel:\n'.$insertStatement.' Could not insert records from CMS  Database via PDO: ' . $ex->getMessage());
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
