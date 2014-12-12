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



    public function    getChartData_userArticles()
    {
        $ac = new ArticleModel();
        $uc = new UserController();
        $DATA_SET = array();;
        $this->m_DataAccess->connectToDB();
        $arrayOfUserObjects= $uc->model->getAllUsers();
        foreach($arrayOfUserObjects as $user)
        {
          $DATA_SET[]=array ($user->getUsername(), $ac->getArticleCountByCreatorId($user->getId()));
        }

        $result =   $this->m_DataAccess->selectChartData_userArticles();
        $this->m_DataAccess->closeDB();
        return $result;

    }
}