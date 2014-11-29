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
        $this->dbConnection = $this->connObject->getConnection();


    }

    // desconnect from CMS Database by destroying connection object
    public function closeDB()
    {
        $this->connObject=null;
    }

    // gets all the Users from the database
    // returns an array with user information including roles


    public function selectUsers()
    {
        // hard-coding for first ten rows
        global $userResult;
        $selectStatement = "SELECT * FROM USER;";

     //   $selectStatement .= " LIMIT :start,:count;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('select users() failed : Could not select records from Content Management System Database via PDO: ' . $ex->getMessage());
        }

    }
    
    public function selectUserById($userID)
    {
        $selectStatement = "SELECT * FROM USER";
       // $selectStatement .= " LEFT JOIN USER_ROLES ON u_r_i_id = USER_ROLES.u_r_u_id";
        $selectStatement .= " WHERE USER.u_id = :userID;";

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
    
    // returns the users of the Content Management System
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

    // SELSCT USERES BY USER NAME
    public function selectUserByName($userName)
    {
        $selectStatement = "SELECT * FROM USER";
        $selectStatement .= " LEFT JOIN USER_ROLES ON u_id = USER_ROLES.u_r_u_id";
        $selectStatement .= " WHERE USER.u_username = :userName;";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':userName', $userName, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Select user by User Name failed : Could not select records from CMS Database via PDO: ' . $ex->getMessage());
        }
    }

//    // returns the users of the Conent Managemtn System
//    public function fetchUsers()
//    {
//        try
//        {
//            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
//            return $this->result;
//        }
//        catch(PDOException $ex)
//        {
//            die('FetchUser failed : Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
//        }
//    }

    // returns an array of user roles based on a user id
    public function selectUserRoles($userId)
    {
        $selectStatement="SELECT u_r_l_r_id FROM cms.USER_ROLES WHERE u_r_u_id = :userId;";
        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            $this->stmt->execute();
           // $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);

            $rows= $this->stmt->rowCount();
            $userRoles= array();;$counter = 0 ;


            while ($row =$this->stmt->fetch(PDO::FETCH_ASSOC)) {
               $userRoles[$counter]=$row["u_r_l_r_id"];
                $counter++;
            }

            return $userRoles;
        }
        catch(PDOException $ex)
        {
            die('getUserRoles  failed in PDOMySQLUserDataModel.php : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
        }
    }


    // updates the CMS user
    // need to add modified by param
    public function updateUser($userID,$first_name,$last_name,$username)
    {
        $updateStatement = "UPDATE user";
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
            die('Update failed  in PDOMySQLUserDataModel.php : Could not select records from CMS  Database via PDO: ' . $ex->getMessage());
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

    // returns the   user role id
    public function fetchUserRoleID($row)
    {
        return $row['u_r_l_r_id'];
    }

        // returns all role ods for the user as an array
    public function fetchUserRoleIDs($row)
    {
        try
        {
            $row;
            $roles= array();$counter=0;
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            foreach($row as  $this->result ){
                $roles[$counter]=$row["u_r_l_r_id"];
                $counter++;
            }
            return $roles;
        }
        catch(PDOException $ex)
        {
            die('Fetch userRoleIDs failed in PDOMySQLDataModel.php: Could not retrieve from CMS Database via PDO: ' . $ex->getMessage());
        }

    }


    // returns the user name
    public function fetchUserUsername($row)
    {
        return $row['u_username'];

    }

    // returns the useres slt
    public function fetchUserSalt($row)
    {
        return $row['u_salt'];
    }

    // returns the user password
    public function fetchUserPass($row)
    {
        return $row['u_pass'];
    }

    // returns the users modified by
    public function fetchUserModifiedBy($row)
    {
        return $row['u_lastmodifiedby']   ;
    }

    // returns user creation date
    public function fetchUserCreationDate($row)
    {
        return $row['u_createddate'];
    }

    // retrun user creator
    public function fetchUserCreator($row)
    {
        return $row['u_createdby'];
    }

    // returns last modified date
    public function fetchUserModifiedDate($row)
    {
        return $row['u_modifieddate'];
    }


}

?>
