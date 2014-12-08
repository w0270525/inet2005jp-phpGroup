
<?php
  if(!empty($lastOperationResults)):
?>
<h2><?php echo $lastOperationResults; ?></h2>
<?php
  endif;
?>

<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#viewartidasclestable">View Article </button>
<div id="viewartidasclestable" class="collapse in">

<table class="table" ><tbody style="width:100%">


 <tr >
        <td>Name / Title</td>
        <td> Contentarea / Content </td>
     <td> Active </td>
        <td > AllPages or AssocPage </td>
        <td> Blurb </td>
        <td> Desc </td>
     <!-- editor specific items -->
      <?php if(CMS_checkAuthor()|| CMS_checkEditor()):?>
        <td> Edit </td>
        <td> Delete </td>
     <?php endif;?>

     <!-- admin items =-->
     <?php if(CMS_checkAdmin()):?>
        <td> Created By </td>
        <td> Created Date </td>
         <td>Modified By</td>
         <td> Modified Date</td>
     <?php endif;?>
</tr>


    <?php
    foreach($arrayOfArticles as $article):

        ?>
        <tr>

            <td><?php echo $article->getName(); ?><br/>
            <?php echo $article->getTitle(); ?></td>
            <td><?php echo $article->getContentarea(); ?><br/>
             <?php echo $article->getContent(); ?></td>
            <td><?php if($article->getActive()==1):
                   ?>
                    <span class="glyphicon glyphicon-check"></span>
                <?php
                else: ?> <span class="glyphicon glyphicon-warning-sign"></span>
            <?php endif; ?>
            </td>


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
            <?php if(CMS_checkAuthor()|| CMS_checkEditor()):?>
            <td><a href="?articleupdate= <?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a href="?articleremove= <?php echo $article->getId() ; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            <?php endif;
            if (CMS_checkAdmin()):?>
            <td><?php echo $article->getCreatedBy();?></td>
             <td><?php echo $article->getCreatedDate();?></td>
             <td><?php echo $article->getModifiedBy();?></td>
             <td><?php echo $article->getModifiedDate();?></td>
            <?php endif ?>
 </tr>
    <?php

    endforeach;
  ?>
  </tbody>
  <tfoot></tfoot>
</table>

 </div><!-- end boot strap div -->
