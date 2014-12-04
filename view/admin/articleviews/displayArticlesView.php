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
<table class="table" ><tbody style="width:100%">


 <tr >
        <td>  Name / Title</td>
        <td > Contentarea / Content </td>
        <td  >AllPages or AssocPage </td>
        <td> Blurb </td>
        <td> Desc </td>
        <td> Edit </td>
        <td> Delete </td>
</tr>


    <?php
    foreach($arrayOfArticles as $article):

        ?>
        <tr>

            <td><?php echo $article->getName(); ?><br/>
            <?php echo $article->getTitle(); ?></td>
            <td><?php echo $article->getContentarea(); ?><br/>
             <?php echo $article->getContent(); ?></td>

            <!-- show icon for all pages or show page number -->
            <td><?php if($article->getAllPages()==1):
                    ?>
                    <span class="glyphicon glyphicon-check"></span>
                <?php
                else: ?><?php echo $article->getAssocPage(); ?></td>
                <?php endif; ?>



            <td><?php echo $article->getBlurb(); ?></td>
            <td><?php echo $article->getDesc(); ?></td>

            <!-- update and delete links -->
            <td><a href="?articleupdate= <?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="?articleremove= <?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>

        </tr>
    <?php

    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>
</table>
