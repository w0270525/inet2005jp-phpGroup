<?php

require_once('../model/ChartModel.php');

require_once('../model/data/functions.php');
class ChartController
{
	public $model;

	public function __construct()
	{
		$this->model = new ChartController();

	}

	public function chartUsers()
	{
		$arrayOfUsers = $this->model->getAllUsers();

		include '../view/admin/userviews/Chart.php';
	}



}
