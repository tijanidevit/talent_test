<?php
    
    function numberToWord(int $num) : string
    {
        $res = ['zero','one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventy', 'eighteen', 'nineteen','twenty','twenty one' ,'twenty two','twenty three','twenty four','twenty five','twenty six','twenty seven','twenty eight','twenty nine' ];
        return $res[$num];
    }
    function getTimeInText(int $h, int $m) : string{
        //This assumes the constraints are meant, no test was done for hour and minutes constraints
        if ($m > 30) {
            $h += 1;
        }
        $hour = numberToWord($h);
        if ($m == 0) {
            return ucfirst("$hour o'clock"); 
        }
        
        if ($m == 15) {
            return ucfirst("Quater past $hour"); 
        }

        if ($m == 30) {
            return ucfirst("Half past $hour"); 
        }

        if ($m == 45) {
            return ucfirst("Quater to $hour"); 
        }

        if ($m < 30 ) {
            if ($m == 1 ) {
                return ucfirst("One minute past $hour");
            }
            return ucfirst(numberToWord($m) ." minutes past $hour");             
        }

        if ($m > 30 ) {
            $time_diff = 60 -$m; 
            if ($time_diff == 1 ) {
                return ucfirst("One minute to $hour");
            }
            return ucfirst(numberToWord($time_diff) ." minutes to $hour");             
        }

    }
    echo getTimeInText(1,34);

    //Uncomment the for loop below to test for full minutes in an hour
    // for ($i = 0; $i <= 60 ; $i++){
    //     echo getTimeInText(1,$i) .'<br />';
    // }
?>