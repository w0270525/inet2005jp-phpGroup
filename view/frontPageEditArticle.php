



<?php
// author link to edit front paGE Article


$articleCounter++;
$form = new articleForm($articleCounter , $a,$ca,$currentPage);
$form->showEditContentForm();
?>