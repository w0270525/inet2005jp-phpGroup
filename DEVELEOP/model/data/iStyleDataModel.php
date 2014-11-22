<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iStyleDataModel
{
    public function connectToDB();
    public function closeDB();

    public function selectStyles();
    public function selectStyleById($custID);

    public function fetchStyles();

    public function updateStyles($userID,$first_name,$last_name,$username);

    // field access functions
    public function fetchStyleID($row);
    public function fetchStyleName($row);
    public function fetchStyleDesc($row);
    public function fetchStyleStyle($row);
    public function fetchStyleActive($row);
    public function fetchStyleModifiedBy($row);
    public function fetchStyleModifiedDate($row);
    public function fetchStyleCreatedBy($row);
    public function fetchStyleMCreatedDate($row);
}
?>
