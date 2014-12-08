
<style type="text/css">
    table
    {
        border: 1px solid purple;
    }
    th, td
    {
        border: 1px solid red;
    }
</style>

<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
?>
<h1>Site Pages</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
      <?php if(CMS_checkAdmin()):?>
      <th>Created By</th>
      <th>Created Date</th>
      <th>Modified By</th>
      <th>Modified Date</th>
        <?php endif;
        if(CMS_checkEditor()):?>
        <th>Edit</th>
        <th>Delete</th>
        <?php endif; ?>
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
      <?php if (CMS_checkAdmin()):?>
      <td><?php echo $page->getCreatedBy(); ?></td>
      <td><?php echo $page->getCreatedDate(); ?></td>
      <td><?php echo $page->getModifiedBy(); ?></td>
      <td><?php echo $page->getModifiedDate(); ?></td>
        <?php endif;
      if(CMS_checkEditor()):?>
        <td><a href="?pageupdate=<?php echo $page->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
        <td><a href="?pageremove=<?php echo $page->getId() ; ?>"><span class="glyphicon glyphicon-remove" ></span></a></td>
        <?php endif;?>
    </tr>
  <?php
    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>addapagestabl
</table>
