<?php

    if (isset($_POST['h'])) {
        
        $h = $_POST['h'];
        $m = $_POST['m'];
        
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
            if ($m == 0 || $m == 60) {
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

            if ($m > 30 && $m <60) {
                $time_diff = 60 -$m; 
                if ($time_diff == 1 ) {
                    return ucfirst("One minute to $hour");
                }
                return ucfirst(numberToWord($time_diff) ." minutes to $hour");             
            }
            return "Error in input";
        }
        
        $output = getTimeInText($h,$m);
    }

    
    function getOldValue(string $key) : void
    {
        if (isset($_POST[$key])) {
            echo $_POST[$key];
        } else {
           echo "";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 1</title>
</head>
<body>
    <h2>Numeric time to words</h2>
    <form action="" method="post">
        <div>
            <label for="hour">Hour</label>
            <input type="number" value="<?php getOldValue('h') ?>" required min="1" max="12" name="h" id="hour">
        </div>
        <div>
            <label for="minutes">Minutes</label>
            <input type="number" value="<?php getOldValue('m') ?>" required min="0" max="60" name="m" id="minutes">
        </div>
        <div>
            <button>Submit</button>
        </div>
        <?php if (isset($output)): ?>
            <br>
            <div>The time in text is: <?php echo $output ?></div>
        <?php endif ?>
    </form>

</body>
</html>