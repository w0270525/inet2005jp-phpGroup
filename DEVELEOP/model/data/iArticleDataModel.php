<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iArticleDataModel
{
    public function connectToDB();

    public function closeDB();

    public function selectArticles();

    public function selectArticleByArticleId($articleID);

    //public function fetchAllArticles();

    //public function updateArticle($article);

    // field access functions
    public function fetchArticleID($row);
    public function fetchArticleName($row);
    public function fetchArticleTitle($row);
    public function fetchArticleDescription($row);
    public function fetchArticleContentArea($row);
    public function fetchArticleBlurb($row);
    public function fetchArticleContent($row);
    public function fetchArticleAssocPage($row);
    public function fetchArticleCreatedBy($row);
    public function fetchArticleCreatedDate($row);
    public function fetchArticleLastModifiedBy($row);
    public function fetchArticleLastModifiedDate($row);



}
?>
