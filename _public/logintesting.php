<!DOCTYPE html>
<html>
<head>

    <!-- Jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- BOOTSTRAP  --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>



    <link rel="stylesheet" href="css/styles.css">
</head>

<br/><br/><br/><br/><br/><br/><br/>
<h3>LOGIN into CMS</h3>



<form>
        create secret key:
        <input id='cryptonkey' value='123456'>

        crypt&middot;off:
        <textarea name='cryptoff' id='password' cols=40 rows=5 onkeyup="encode(this.id);">
            Type here to encrypt..</textarea>
        <br>crypt&middot;on:<br>
        <input id='key' value=''>
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
            var ckey = $("#cryptonkey").val();
            var y=document.getElementById(control).value;
            var encrypted = CryptoJS.AES.encrypt(y, ckey);
            document.getElementById("aesPass").value=encrypted;
        }

    function decode(control)
    {
        var ckey = $("#cryptonkey").val();
        var y=document.getElementById(control).value;
        var decrypted = CryptoJS.AES.decrypt(y, ckey);
        decrypted = decrypted.toString(CryptoJS.enc.Utf8);
        document.getElementById("cryptoff").value=decrypted;
    }
</script>