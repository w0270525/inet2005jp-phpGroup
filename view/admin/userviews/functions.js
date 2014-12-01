

function checkForm()
        {
            var val = document.form.n.value;
            if (val == "") {
            alert("Error, nothing entered!");
            return false;
            }
return true;
};

// hides a DOM Element
function hideElement($element)
        {
            $($element).hide();
            };

// TOGGLES AND DOM ELEMENTS TO HIDE OR SHOW
function toggleElement($element){
    $($element).is(':visible')
    $($element).hide();
    else
    $($element).show();
    };



function encode(control)
{
    var ckey = $("dfd34234324").val();
    var y=document.getElementById(control).value;
    var encrypted = CryptoJS.AES.encrypt(y, ckey);
    document.getElementById("#sdeesef").value=encrypted;
}

function decode(control)
{
    var ckey = $("#dfd34234324").val();
    var y=document.getElementById(control).value;
    var decrypted = CryptoJS.AES.decrypt(y, ckey);
    decrypted = decrypted.toString(CryptoJS.enc.Utf8);
    document.getElementById("cryptoff").value=decrypted;
}


