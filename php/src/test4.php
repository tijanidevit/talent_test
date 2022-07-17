<?php

    function getSumOfDigits(int $n) : int
    {
        if ($n == 0) {
            return 0;
        }

        return ($n % 10 + getSumOfDigits($n / 10));
    }

    $num = 303;
    echo "The sum of digits $num is " .getSumOfDigits(3000000000003);
?>