function chkName() {
    var myName = document.getElementById("custName");
    var pos = myName.value.search(/\w+, ?\w+, ?\w.?/);
    if (pos != 0) {
        alert("The name you entered (" + myName.value +
            ") is not in the correct form. \n" +
            "The correct form is: " +
            "last-name, first-name, middle-initial \n" +
            "Please go back and fix your name");
        myName.focus();
        myName.select();
        return false;
    } else
        return true;
}


function chkPhone() {
    var myPhone = document.getElementById("phone");
    var pos = myPhone.value.search(/^\d{3}-\d{3}-\d{4}$/);
    if (pos != 0) {
        alert("The phone number you entered (" + myPhone.value +
            ") is not in the correct form. \n" +
            "The correct form is: ddd-ddd-dddd \n" +
            "Please go back and fix your phone number");
        myPhone.focus();
        myPhone.select();
        return false;
    } else
        return true;
}