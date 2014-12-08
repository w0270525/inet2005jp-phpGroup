
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

<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#formAdeleterticle">Add  New Article  </button>
<div id="formAdeleterticle" class="collapse in">


<h1>Site Styles</h1>
  <table class="table">
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Style</th>
      <th>Active</th>
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
    foreach($arrayOfStyles as $style):
      ?>
      <tr>
        <td><?php echo $style->getName(); ?></td>
        <td><?php echo $style->getDesc(); ?></td>
        <td><?php echo $style->getStyle(); ?></td>
        <td>
          <!-- // create a linke to set active for editors only -->
          <?php if(CMS_checkEditor()):?>
          <span id="activateStyle">
<a href="?activateStyle=<?php echo $style->getId()?>" >
  <?php endif; ?>
  <?php if($style->getActive()): ?>
    <span class="glyphicon glyphicon-check"></span>
  <?php else: ?>
    <span class="glyphicon glyphicon-stop"></span>
  <?php
  endif;
  ?>
  <?php if(CMS_checkEditor()): ?></a><?php endif; ?>
        </td>
        <?php if ($user->isAdmin()): ?>
          <td><?php echo $style->getCreatedBy(); ?></td>
          <td><?php echo $style->getCreatedDate(); ?></td>
          <td><?php echo $style->getModifiedBy(); ?></td>
          <td><?php echo $style->getModifiedDate(); ?></td>
        <?php endif;
        // only shhow delet and edit if user is editor
        if($user->isEditor()): ?>
          <td><a href="?updatestyle=<?php echo $style->getId(); ?>"><span class="glyphicon glyphicon-pencil" ></span></a></td>
          <td><a href="?deleteStyle=<?php echo $style->getId(); ?>"><span class="glyphicon glyphicon-remove" ></span></a></td>
        <?php
        endif;?>
      </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    <tfoot></tfoot>
  </table>
<div id="null" class="hidden"></div>
</div><!--bootstrap div -->
<script>
 var savedHtml;

     $('.confirmation').on('click', function () {
         return confirm('Are you sure you want to change the style?');
     });



}
</script>
