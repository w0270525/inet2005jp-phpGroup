<?php

require_once '../model/class/User.php';
require_once '../model/data/PDOMySQLUserDataModel.php';

class UserModel
{
    private $m_DataAccess;

    public function __construct()
    {        $this->m_DataAccess = new PDOMySQLUserDataModel();    }

    public function __destruct()
    {         }


    // Array(User user) = getAllUsers();
    // Runs a quey against the db for all the users
    // returns the an array of User object based on the query
    public function getAllUsers()
    {
        $this->m_DataAccess->connectToDB();
        $arrayOfUserObjects = array();
        $arrayOfUserObjects_  = array();
        $this->m_DataAccess->selectUsers();

        // build an array of users
        while($row =  $this->m_DataAccess->fetchUsers())
        {
            $arrayOfUserObjects_[] = $row;
        }
        // construct an arry of users
        foreach ($arrayOfUserObjects_  as $user){
            $arrayOfUserObjects[]= $this->constructUser($user);
        }
        $this->m_DataAccess->closeDB();

        // return the array of User Objects
        return $arrayOfUserObjects;
    }

    // User = fetUser(Integer $userID)
    // returns a single user fetched from the CMS
    public function getUser($userID)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->selectUserById($userID);
        $record =  $this->m_DataAccess->fetchUsers();
        $fetchedUser = $this->constructUser($record);
        $this->m_DataAccess->closeDB();
        return $fetchedUser;
    }


    // User = fetUser(String $userName)
    // returns a single user fetched from the CMS
    public function getUserByUserName($userName)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->selectUserByName($userName);
        $record =  $this->m_DataAccess->fetchUsers();
        $fetchedUser = $this->constructUser($record);
        $this->m_DataAccess->selectUserRoles($fetchedUser->getId());
        $this->m_DataAccess->closeDB();
        return $fetchedUser;

    }
//    public function getUserRoleByUserIds($userId)
//    {
//        $this->m_DataAccess->connectToDB();
//        $this->m_DataAccess->selectUserRoles($userId);
//        $record =  $this->m_DataAccess->fetchUsers();
//        $fetchedUser = $this->constructUser($record);
//        $this->m_DataAccess->closeDB();
//        return $fetchedUser;
//    }
function updateUserSecurity($user)
{
    $this->m_DataAccess->connectToDB();
    $user->updateSecurity();
    $this->m_DataAccess->closeDB();

    return $this ->m_DataAccess->updateSecurity($user);


}

    //  Updates a user in the CMS
    public function updateUser($userToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateUser(
            $userToUpdate->getID(),
            $userToUpdate->getFirstName(),
            $userToUpdate->getLastName(),
            $userToUpdate->getUsername(),
            $userToUpdate->getRoleId(),
            $userToUpdate->getCreatedBy());


        return "$recordsAffected record(s) updated succesfully!";
    }



    //forms a user from the input array and returns it
    public function constructUser($row)
    {
        $currentUser = new User($this->m_DataAccess->fetchUserID($row),
            $this->m_DataAccess->fetchUserFirstName($row),
            $this->m_DataAccess->fetchUserLastName($row),
            $this->m_DataAccess->fetchUserUsername($row),
            $this->m_DataAccess->fetchUserPass($row),
            $this->m_DataAccess->fetchUserSalt($row),
            $this->m_DataAccess->fetchUserCreator($row),
            $this->m_DataAccess->fetchUserCreationDate($row),
            $this->m_DataAccess->fetchUserModifiedBy($row),
            $this->m_DataAccess->fetchUserModifiedDate($row),
        $this->m_DataAccess->selectUserRoles($this->m_DataAccess->fetchUserID($row)),
             $this->m_DataAccess->fetchUserKey($row));
        return $currentUser;
    }


    //forms a user from the input array and returns it
    public function constructUserArray($row)
    {

        $currentUser = new User($row[0],$row[1],$row[2],$row[3], $row[4],$row[5],$row[6],
           $row[7],$row[8],$row[9],$row[10],"");
           // $this->m_DataAccess->selectUserRoles($this->m_DataAccess->fetchUserID($row)));

        return $currentUser;
    }


    function addUser($user)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->addUser($user);
        $this->m_DataAccess->closeDB();
    }




    public function getUserById($userId)
    {

        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->selectUserById($userId);
        $record =  $this->m_DataAccess->fetchUsers();
        $fetchedUser = $this->constructUser($record);

        $this->m_DataAccess->selectUserRoles($fetchedUser->getId());
        //   $fetchedUser->setRoleId($this->m_DataAccess->selectUserRoles($fetchedUser->getId()));
        $this->m_DataAccess->closeDB();
        return $fetchedUser;

    }


    // boolean confirmUser($ussr, $pass)
    // returns true of the user is equal to the user from the databse, based on username , password and salt
    public function confirmUser($user)
    {

        // Query
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->selectUserByName($user->getUsername());

        $fetchedUser =  $this->m_DataAccess->fetchUsers();
        $this->m_DataAccess->closeDB();
        $currentUser = $this->constructUser($fetchedUser);

        // password reset
        if($currentUser->getPass()==="password" && $user->getPass()==="password")
            return 1;

        // passwords test
        if( $currentUser->comparePass($user->getPass()))
            return 1;
        return 0;
    }


    public function updateSecurity($user)
    {
        $this->m_DataAccess->connectToDB();
        $user->updateSecurity();
        $this->m_DataAccess->updateSecurity($user);
        $this->m_DataAccess->closeDB();



    }



}
?>