U2FsdGVkX1/lUBB25AbmrmJ4BxD59Vdeh1FshmVxKU8=
<br>
<br>
<br>
<?php



    $cryptPefix = '$6$rounds=5000$'. 1111111111;
    $passwordHashRaw = crypt ( 'admin',$cryptPefix );
    $cryptPrefixEscaped = '\$6\$rounds=5000\$'.  1111111111 . '\$';
    $passwordHash = preg_replace('/^'.$cryptPrefixEscaped.'/','',$passwordHashRaw);
    echo  $passwordHash;


?><script>

function decode(control)
    {
        var ckey = $("#dfd34234324").val();
        var y=document.getElementById(control).value;
        var decrypted = CryptoJS.AES.decrypt(y, ckey);
        decrypted = decrypted.toString(CryptoJS.enc.Utf8);
        document.getElementById("cryptoff").value=decrypted;
    }
decode(U2FsdGVkX1/lUBB25AbmrmJ4BxD59Vdeh1FshmVxKU8=)
    </script>