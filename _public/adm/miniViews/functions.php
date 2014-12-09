<?php

// light weight function to verify user is logged
// if user is not logged they are redirected to main page



function confirmAction()
{
     CMS_confirmLogin();
?>
Are You Sure you Want To Perform This Action
<button value="yes" onclick="returnThis(true)">Yes</button>
<button value="no" onclick="returnThis(false)">No</button>
<script>
  // script function used to return the value clicked above
  function returnThis($any)
  {
      return  $any;
  }
</script>
<?php
}



//
function CMS_setPage($pageNumber)
{   if(!isset($_GET["page"]))$_GET["page"]=1;
    $result=$_GET["page"] ;
    $_GET["page"]=intval($pageNumber);
    return $result;
}


