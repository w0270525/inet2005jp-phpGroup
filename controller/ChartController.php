<?php

require_once('../model/class/ChartArea.php');

require_once('../model/data/functions.php');

class ChartController
{
	public $model;

	public function __construct()
	{
		$this->model = new ChartArea();


	}


	public function displayChart() {



		include ('../view/admin/userviews/chartView.php');
	}


}
