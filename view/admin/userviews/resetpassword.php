<br/><br/><br/><br/><br/><br/><br/>
<h3>YOU MUST SET YOUR PASSWORD BEFORE CONTINUING</h3>


<form name="newPass" id="newPass" class="newPass" action="#" method="post" >
    <input type="hidden" name="dfd34234324" id="dfd34234324" value = <?php echo $bnasd3432er?>/>
    <input type="hidden" name="userName" id="userName" value = <?php echo  $user->getId()?>  >
   <span id="formBody" onclick="formChange()">
     <input type="text" name="sdeesef" id="sdeesef" value =""/>
    <input type="password" name="pass" id="pass" onkeyup="encode(this.id)" required />
    <input type="password" name="passVerify" id="passVerify"  required / ></span>
    <div type="button" class="btn btn-default" id="verifyBut" onclick="verifyPassword();clear()"  >Done</div>
    <input class="" onsubmit="clear()" type="submit" id="SetPassword" name="submit"  value="Confirm" required / >
</form>

<script>

    function clear()
    {
       // encode( document.forms["newPass"]["pass"]);
        document.forms["newPass"]["pass"].value="**********";
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
    function encode(control)
    {
        var ckey = $("#dfd34234324").val();
        var y=document.getElementById(control).value;
        var encrypted = CryptoJS.AES.encrypt(y, ckey);
        document.getElementById("sdeesef").value=encrypted;
    }

//    function decode(control)
//    {
//        var ckey = $("#dfd34234324").val();
//        var y=document.getElementById(control).value;
//        var decrypted = CryptoJS.AES.decrypt(y, ckey);
//        decrypted = decrypted.toString(CryptoJS.enc.Utf8);
//        document.getElementById("cryptoff").value=decrypted;
//    }

</script>