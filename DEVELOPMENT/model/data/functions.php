<?php
//this file contains basic functions  and classes that can be shared between different PDO's

// DATA BASE CONNECTION OBJECT
class connect{
    protected $dbConnection;

    // conects to the cms
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=cms","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Content Management System via PDO: ' . $ex->getMessage());
        }

    }
    function getConnection()
    {
        return $this->dbConnection;
    }

    // closes the database connection
    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }



}
