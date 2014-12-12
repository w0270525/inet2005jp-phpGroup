
<?php

include_once("../model/data/PDOMySQLChartDataModel.php");


class ChartArea {

	private $c_db;
	private $c_users;
	private $c_count;
	private $c_data;

	public function __construct()
	{

	}

	/**
	 * @param mixed $c_count
	 */
	public function setCount($c_count)
	{
		$this->c_count = $c_count;
	}

	/**
	 * @return mixed
	 */
	public function getCount()
	{
		return $this->c_count;
	}

	/**
	 * @param mixed $c_data
	 */
	public function setData($c_data)
	{
		$this->c_data = $c_data;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->c_data;
	}

	/**
	 * @param \PDOMySQLContentAreaDataModel $c_db
	 */
	public function setDb($c_db)
	{
		$this->c_db = $c_db;
	}

	/**
	 * @return \PDOMySQLContentAreaDataModel
	 */
	public function getDb()
	{
		return $this->c_db;
	}

	/**
	 * @param mixed $c_users
	 */
	public function setUsers($c_users)
	{
		$this->c_users = $c_users;
	}

	/**
	 * @return mixed
	 */
	public function getUsers()
	{
		return $this->c_users;
	}



} 