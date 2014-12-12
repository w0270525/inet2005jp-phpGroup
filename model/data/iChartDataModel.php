<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 12/10/14
 * Time: 7:00 PM
 */

interface iChartDataModel {

	public function connectToDB();

	public function closeDB();

	//for getting the users for the data
	public function selectUsers();


	public function fetchChart();

    public function getChartData_userArticles();


} 