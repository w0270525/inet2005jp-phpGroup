<?php

require_once('../model/class/ChartArea.php');
require_once('../model/ChartModel.php');

require_once('../model/data/functions.php');
class ChartController
{
	public $model;

	public function __construct()
	{
		$this->model = new ChartModel();


	}


	public function displayChart() {

		$arrayOfChartObjects= $this->model->getCharts();

		include ('../view/admin/chartviews/viewArticleCreatorChart.php');
	}


}
