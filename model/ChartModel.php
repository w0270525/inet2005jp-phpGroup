<?php

require_once '../model/class/ChartArea.php';
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

		$this->m_DataAccess->selectUsers();




		while($row = $this->m_DataAccess->fetchChart())
		{


			$arrayOfChartObjects[] =
		}

		$this->m_DataAccess->closeDB();

		return $arrayOfChartObjects;
	}
//
//
//
//if(!$result)
//{
//die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
//}
//while ($row = mysqli_fetch_assoc($result))
//{
////	?>
//<!---->
<!--	<tr>-->
<!--		<td>-->
<!--			--><?php //echo $row['title']; ?><!-- </td><td> --><?php //echo $row['description']; ?><!--</td>-->
<!--	</tr>-->
<?php
//}
//
//
//mysqli_close($db);
}