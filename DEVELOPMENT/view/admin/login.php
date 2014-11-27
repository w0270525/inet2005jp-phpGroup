<?php
if(!isset($_SESSION["logged"])||($_SESSION["logged"]==false))
{
    $_SESSION["logged"]=false;
    $_SESSION["user"]=null;
    echo "please login to access CMS management";
    ?>
        <h1>Please enter you login credentials </h1>
        <form action="#" method="POST">
        <label>Username:<br>
        <input type="text" name="username"/>
        <br></label>
        <label>Last name:<br>
        <input type="text" name="password"/>
        <input type="submit" name="submit" value="login"/>
        </label>
</form>
<?php
}


