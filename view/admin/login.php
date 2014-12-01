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

<br/><br/><br/><br/><br/><br/><br/>
<h3>LOGIN into CMS</h3>


<form    name="login" id="login" class="newPass" action="#" method="post" >
    <input type="hidden" name="dfd34234324" id="dfd34234324" value = <?php echo $bnasd3432er?>/>
<span id="formBody" onclick="formChange()">
    <input type="text" name="sdeesef" id="sdeesef" value =""/>
    <input type="text" name="userName" id="userName"  required />
    <input type="password" name="password" id="password" onkeyup="encode(this.id)" required />
</span>

<div type="button" class="btn btn-default" id="verifyBut" onclick="verifyPassword();clear()"  >Done</div>

<input class=""  onsubmit="clear()" type="submit" id="SetPassword" name="submit"  value="Confirm" required / >
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

        if (document.forms["login"]["userName"].value.length>4)
            if (document.forms["login"]["password"].value.length>4)
                return true;

        return false;
    }
    function encode(control)
    {
        var ckey = $("#dfd34234324").val();
        var y=document.getElementById(control).value;
        var encrypted = CryptoJS.AES.encrypt(y, ckey);
        document.getElementById("sdeesef").value=encrypted;
    }



</script>