<?php

namespace App\Helpers;

use NumberToWords\NumberToWords;

class NumberHelper
{
    public static function convertToWords($number)
    {
        // Handle special cases like 0
        if ($number == 0) {
            return 'Zero BDT Only';
        }

        // Handle number in crore and lakh format
        $words = self::convertToIndianNumbering($number);

        // Capitalize the first letter and append "BDT Only"
        return ucfirst($words) . ' BDT Only';
    }

    private static function convertToIndianNumbering($number)
    {
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');

        // Define thresholds for crore (1 crore = 10 million) and lakh (1 lakh = 100 thousand)
        $croreThreshold = 10000000;  // 1 Crore = 10 million
        $lakhThreshold = 100000;     // 1 Lakh = 100 thousand

        // Format numbers in crore and lakh system
        $croreValue = floor($number / $croreThreshold);
        $remainder = $number % $croreThreshold;

        $lakhValue = floor($remainder / $lakhThreshold);
        $remainder = $remainder % $lakhThreshold;

        // Convert the crore part
        if ($croreValue > 0) {
            $words = $numberTransformer->toWords($croreValue) . ' crore';
        } else {
            $words = '';
        }

        // Convert the lakh part
        if ($lakhValue > 0) {
            if ($words) {
                $words .= ' ';
            }
            $words .= $numberTransformer->toWords($lakhValue) . ' lac';
        }

        // Convert the remaining part (less than Lac)
        if ($remainder > 0) {
            if ($words) {
                $words .= ' ';
            }
            $words .= $numberTransformer->toWords($remainder);
        }

        // Return the formatted words
        return $words;
    }
}
