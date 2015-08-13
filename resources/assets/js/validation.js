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
     * This function checks if the value is blank, long enough, and if the username is already taken
     * The event is when the user clicks away from the field
     *
     *
     */
    $('#registration-name').blur(function(){
        var value = $(this).val();
        //var url = "/TechReader/public/register/check/username/" + value;
        var url = "/register/check/username/" + value;

        // Object used to check status
        var check = { notEmpty : false, longEnough : false, available : false };
        var value = $(this).val().trim();

        // remove past error messages
        $('div.error').remove();

        // check if the value is empty
        check.notEmpty = checkIfEmpty('#registration-name', 'Please enter a user name');

        // check if the value is at least 4 characters
        if(check.notEmpty === true) {
            check.longEnough = checkIfLongEnough('#registration-name', 'Your username must be at least 4 characters long', 4);
        }

        // Ajax request to see if the username has been taken
        // Only perform if min length and not empty have passed
        if(check.notEmpty === true && check.longEnough === true) {
            check.available = ajaxUsernameRequest(url);
        } // end if not empty and long enough

        if(check.notEmpty === true && check.longEnough === true && check.available === false) {
            $('#registration-name').before('<div class="error"> This username has already been taken </div>');
            notCorrect('#registration-name');
        }
        if(check.notEmpty === true && check.longEnough === true && check.available === true) {
            correct('#registration-name');
        }
    }); // blur function

    $('#email').blur(function(){
        $('div.error').remove();
        var value = $(this).val().trim();
        var email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
        //var url = "/TechReader/public/register/check/email/" + value;
        var url = "register/check/email/" + value;
        var check = { notEmpty : false, email : false, available : false };

        // check if the email is empty
        check.notEmpty = checkIfEmpty('#email', 'Please enter your email address');

        // check if the value is an email
        if(check.notEmpty === true) {
            check.email = checkRegularExpression('#email', 'Please enter a valid email address', email);
        }

        // check if the email has already been used
        if(check.notEmpty === true && check.email === true) {
            check.available = ajaxUsernameRequest(url);
            console.log(check);
        }

        if(check.notEmpty === true && check.email === true && check.available === false) {
            $('#email').before('<div class="error"> This email is already registered </div>');
            notCorrect('#email');
        }
        if(check.notEmpty === true && check.email === true && check.available === true) {
            correct('#email');
        }

    }); // blur function

    $('#password').blur(function(){
        $('div.error').remove();
        var value = $(this).val().trim();
        var check = { notEmpty : false, longEnough : false };
        // check if the password is empty
        check.notEmpty = checkIfEmpty('#password', 'Please enter a password');

        // check if 6 characters long
        if(check.notEmpty === true) {
            check.longEnough = checkIfLongEnough('#password', 'Your password must be at least 6 characters', 6);
        }

        // pass validation
        if(check.notEmpty === true && check.longEnough === true) {
            $(this).css('background-color', '#D1FFC2');
        }

    }); // blur function

    $('#confirm-password').blur(function(){
        $('div.error').remove();
        var value = $(this).val().trim();
        var check = { notEmpty : false, match : false };
        var compare = $('#password').val();

        // check if the value is empty
        check.notEmpty = checkIfEmpty('#confirm-password', 'Please confirm your password');

        // check if long enough
        if(check.notEmpty === true) {
            check.match = compareValues('#confirm-password', '#password', 'Your passwords must match');
        }

        if(check.notEmpty === true && check.match === true) {
            $(this).css('background-color', '#D1FFC2');
        }

    }); // blur function

    $('#first-name').blur(function () {
        var value = $(this).val().trim();
        var selector = '#first-name';
        var nameCheck = /^[a-zA-Z]*$/
        // validation checks
        var check = {notEmpty: false, name: false };

        // remove past error messages
        $('div.error').remove();

        // check if the value is empty
        check.notEmpty = checkIfEmpty(selector, 'Please enter your first name');

        // check if the value is at least 4 characters
        if (check.notEmpty === true) {
            check.name = checkRegularExpression(selector, 'This is not a valid name', nameCheck);
            console.log(check);
        }
        if(check.notEmpty === true && check.name === true) {
            correct(selector);
        }
    });

    $('#last-name').blur(function () {
        var value = $(this).val().trim();
        var selector = '#last-name';
        var nameCheck = /^[a-zA-Z]*$/
        // validation checks
        var check = {notEmpty: false, name: false };

        // remove past error messages
        $('div.error').remove();

        // check if the value is empty
        check.notEmpty = checkIfEmpty(selector, 'Please enter your first name');

        // check if the value is at least 4 characters
        if (check.notEmpty === true) {
            check.name = checkRegularExpression(selector, 'This is not a valid name', nameCheck);
            console.log(check);
        }
        if(check.notEmpty === true && check.name === true) {
            correct(selector);
        }
    });

    $('#phone').blur(function () {
        var value = $(this).val().trim();
        var selector = '#phone';
        var nameCheck = /^[0-9]*$/
        // validation checks
        var check = {notEmpty: false, name: false };

        // remove past error messages
        $('div.error').remove();

        // check if the value is empty
        check.notEmpty = checkIfEmpty(selector, 'Please enter your phone number');

        // check if the value is at least 4 characters
        if (check.notEmpty === true) {
            check.name = checkRegularExpression(selector, 'This is not a valid phone number', nameCheck);
            console.log(check);
        }
        if(check.notEmpty === true && check.name === true) {
            correct(selector);
        }
    });


}); // document ready

function correct(value)
{
    $(value).css('background-color', '#D1FFC2');
}
function notCorrect(value)
{
    $(value).css('background-color', '#FFB2B2');
    $('.error').effect('shake', {times: 3, distance: 5});
    $(value).focus();
}

function createMessage(message) {
    var validationMessage = '<div class="error">';
    validationMessage += message;
    validationMessage += '</div>';
    return validationMessage;
}

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



function ajaxUsernameRequest(url){
    var jqxhr = $.ajax({
        async : false,
        type : 'GET',
        url: url,
        dataType : 'JSON'
    }).responseJSON;
    return jqxhr.result;
}







