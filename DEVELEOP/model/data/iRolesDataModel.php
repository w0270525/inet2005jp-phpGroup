<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iRolesDataModel
{
    public function connectToDB();
    public function closeDB();

    public function selectRoles();
    public function selectRolesById($custID);

    public function fetchRoles();

    public function updateRoleArea($userID,$first_name,$last_name,$username);

    // field access functions
    public function fetchRoleID($row);
    public function fetchRoleName($row);

}
?>
