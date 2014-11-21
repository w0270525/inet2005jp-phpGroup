<?php
//this file contains basic functions  and classes that can be shared between different PDO's

// DATA BASE CONNECTION OBJECT
class connect{
    protected $dbConnection;

    // constructs the connection object and connects to the CMS data dbase at the same time
//    function __constructor(){
//
//    }

    // force connection to CMS database
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=cms","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"conected";
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
        }

    }

    // closes the database connection
    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }


}
