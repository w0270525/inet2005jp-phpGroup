<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('functions.php');
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


        $selectStatement = "SELECT * FROM ARTICLE ";
        $selectStatement .= " LEFT JOIN PAGES ON a_assocpage = PAGES.p_id ;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );


            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticles failed  in PDOMySQLPageArticleModel: : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }


    public function selectArticlesByCreator($id)
    {
        $selectStatement = "SELECT * FROM ARTICLE   LEFT JOIN USER ON a_createdby = :u_id;";
         try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':u_id', $id, PDO::PARAM_STR);
            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticlesByCreator failed  in PDOMySQLPageArticleModel: '.$selectStatement.': Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }
        $arrayOfArticles = array();
        while($row = $this->fetchArticle())
            $arrayOfArticles[]=$row;
        return $arrayOfArticles;

    }


    // gets all the Articles from the database
    // returns an array with Articles information including roles
    public function selectArticleByArticleName($name)
    {


        $selectStatement = "SELECT * FROM ARTICLE ";
        $selectStatement .= " LEFT JOIN PAGES ON a_assocpage = PAGES.p_id ";
        $selectStatement .= " WHERE a_name = :name ;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':name', $name, PDO::PARAM_STR);

            $this->stmt->execute();
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('selectArticles failed  in PDOMySQLPageArticleModel: : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }


    // selects the articles by id
    public function selectArticleByArticleId($articleID)
    {
        $selectStatement = "SELECT * FROM ARTICLE";
        $selectStatement .= " LEFT JOIN PAGES ON a_assocpage = PAGES.p_id ";
        $selectStatement .= " WHERE ARTICLE.a_id = :articleID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':articleID', $articleID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByArticleId failed  in PDOMySQLArticleDataModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the Articles asscoiated with a specific PAGES ID
    public function selectArticleByPageId($pageID)
    {
        $selectStatement =  "SELECT * FROM ARTICLE";
        $selectStatement .= " WHERE (a_assocpage = ? OR a_allpages = 1) AND (a_inactive = 0)";
        $selectStatement .= " ORDER BY a_creationdate DESC;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(1, $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByPageId failed  in PDOMySQLArticleDataModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }






    //  Integer selectActiveArticlesByPageId (Integer pageId)
    // returns the ACTIVE Articles associated  with a specific PAGES ID
    public function selectActiveArticlesByPageId($pageID)
    {
        $selectStatement = "SELECT * FROM ARTICLE ";
        $selectStatement .="  WHERE ((a_assocpage = ? ) OR (a_allpages = 1)  AND  a_inactive=0);";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(1, $pageID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectArticleByPageId failed  in PDOMySQLArticleDataModel: Could not select records from CMS Database via PDO: ' . $ex->getMessage());
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
            die('fetchArticle failed  in PDOMySQLArticleDataModel: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }



    // inserts an article into the cms database
    // return row count of succsussful insert ie 1
    public function insertArticle($article)
    {
        $insertStatement = "INSERT INTO  ARTICLE  VALUES (DEFAULT, :a_contentArea, :a_name, :a_title, :a_desc, :a_blurb, :a_content,  :a_pages , :a_createdby, default, :a_createdby, default , :a_allPages, :a_active );";
        try{

            $this->stmt = $this->dbConnection->prepare($insertStatement);
            $this->stmt->bindParam(':a_name', $article->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':a_contentArea', $article->getContentarea(), PDO::PARAM_INT);
            $this->stmt->bindParam(':a_desc', $article->getDesc(), PDO::PARAM_STR);
            $this->stmt->bindParam(':a_title', $article->getTitle(), PDO::PARAM_STR);
            $this->stmt->bindParam(':a_blurb', $article->getBlurb(), PDO::PARAM_INT);
            $this->stmt->bindParam(':a_content', $article->getContent(), PDO::PARAM_STR);
            $this->stmt->bindParam(':a_pages', $article->getAssocPage(), PDO::PARAM_INT);
            $this->stmt->bindParam(':a_createdby', $article->getCreatedBy(), PDO::PARAM_INT);
            $this->stmt->bindParam(':a_allPages', $article->getAllPages(), PDO::PARAM_INT);
            $this->stmt->bindParam(':a_active', $article->getActive(), PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('nsertArticle($article)  failed  in PDOMySQLArticleDataModel:\n'.$insertStatement.' Could not insert records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }




    // Integer deleteStyle(Style styleId);
    // removes a style from the database and returns the row count.
    // returns 9999 is style is active and will not delete
    public function deleteArticle($article)
    {   if(!$article->getActive()):
            $deleteStatement = "DELETE FROM ARTICLE WHERE a_id = :article ;";
            try{
                $this->stmt = $this->dbConnection->prepare($deleteStatement);
                $this->stmt->bindParam(':article', $article->getId(), PDO::PARAM_INT);
                $this->stmt->execute();

                return $this->stmt->rowCount();
            }
            catch(PDOException $ex)
            {
                die('deleteArticle($article) Style failed in PDOMySQLStyleDataModel : '. $deleteStatement .'not select records from CMS  Database via PDO: ' . $ex->getMessage());
            }
        endif;
    }




    // updateArticle(Article article);
    // updates the article in th cms to match the article sent in.
    // return the row count of  the update query
    public function updateArticle($articleToUpdate)
    {

        $updateStatement=" UPDATE ARTICLE SET a_blurb=:blurb, a_desc = :desc, a_allpages= :allPages , a_contentarea = :ca, a_name = :name, a_title =:title, a_content = :content, a_assocpage = :page, a_lastmodifiedby = :userId , a_modifieddate = NOW() ,a_inactive =:inactive  WHERE a_id = :articleId ;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':ca', $articleToUpdate->getContentarea(), PDO::PARAM_INT);
            $this->stmt->bindParam(':name', $articleToUpdate->getName(), PDO::PARAM_STR);
            $this->stmt->bindParam(':title', $articleToUpdate->getTitle(), PDO::PARAM_INT);
            $this->stmt->bindParam(':content', $articleToUpdate->getContent(), PDO::PARAM_STR);
            $this->stmt->bindParam(':page', $articleToUpdate->getAssocpage(), PDO::PARAM_INT);
            $this->stmt->bindParam(':userId', CMS_getUser()->getId(), PDO::PARAM_INT);
            $this->stmt->bindParam(':allPages', $articleToUpdate->getAllpages(), PDO::PARAM_INT);
            $this->stmt->bindParam(':articleId', $articleToUpdate->getId(), PDO::PARAM_INT);
            $this->stmt->bindParam(':desc', $articleToUpdate->getDesc(), PDO::PARAM_STR);
            $this->stmt->bindParam(':blurb', $articleToUpdate->getBlurb(), PDO::PARAM_STR);
            $this->stmt->bindParam(':inactive', $articleToUpdate->getActive(), PDO::PARAM_INT);
            $this->stmt->execute();
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Update failed  in PDOMySQLArticleDataModel :'.$updateStatement.' Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }


    public function getArticleCountByCreatorId($id)
    {
        $selectStatement = "SELECT COUNT(a_id) as count  FROM ARTICLE WHERE a_createdby = :id ";
        try
        {  $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result["count"];
        }
        catch(PDOException $ex)
        {
            die('getArticleCountByCreatorId failed  in PDOMySQLPageArticleModel: '. $selectStatement .': Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }
    }






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
        return $row['a_contentarea'];

    }
    // returns the Article cotnent
    public function fetchArticleContent($row)
    {
        return $row['a_content'];
    }

    // returns pages in all articles
    public function fetchArticleInAllPages($row)
    {
        return $row['a_allpages'];
    }

    // returns the Article asscoiated PAGES
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

    public function fetchArticleInActive($row)
    {
        return $row["a_inactive"];
    }


}

?>
