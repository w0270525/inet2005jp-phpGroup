<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iUserRolesDataModel
{
    public function connectToDB();
    public function closeDB();

    public function selectUserRoles();
    public function selectUserRolesById($custID);

    public function fetchRoles();

    public function updateUserRoles($userID,$first_name,$last_name,$username);

    // field access functions
    public function fetchUserRolesID($row);
    public function fetchUserRolesUserID($row);

    // Only implement if needed - dont think it will be needed
    //public function fetchUserRolesLookupRoleID($row);
}
?>
