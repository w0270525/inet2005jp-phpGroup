<?php

function tableGlyphs($bool){
if($bool) echo '<span class="glyphicon glyphicon-ok"></span>';
else echo '<span class="glyphicon glyphicon-ban-circle" style="color:red";></span>';
}



function verifyAdmin()
{  if(confirmLogin())
    if(unserialize($_SESSION['user'])->isAdmin())
        return true;
    return false;

}

?>
