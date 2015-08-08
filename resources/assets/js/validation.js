/**
 * Created by thuyshawn on 8/08/2015.
 */

$(document).ready(function(){
    $('#registration-form').submit(function () {
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
}); // document ready




$('#registration-name').blur(function(){
    $('div.error').remove();
    if ($(this).val()=== '') {
        $(this).before('<div class="error"> Please enter a user name </div>');
    } // if statement
}); // blur function

$('#registration-email').blur(function(){
    $('div.error').remove();
    var val = $(this).val();
    var email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
    if ($(this).val()=== '') {
        $(this).before('<div class="error"> Please enter your email address </div>');
    } // if blank
    if(!email.test(val)) {
        $(this).before('<div class="error"> Please enter a valid email </div>');
    } // if its an email

}); // blur function

$('#registration-password').blur(function(){
    $('div.error').remove();
    if ($(this).val()=== '') {
        $(this).before('<div class="error"> Please enter a password </div>');
    } // if statement
}); // blur function

$('#registration-confirm-password').blur(function(){
    $('div.error').remove();
    if ($(this).val()=== '') {
        $(this).before('<div class="error"> Please confirm your password </div>');
    } // if statement
}); // blur function