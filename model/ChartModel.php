<?php

require_once '../model/class/Article.php';
require_once '../model/data/PDOMySQLChartDataModel.php';

class ChartModel
{
	private $m_DataAccess;

	public function __construct()
	{
		$this->m_DataAccess = new PDOMySQLChartDataModel();
	}

	public function __destruct()
	{
		// not doing anything at the moment
	}

	// get all Articles from the CMS
	public function getCharts()
	{
		$this->m_DataAccess->connectToDB();

		$arrayOfChartObjects = array();

		$this->m_DataAccess->selectUsers();

		while($row =  $this->m_DataAccess->fetchChart())
		{

			$currentChartObj =$this->constructArticle($row);
			$arrayOfChartObjects[] = $currentChartObj;
		}

		$this->m_DataAccess->closeDB();

		return $arrayOfChartObjects;
	}


}