
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

// grab the session user
$user = unserialize($_SESSION["user"]);


?>
<h1>Content Areas</h1>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Alias</th>
      <th>Description</th>
      <th>Order</th>
        <?php

        if($user->isAdmin()):
        ?>


          <th>Created By</th>
          <th>Created Date</th>
          <th>Modified By</th>
          <th>Modified Date</th>
          <th>Edit</th>

        <?php
        endif;

        ?>
    </tr>

  <?php
    foreach($arrayOfContentAreas as $content):


  ?>
    <tr>
      <span id='tableid'><?php echo $content->getId(); ?></span>
      <td><?php echo $content->getName(); ?></td>
      <td><?php echo $content->getAlias(); ?></td>
      <td><?php echo $content->getDesc(); ?></td>
      <td><?php echo $content->getOrder(); ?></td>
        <?php
        if($user->isAdmin()):
          ?>
      <td><?php echo $content->getCreatedBy(); ?></td>
      <td><?php echo $content->getCreatedDate(); ?></td>
      <td><?php echo $content->getModifiedBy(); ?></td>
      <td><?php echo $content->getModifiedDate(); ?></td>
        <?php
        endif;
        ?>


        <!-- update link sent via get -->
       <td><a href="?updateContentArea=<?php echo $content->getId() ; ?>"><span class="glyphicon glyphicon-pencil" > </span></a></td><td> <?php echo $content->getId() ;?></td>

        </tr>
    <?php

    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>
</table>
