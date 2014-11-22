<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iPageDataModel
{
    public function connectToDB();
    public function closeDB();

    public function selectPages();
    public function selectPageById($custID);

    public function fetchPage();

   // public function updatePage($userID,$first_name,$last_name,$username);

    // field access functions
    public function fetchPageID($row);
    public function fetchPageName($row);
    public function fetchPageAlias($row);
    public function fetchPageStyle($row);
    public function fetchPageCreatedBy($row);
    public function fetchPageCreatedDate($row);
    public function fetchPageLastModifiedBy($row);
    public function fetchPageLastModifiedDate($row);



}
?>
