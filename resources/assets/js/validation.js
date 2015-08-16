/**
 * Created by thuyshawn on 8/08/2015.
 */
$(document).ready(function(){
    $('.validation-form').submit(function () {
        var abort = false;
        $('div.error').remove();
        $(':input[required]').each(function(){
            if ($(this).val()=== '') {
                $(this).before('<div class="error"> This field can not be blank </div>');
                abort = true;
            }
        }) // go through each required value
        if(abort) { return false; } else { return true;}
    }) // on submit

    /*
     * These functions will test the various fields to see if they are blank.  In order to validate a field,
     * you must first set a selector variable telling Jquey where to find the value.  Next, create a check object with
     * any of the following fields
     * notEmpty = checks if the field is empty, longEnough = checks if the field is long enough,
     * lettersOnly = only letters are allowed in this field, numbersOnly only numbers are allowed in this field,,
     * email = checks if its an email,
     * usernameAvailable & emailAvailable = are Ajax functions that check to the database to see if the values are still
     * available
     *
     * The validation functions will automatically run tests on every check object
     */
    $('#username').blur(function(){
        var selector = '#username';
        // Object that will select which objects will be tested
        var check = { notEmpty : false, longEnough : false, min:4, usernameAvailable : false };
        // removes previous errors
        restart();
        // This functions tests all the validations on the check object
        validations(check, selector);

    }); // blur function

    $('#email').blur(function(){
        selector = '#email';
        restart();
        var value = $(this).val().trim();
        var url = "/TechReader/public/register/check/email/" + value;
        //var url = "/register/check/email/" + value;
        var check = { notEmpty : false, email : false, emailAvailable : false };
        // run validation
        validations(check, selector);
    }); // blur function

    $('#password').blur(function(){
        restart();
        var selector = '#password';
        var check = { notEmpty : false, longEnough : false, min:6 };
        // run validation
        validations(check, selector);

    }); // blur function

    $('#confirm-password').blur(function(){
        $('div.error').remove();
        var selector = '#confirm-password';
        var check = { notEmpty : false, match : false, matchValue : '#password'};
        validations(check, selector);

    }); // blur function

    $('#first-name').blur(function () {
        restart();
        var selector = '#first-name';
        // validation checks
        var check = {notEmpty: false, lettersOnly: false };
        validations(check, selector);
    });

    $('#last-name').blur(function () {
        restart();
        var selector = '#last-name';
        // validation checks
        var check = {notEmpty: false, lettersOnly: false };
        validations(check, selector);
    });

    $('#phone').blur(function () {
        restart();
        var selector = '#phone';
        // validation checks
        var check = {notEmpty: false, numbersOnly: false };
        validations(check, selector);
    });
    $('#address').blur(function () {
        restart();
        var selector = '#address';
        // validation checks
        var check = {notEmpty: false };
        validations(check, selector);
    });
    $('#state').blur(function () {
        restart();
        var selector = '#state';
        // validation checks
        var check = {notEmpty: false, lettersOnly: false };
        validations(check, selector);
    });
    $('#city').blur(function () {
        restart();
        var selector = '#city';
        // validation checks
        var check = {notEmpty: false, lettersOnly: false };
        validations(check, selector);
    });
    $('#postalCode').blur(function () {
        restart();
        var selector = '#postalCode';
        // validation checks
        var check = {notEmpty: false, numbersOnly: false };
        validations(check, selector);
    });


}); // document ready

/**
 * This validation goes through every check object to determine if the value is true.  If it is true then
 * the function will move to the next check until the end where the correct function is called.
 *
 * If the value is falsethe function terminates
 *
 * @param check
 * @param selector
 */
function validations(check, selector) {
    if(typeof check.notEmpty !== 'undefined') {
        // check if the value is empty
        check.notEmpty = checkIfEmpty(selector, 'This cannot be blank!');
        if(check.notEmpty === false) {return; }

    }
    if(typeof check.blackwash !== 'undefined') {
        console.log('run the long enough check');
    }
    if(typeof check.longEnough !== 'undefined' && typeof check.min !== 'undefined') {
        // check if the value is long enough
        var message = "This must be at least " + check.min + " characters long";
        check.longEnough = checkIfLongEnough(selector, message, check.min);
        if(check.longEnough === false ) {return;}

    }
    if(typeof check.lettersOnly !== 'undefined') {
        check.lettersOnly = lettersOnly(selector);
        if(check.lettersOnly === false ) {return;}
    }
    if(typeof check.numbersOnly !== 'undefined') {
        check.numbersOnly = numbersOnly(selector);
        if(check.numbersOnly === false ) {return;}
    }
    if(typeof check.match !== 'undefined' && typeof check.matchValue !== 'undefined') {
        check.match = compareValues(selector, check.matchValue, 'Your passwords must match');
        if(check.match === false ) {return;}
    }
    if(typeof check.email !== 'undefined') {
        check.email = checkIfEmail(selector);
        if(check.email === false ) {return;}
    }
    if(typeof check.usernameAvailable !== 'undefined') {
        check.usernameAvailable = checkUsername(selector);
        if(check.usernameAvailable === false ) {return;}
    }
    if(typeof check.emailAvailable !== 'undefined') {
        check.emailAvailable = checkEmail(selector);
        if(check.emailAvailable === false ) {return;}
    }
    correct(selector);
}

