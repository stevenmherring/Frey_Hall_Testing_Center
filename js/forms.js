function formhash(form, password) {
    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent.
    password.value = "";

    // Finally submit the form.
    form.submit();
}

function regformhash(form, uid, netid, email, password, conf) {
     // Check each field has a value
    if (uid.value == ''         ||
          netid.value == ''     ||
          email.value == ''     ||
          password.value == ''  ||
          conf.value == '') {

        alert('You must provide all the requested details. Please try again');
        return false;
    }
    //check netid
    //TODO: sherring accept only #'s and non existing netids
    if (netid.value.length < 9 || netid.value.length > 15){
        alert("netid must be between 9 and 15 characters long");
        form.netid.focus();
        return false;
    }

    // Check the username
    //TODO: sherring accept only #'s and non existing netids
    if (uid.value.length < 9 || uid.value.length > 15){
        alert("netid must be between 9 and 15 characters long");
        form.uid.focus();
        return false;
    }

    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }

    // At least one number, one lowercase and one uppercase letter
    // At least six characters

    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }

    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }

    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent.
    password.value = "";
    conf.value = "";

    // Finally submit the form.
    form.submit();
    return true;
}
