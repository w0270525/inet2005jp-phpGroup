
<?php


class ChartArea {

	private $c_db;
	private $c_users;
	private $c_count;
	private $c_data;

	public function __construct()
	{
		$this->c_db =new PDOMySQLContentAreaDataModel();

	}

} 