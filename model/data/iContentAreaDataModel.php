<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iContentAreaDataModel
{
    public function connectToDB();
    public function closeDB();

    public function selectContentArea();
    public function selectContentAreaById($custID);

    public function fetchContentAreas();

   // public function updateContentArea($userID,$first_name,$last_name,$username);

    // field access functions
    public function fetchContentAreaID($row);
    public function fetchContentAreaName($row);
    public function fetchContentAreaDescription($row);
    public function fetchContentAreaAlias($row);
    public function fetchContentAreaOrder($row);
    public function fetchContentAreaModifiedBy($row);
    public function fetchContentAreaAssocPage($row);
    public function fetchContentAreaLastModifiedDate($row);
    public function fetchContentAreaCreatedBy($row);
    public function fetchContentAreaCreatedDate($row);
}
?>
