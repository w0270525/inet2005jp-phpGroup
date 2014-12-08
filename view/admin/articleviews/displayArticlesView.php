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
$user=unserialize($_SESSION["user"]);
?>

<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#viewarticlestable">View Article </button>
<div id="viewarticlestable" class="collapse in">

  <table class="table" style="width:100%">
    <thead>
    <tr>
      <th>Name / Title</th>
      <th>Content Area / Content</th>
      <th>All Pages or Associated Page</th>
      <th>Blurb</th>
      <th>Desccription</th>
      <?php if($user->isAdmin()): ?>
        <th>Created By</th>
        <th>Created Date</th>
        <th>Modified By</th>
        <th>Modified Date</th>
      <?php
      endif;
      if ($user->isEditor()):
        ?>
        <th>Edit</th>
        <th>Delete</th>
      <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($arrayOfArticles as $article):
      ?>
      <tr>
        <td>
          <?php echo $article->getName(); ?><br/>
          <?php echo $article->getTitle(); ?>
        </td>
        <td>
          <?php echo $article->getContentarea(); ?><br/>
          <?php echo $article->getContent(); ?>
        </td>
        <!-- show icon for all pages or show page number -->
        <td>
          <?php if($article->getAllPages()==1): ?>
            <span class="glyphicon glyphicon-check"></span>
          <?php else:
            echo $article->getAssocPage();
          endif;?>
        </td>
        <td><?php echo $article->getBlurb(); ?></td>
        <td><?php echo $article->getDesc(); ?></td>
        <?php if($user->isAdmin()): ?>
          <td><?php echo $article->getCreatedBy(); ?></td>
          <td><?php echo $article->getCreatedDate(); ?></td>
          <td><?php echo $article->getModifiedBy(); ?></td>
          <td><?php echo $article->getModifiedDate(); ?></td>
        <?php
        endif;
        // Only show delete and edit if user is editor;
        if($user->isEditor()):
          ?>
          <!-- update and delete links -->
          <td><a href="?articleupdate=<?php echo $article->getId(); ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td><a href="?articleremove=<?php echo $article->getId(); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        <?php endif; ?>
      </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
  </table>

 </div><!-- end boot strap div -->
