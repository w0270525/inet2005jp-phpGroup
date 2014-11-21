<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include  ('functions.php');
require_once 'iUserDataModel.php';
class PDOMySQLUserDataModel implements iUserDataModel
{
    private $connObject;
    private $dbConnection;
    private $result;
    private $stmt;

    // iCustomerDataAccess methods
    public function connectToDB()
    {
        if(isset($this->connObject)) $this->closeDB();
            $this->connObject = new connect();
        $this->connObject->connectToDB();



    }

    // desconnect from CMS Database by destroying connection object
    public function closeDB()
    {
        $this->connObject=null;
    }

    // gets all the Users from the database
    public function selectUsers()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        $selectStatement = "SELECT * FROM users";
        $selectStatement .= " LEFT JOIN user_roles ON u_r_i_id = user_roles.u_r_u_id";
        $selectStatement .= " LIMIT :start,:count;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('selectuses() failed : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }
    
    public function selectUserById($userID)
    {
        $selectStatement = "SELECT * FROM users";
        $selectStatement .= " LEFT JOIN user_roles ON u_r_i_id = user_roles.u_r_u_id";
        $selectStatement .= " WHERE user.u_id = :userID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Select user by ID failed : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }
    
    // returns the users of the Conent Managemtn System
    public function fetchUsers()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('FetchUser failed : Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

    // updates the CMS user
    // need to add modified by param
    public function updateUser($userID,$first_name,$last_name,$username)
    {
        $updateStatement = "UPDATE users";
        $updateStatement .= " SET u_fname = :firstName,u_lname=:lastName, u_username=:username";
        $updateStatement .= " WHERE u_id = :userID;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
            $this->stmt->bindParam(':userName', $username, PDO::PARAM_STR);
            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Update failed : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }

    // returns the user id
    public function fetchUserID($row)
    {
       return $row['u_id'];
    }

    // returns the User First Name
    public function fetchUserFirstName($row)
    {
       return $row['u_fname'];
    }

    // returs the users last name
    public function fetchUserLastName($row)
    {
       return $row['u_lname'];
    }

    // returns the  user role id
    public function fetchUserRoleID($row)
    {
        return $row['u_r_u_id'];
    }

    // returns the user name
    public function fetchUserUsername($row)
    {
        return $row['u_username'];

    }


}

?>
