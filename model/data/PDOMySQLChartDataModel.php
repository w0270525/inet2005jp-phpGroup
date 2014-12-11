<?php

include_once "iChartDataModel.php";
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 12/10/14
 * Time: 6:59 PM
 */

class PDOMySQLChartDataModel {

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
		// hard-coding for first ten rows
		global $userResult;
		$selectStatement = "SELECT * FROM USER;";

		//   $selectStatement .= " LIMIT :start,:count;";

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