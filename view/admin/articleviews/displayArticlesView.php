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
<h1>Site Articles</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Content Area</th>
      <th>Content</th>
      <th>Associated Page</th>
      <th>All Pages</th>
      <th>Blurb</th>
      <th>Description</th>
      <th>Created By</th>
      <th>Created Date</th>
      <th>Modified By</th>
      <th>Modified Date</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($arrayOfArticles as $article):
  ?>
    <tr>
      <span id='articleId'><?php echo $article->getId(); ?></span>
      <td><?php echo $article->getName(); ?></td>
      <td><?php echo $article->getTitle(); ?></td>
      <td><?php echo $article->getContentarea(); ?></td>
      <td><?php echo $article->getContent(); ?></td>
      <td><?php echo $article->getAssocPage(); ?></td>
      <td><?php echo $article->getAllPages(); ?></td>
      <td><?php echo $article->getBlurb(); ?></td>
      <td><?php echo $article->getDesc(); ?></td>
      <td><?php echo $article->getCreatedBy(); ?></td>
      <td><?php echo $article->getCreatedDate(); ?></td>
      <td><?php echo $article->getModifiedBy(); ?></td>
      <td><?php echo $article->getModifiedDate(); ?></td>
      <td><a href="?pageupdate=<?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
    </tr>
  <?php
    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>
</table>