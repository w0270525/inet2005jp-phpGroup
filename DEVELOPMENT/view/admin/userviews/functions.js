



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



