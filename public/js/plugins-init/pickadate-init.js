// (function($) {
//     "use strict"

//     //date picker classic default
//     $('.datepicker-default').pickadate();

// })(jQuery);

(function($) {
    "use strict"

    // Date picker with month and year selection
    $('.datepicker-default').pickadate({
        selectMonths: true,  // Enables month selection when clicking the month name
        selectYears: 20,     // Enables a year dropdown with 20 years range
        format: 'yyyy-mm-dd', // Adjust the format as needed
        today: 'Today',
        clear: 'Clear',
        close: 'Close',
        closeOnSelect: false // Keep picker open until user clicks close
    });

})(jQuery);
