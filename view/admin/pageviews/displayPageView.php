
<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
?>
<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#viewsitepafweArticleTable">View Pages </button>
<div id="viewsitepafweArticleTable" class="collapse in">

<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
            <? if (CMS_checkAdmin()):?>
      <th>Created By</th>
      <th>Created Date</th>
      <th>Modified By</th>
      <th>Modified Date</th>
       <? endif; if (CMS_checkEditor()):?>
      <th>Edit</th>
      <th>Delete</th>
        <? endif;?>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($arrayOfPages as $page):
  ?>
    <tr>
      <span id='tableid'><?php echo $page->getId(); ?></span>
      <td><?php echo $page->getName(); ?></td>
      <td><?php echo $page->getAlias(); ?></td>
      <td><?php echo $page->getDesc(); ?></td>

        <? if (CMS_checkAdmin()):?>
      <td><?php echo $page->getCreatedBy(); ?></td>
      <td><?php echo $page->getCreatedDate(); ?></td>
      <td><?php echo $page->getModifiedBy(); ?></td>
      <td><?php echo $page->getModifiedDate(); ?></td>
        <? endif;

        if (CMS_checkEditor()):?>
              <td><a href="?pageupdate=<?php echo $page->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
               <td><a href="?pagedelete=<?php echo $page->getId() ; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        <? endif;?>
    </tr>
  <?php
    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>
</table>
</div>