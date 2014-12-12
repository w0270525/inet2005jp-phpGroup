<?php

include_once "iChartDataModel.php";
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 12/10/14
 * Time: 6:59 PM
 */

class PDOMySQLChartDataModel {
	private $connObject;
	private $dbConnection;
	private $result;
	private $stmt;

	public function connectToDB()
	{
		if(isset($this->connObject)) $this->closeDB();
		$this->connObject = new connect();
		$this->connObject->connectToDB();
		$this->dbConnection = $this->connObject->getConnection();


	}

	public function closeDB()
	{
		$this->connObject=null;
	}


	public function selectUsers()
	{

		global $userResult;


		$selectStatement = "SELECT cms.USER.u_id, cms.USER.u_username AS u_name, count(cms.ARTICLE.a_id) AS a_count";
		$selectStatement .= "FROM cms.ARTICLE LEFT JOIN cms.USER ON cms.USER.u_id=cms.ARTICLE.a_createdby";
		$selectStatement .="GROUP BY cms.ARTICLE.a_createdby;";


		try
		{
			$this->stmt = $this->dbConnection->prepare($selectStatement );

			$this->stmt->execute();

			$this->result=$this->stmt;
			return $this->stmt= $userResult;
		}
		catch(PDOException $ex)
		{
			die('select users() failed : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
		}

	}

	public function fetchDataRow()
	{
		try
		{
			$this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
			return $this->result;
		}
		catch(PDOException $ex)
		{
			die('fetchArticle failed  in PDOMySQLChartDataModel: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
		}
	}



    // grabs information on users and the articles they create
    public function selectChartData_userArticles()
    {

        $selectUserCount ="SELECT COUNT(u_id) as counter FROM USER;";
        $selectStatement="SELECT COUNT(a_id)as counter, USER.u_username FRom ARTICLE JOIN USER ON a_createdby = USER.u_id WHERE a_createdby = 4;";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectUserCount );
            $this->stmt->execute();
            $count= $this->stmt->fetch(PDO::FETCH_ASSOC)["counter"];
        }
        catch(PDOException $ex)
        {
            die('selectChartData_userArticles() failed to get user count in PDOMySQLChartDataModel: '.$selectUserCount. ' Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }

        $data =  array();
        for($i=1;$i<$count;$i++)
        {
            try
            {
                $selectStatement="SELECT COUNT(a_id) as counter, USER.u_username FRom ARTICLE JOIN USER ON a_createdby = USER.u_id WHERE a_createdby = ".$count.";";

                $this->stmt = $this->dbConnection->prepare($selectStatement );
                $this->stmt->execute();
                $count= $this->stmt->fetch(PDO::FETCH_ASSOC)["counter"];

            }
            catch(PDOException $ex)
            {
                die('selectChartData_userArticles() failed to get article informaTION in PDOMySQLChartDataModel: '.$selectStatement. ' Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
            }

            $data[$count][0]=$this->stmt->fetch(PDO::FETCH_ASSOC)["counter"];
          $data[$count][1]= $this->stmt->fetch(PDO::FETCH_ASSOC)["u_username"];


        }

        $DATA_SET = array();
        foreach($data as $row)
        {
           $arr = array('username' => $row[0], 'articles' => $row[1]);
           $DATA_SET[]= json_encode($arr);

        }


    return $DATA_SET;
    }


       // returns the user name
    public function fetchUserUsername($row)
    {
        return $row['u_username'];

    }

    // returns the useres slt
    public function fetchUserSalt($row)
    {
        return $row['u_salt'];
    }

    // returns the user password
    public function fetchUserPass($row)
    {
        return $row['u_pass'];
    }

    // returns the users modified by
    public function fetchUserModifiedBy($row)
    {
        return $row['u_lastmodifiedby']   ;
    }

    // returns user creation date
    public function fetchUserCreationDate($row)
    {
        return $row['u_createddate'];
    }

    // retrun user creator
    public function fetchUserCreator($row)
    {
        return $row['u_createdby'];
    }

    // returns last modified date
    public function fetchUserModifiedDate($row)
    {
        return $row['u_modifieddate'];
    }

    // returns the   user key
    public function fetchUserKey($row)
    {
        return $row['u_key'];
    }



}