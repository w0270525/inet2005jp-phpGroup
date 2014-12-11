
<?php

include_once("../model/data/PDOMySQLChartDataModel.php");


class ChartArea {

	private $c_db;
	private $c_users;
	private $c_count;
	private $c_data;

	public function __construct()
	{
		$this->c_db =new PDOMySQLContentAreaDataModel();


	}


	/**
	 * @param mixed $c_count
	 */
	public function setCCount($c_count)
	{
		$this->c_count = $c_count;
	}

	/**
	 * @return mixed
	 */
	public function getCCount()
	{
		return $this->c_count;
	}

	/**
	 * @param mixed $c_data
	 */
	public function setCData($c_data)
	{
		$this->c_data = $c_data;
	}

	/**
	 * @return mixed
	 */
	public function getCData()
	{
		return $this->c_data;
	}

	/**
	 * @param \PDOMySQLContentAreaDataModel $c_db
	 */
	public function setCDb($c_db)
	{
		$this->c_db = $c_db;
	}

	/**
	 * @return \PDOMySQLContentAreaDataModel
	 */
	public function getCDb()
	{
		return $this->c_db;
	}

	/**
	 * @param mixed $c_users
	 */
	public function setCUsers($c_users)
	{
		$this->c_users = $c_users;
	}

	/**
	 * @return mixed
	 */
	public function getCUsers()
	{
		return $this->c_users;
	}



} 