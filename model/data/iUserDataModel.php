<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iUserDataModel
{
    public function connectToDB();

    public function closeDB();

    public function selectUsers();
    
     public function selectUserById($userID);


     public function fetchUsers();

       public function updateUser($userID,$first_name,$last_name,$username,$userRoles,$userCreator,$key);

    // field access functions
    public function fetchUserID($row);
    public function fetchUserFirstName($row);
    public function fetchUserLastName($row);
    public function fetchUserRoleID($row);
    public function fetchUserUserName($row);
    public function fetchUserSalt($row);
    public function fetchUserPass($row);
    public function fetchUserModifiedBy($row);


}
?>
