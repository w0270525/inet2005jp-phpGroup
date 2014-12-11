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
		}
		catch(PDOException $ex)
		{
			die('select users() failed : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
		}

	}




} 