// removes all previous erros
function restart(){
    // remove past error messages
    $('div.error').remove();
}

// css for when validation is passed
function correct(value)
{
    $(value).css('background-color', '#D1FFC2');
}

// css for when validation fails
function notCorrect(value)
{
    $(value).css('background-color', '#FFB2B2');
    $('.error').effect('shake', {times: 3, distance: 5});
    $(value).focus();
}

// creates a message to display to the user
function createMessage(message) {
    var validationMessage = '<div class="error">';
    validationMessage += message;
    validationMessage += '</div>';
    return validationMessage;
}

// Returns a boolean if the value is empty with a message
function checkIfEmpty(selector, message) {
    value = $(selector).val().trim();
    var validationMessage = createMessage(message);

    if (value === '') {
        $(selector).before(validationMessage);
        notCorrect(selector);
        return false;
    } else {
        return true;
    } // end if empty
}

// Returns a boolean if the value is not long enough
function checkIfLongEnough(selector, message, number) {
    value = $(selector).val().trim();
    var validationMessage = createMessage(message);

    if(value.length < number) {
        $(selector).before(validationMessage);
        notCorrect(selector);
        return false;
    } else {
        return true;
    } // end long enough if
}

//Returns a boolean if the value is not an email
function checkIfEmail(selector) {
    var email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
    // check if the value is an email
    return checkRegularExpression(selector, 'Please enter a valid email address', email);
}

//Returns a boolean if there is anything other than letters in the value
function lettersOnly(selector) {
    var checkValue = /^[a-zA-Z]*$/
    // check if the value contains numbers only
    return checkRegularExpression(selector, 'This is not valid', checkValue);
}

//Returns a boolean if there is anything other than numbers in the value
function numbersOnly(selector) {
    var checkValue = /^[0-9]*$/
    // check if the value contains numbers only
    return checkRegularExpression(selector, 'This is not valid', checkValue);
}

// Returns a boolean if a value passed a regular expression
function checkRegularExpression(selector, message, regularExpression) {
    value = $(selector).val().trim();
    var validationMessage = createMessage(message);

    if(!regularExpression.test(value)) {
        $(selector).before(validationMessage);
        notCorrect(selector);
        return false;
    } else {
        return true;
    }
}

// Compares to values and returns a boolean
function compareValues(selector1, selector2, message) {
    var validationMessage = createMessage(message);
    var value1 = $(selector1).val().trim();
    var value2 = $(selector2).val().trim();

    if(value1 === value2) {
        return true
    } else {
        $(selector1).before(validationMessage);
        notCorrect(selector1);
        return false
    }
}

// Ajax request to see if the username is available
function checkUsername(selector){
    value = $(selector).val().trim();
    //var url = "/TechReader/public/register/check/username/" + value;
    var url = "/register/check/username/" + value;

    // Ajax request to see if the username has been taken
    var result = ajaxUsernameRequest(url);
    if(result === false) {
        $(selector).before('<div class="error"> This username has already been taken </div>');
        notCorrect(selector);
    }

    return result;
}

// Ajax request to see if the email is available
function checkEmail(selector){
    value = $(selector).val().trim();
    //var url = "/TechReader/public/register/check/email/" + value;
    var url = "/register/check/email/" + value;

    // Ajax request to see if the username has been taken
    var result = ajaxUsernameRequest(url);
    if(result === false) {
        $(selector).before('<div class="error"> This email is already registered </div>');
        notCorrect(selector);
    }
    return result;
}

// Returns the ajax value
function ajaxUsernameRequest(url){
    var jqxhr = $.ajax({
        async : false,
        type : 'GET',
        url: url,
        dataType : 'JSON'
    }).responseJSON;
    return jqxhr.result;
}