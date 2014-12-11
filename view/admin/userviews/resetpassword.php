<br/><br/><br/><br/><br/><br/><br/>
<h3>YOU MUST SET YOUR PASSWORD BEFORE YOU CONINUE</h3>

<p>Both password must match to continue</p>
<form class="form" name="newPass" id="newPass"  action="#" method="post" >

    <input type="hidden" name="passwordReset" id="passwordReset" value = "true"/>

    <input  type="hidden" name="userId" id="userId" value="<?php echo  $user->getId()?>"  >


    <label>Password</label>
    <input class = "form-control" type="password" name="pass" id="pass"   required />
    <label>Verify Password</label>
    <input class = "form-control" type="password" name="passVerify" id="passVerify"  required / >
    <div  type="button" class="btn btn-default" id="verifyBut" onclick="verifyPassword();clear()">Done</div>
    <input class="" onsubmit="clear()" type="submit" id="SetPassword" name="submit"  value="Confirm" required / >
</form>

<script>

    function clear()
    {
       // encode( document.forms["newPass"]["pass"]);
        document.forms["newPass"]["password"].value="**********";
        document.forms["newPass"]["passVerify"].value="**********";
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

        if (document.forms["newPass"]["pass"].value == document.forms["newPass"]["passVerify"].value)
            if (document.forms["newPass"]["pass"].value.length>5)
            return true;

        return false;
    }
//    function encode(control)
//    {
//        var ckey = $("#dfd34234324").val();
//        var y=document.getElementById(control).value;
//        var encrypted = CryptoJS.AES.encrypt(y, ckey);
//        document.getElementById("sdeesef").value=encrypted;
//    }

//    function decode(control)
//    {
//        var ckey = $("#dfd34234324").val();
//        var y=document.getElementById(control).value;
//        var decrypted = CryptoJS.AES.decrypt(y, ckey);
//        decrypted = decrypted.toString(CryptoJS.enc.Utf8);
//        document.getElementById("cryptoff").value=decrypted;
//    }

</script>