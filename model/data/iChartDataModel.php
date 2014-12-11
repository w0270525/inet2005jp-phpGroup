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

	public function selectUsers();

} 