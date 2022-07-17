<?php
    function printStaircase(int $num): string
    {
        if ($num <= 0) {
            return 'Enter a number from 1 upwards <br />';
        }
        
        $result='';
        for ($i=1; $i <= $num; $i++) { 
            for ($j=1; $j <= $i; $j++) { 
                $result .='#';
            }
            
            $result .='<br />';
        }

        return $result;
    }
    echo printStaircase(5);

?>