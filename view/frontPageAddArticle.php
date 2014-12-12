



<?php
// author link to edit front paGE Article


$articleCounter++;
$form = new addArticleForm($articleCounter , $ca,$currentPage);
$form->showEditContentForm();
