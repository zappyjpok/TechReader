/**
 * Created by thuyshawn on 8/08/2015.
 */

if (!Modernizr.inputtypes.date) {
    $('input[type=date]').datepicker({
        // Consistent format with the HTML5 picker
        dateFormat: 'dd-mm-yy'
    });
}

if (!Modernizr.inputtypes.time) {
    $('input[type=time]').timepicker();

}