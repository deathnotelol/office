<?php

if (!function_exists('engToMyanmarDate')) {
    function engToMyanmarDate($date)
    {
        $eng_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $mm_numbers = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($eng_numbers, $mm_numbers, $date);
    }
}

if(!function_exists('convertMonthEngToMyanmar')) {
    function convertMonthEngToMyanmar($month)
    {
        $eng_month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $mm_month = ['ဇန်နဝါရီ','ဖေဖော်ဝါရီ','မတ်','ဧပြီ','မေ','ဇွန်','ဇူလိုင်','သြဂုတ်','စက်တင်ဘာ','အောက်တိုဘာ','နိုဝင်ဘာ','ဒီဇင်ဘာ',];
        return str_replace($eng_month, $mm_month, $month);
    }
}


if (!function_exists('engToMyanmarNumber')) {
    function engToMyanmarNumber($string)
    {
        $eng_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $mm_numbers = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($eng_numbers, $mm_numbers, $string);
    }
}

if (!function_exists('formatMyanmarDate')) {
    function formatMyanmarDate($date)
    {
        // Convert the date string to an array (assuming format "YYYY-MM-DD")
        $dateParts = explode('-', $date);
        if (count($dateParts) !== 3) {
            return $date; // Return original if invalid format
        }

        $year = engToMyanmarNumber($dateParts[0]); // Convert year
        $month = convertMonthEngToMyanmar(date('F', strtotime($date))); // Convert month
        $day = engToMyanmarNumber($dateParts[2]); // Convert day to Myanmar numbers

        // Add spaces before and after "ရက်"
        return $year . " ခုနှစ်၊ " . $month . "လ  " . $day . "   ရက်";
    }
}

if (!function_exists('formatDateToMyanmar')) {
    function formatDateToMyanmar($date)
    {
        if (!$date) {
            return '-';
        }

        // Extract only the date part (ignoring additional text)
        preg_match('/\d{1,2}-\d{1,2}-\d{4}|\d{4}-\d{2}-\d{2}/', $date, $matches);

        if (!isset($matches[0])) {
            return $date; // If no valid date found, return original value
        }

        $extractedDate = $matches[0];

        // Convert to d-m-Y format
        return \Carbon\Carbon::parse($extractedDate)->format('d-m-Y');
    }
}

if (!function_exists('formatDateToMyanmarNumbers')) {
    function formatDateToMyanmarNumbers($date)
    {
        if (!$date) {
            return '-';
        }

        // Extract only the date part
        preg_match('/\d{1,2}-\d{1,2}-\d{4}|\d{4}-\d{2}-\d{2}/', $date, $matches);

        if (!isset($matches[0])) {
            return $date; // If no valid date found, return original value
        }

        $extractedDate = $matches[0];

        // Convert to d-m-Y format
        $formattedDate = \Carbon\Carbon::parse($extractedDate)->format('d-m-Y');

        // Remove leading zeros (convert "01-02-2020" to "1-2-2020")
        $formattedDate = preg_replace('/\b0(\d)/', '$1', $formattedDate);

        // Convert English numbers to Myanmar numbers
        $formattedDateMyanmar = engToMyanmarNumber($formattedDate);

        // Replace only the extracted date inside the original text
        return str_replace($extractedDate, $formattedDateMyanmar, $date);
    }
}


