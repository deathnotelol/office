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
        selectYears: 30,     // Enables a year dropdown with 20 years range
        format: 'yyyy-mm-dd', // Adjust the format as needed
        today: 'Today',
        clear: 'Clear',
        close: 'Close',
        closeOnSelect: true // Keep picker open until user clicks close
    });

       // Function to convert numbers to Myanmar numerals
    // function convertToMyanmarNumerals(number) {
    //     const myanmarNumerals = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
    //     return number.toString().split('').map(digit => myanmarNumerals[digit]).join('');
    // }

     // Function to update the date format to Myanmar numerals
    //  function updateDateToMyanmar(dobInput) {
    //     let dobValue = dobInput.val(); // Get the selected date from the input field

    //     // If no value is provided, exit
    //     if (!dobValue) return;

    //     // Split the date into year, month, and day
    //     let [year, month, day] = dobValue.split('-');

    //     // Convert the year, month, and day to Myanmar numerals
    //     let myanmarYear = convertToMyanmarNumerals(year);
    //     let myanmarMonth = convertToMyanmarNumerals(month);
    //     let myanmarDay = convertToMyanmarNumerals(day);

    //     // Format the Myanmar date as "yyyy-mm-dd"
    //     let myanmarFormattedDate = `${myanmarYear}-${myanmarMonth}-${myanmarDay}`;

    //     // Update the input field with the Myanmar numerals formatted date
    //     dobInput.val(myanmarFormattedDate);
    // }

    // // Event listener for changes in the date picker input field
    // $('.datepicker-default').on('change', function () {
    //     updateDateToMyanmar($(this));  // Call the function to update the date with Myanmar numerals
    // }); 

})(jQuery);
