<?php
//if(!isset($_SESSION["logged"])||($_SESSION["logged"]==false))
//{
//    $_SESSION["logged"]=false;
//    $_SESSION["user"]=null;
//    echo "please login to access CMS management";
//    ?>
<!--        <h1>Please enter you login credentials </h1>-->
<!--        <form action="#" method="POST">-->
<!--        <label>Username:<br>-->
<!--        <input type="text" name="username"/>-->
<!--        <br></label>-->
<!--        <label>Last name:<br>-->
<!--        <input type="text" name="password"/>-->
<!--        <input type="submit" name="submit" value="login"/>-->
<!--        </label>-->
<!--</form>-->
<?php
//}
?>

<br/><br/>

<h3>LOGIN into CMS</h3>
<h4>If you have just been registered by an administrator your passwsord is "password"<h4>


<form    name="login" id="login" class="newPass" action="#" method="post" >
    <input type="hidden" name="dfd34234324" id="dfd34234324"  value="dfd34234324">

    <label> User Name
    <input type="text" class="form-control"  name="userName" id="userName"  required /></label>
      <label> Password
    <input type="password" class="form-control"  name="password" id="password" onkeyup="encode(this.id)" required /></label>


<div type="button" class="btn btn-default form-control" id="verifyBut" onclick="verifyPassword();clear()"  >Done</div>

<input class="btn btn-default form-control"  onsubmit="clear()" type="submit" id="SetPassword" name="submit"  value="Confirm" required / >
</form>

<script>

    function clear()
    {
      // document.forms["newPass"]["pass"].value="**********";
        $('#formBody').hide();
    }
    function formChange()
    {
        $('#SetPassword').hide();
        $('#verifyBut').show();
    }


    $('#SetPassword').hide();
    function verifyPassword()
    {
        {
            if(verify_Password())
            {
                $('#SetPassword').show();
                $('#verifyBut').hide();
                clear();

            }
            else{
                $('#SetPassword').hide();
                $('#verifyBut').show();
            }
        }
    }
    function verify_Password(){

        if (document.forms["login"]["userName"].value.length>3)
            if (document.forms["login"]["password"].value.length>3)
                return true;

        return false;
    }


</script>