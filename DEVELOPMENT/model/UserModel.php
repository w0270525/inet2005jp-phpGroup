<?php

require_once '../model/class/User.php';
require_once '../model/data/PDOMySQLUserDataModel.php';

class UserModel
{
    private $m_DataAccess;

    public function __construct()
    {
        $this->m_DataAccess = new PDOMySQLUserDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    // get all users from the CMS
    public function getAllUsers()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfUserObjects = array();

        $this->m_DataAccess->selectUsers();

        while($row =  $this->m_DataAccess->fetchUsers())
        {

            $currentUser =$this->constructUser($row);
            $arrayOfUserObjects[] = $currentUser;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfUserObjects;
    }

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
    // returns a single user fetched from the CMS


    public function getUserByUserName($userName)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->selectUserByName($userName);

        $record =  $this->m_DataAccess->fetchUsers();

        $fetchedUser = $this->constructUser($record);

        $this->m_DataAccess->closeDB();

        return $fetchedUser;
    }



    //  Updates a user in the CMS
    public function updateUser($userToUpdate)
    {
        $this->m_DataAccess->connectToDB();

        $recordsAffected = $this->m_DataAccess->updateUser($userToUpdate->getID(),
            $userToUpdate->getFirstName(),
            $userToUpdate->getLastName(),
            $userToUpdate->getUsername());

        return "$recordsAffected record(s) updated succesfully!";
    }



    //forms a user from the input array and returns it
    private function constructUser($row)
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
            $this->m_DataAccess->fetchUserRoleID($row));
        return $currentUser;
    }
}
?>