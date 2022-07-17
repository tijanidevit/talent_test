<?php

    if (isset($_POST['n'])) {
            
        $n = $_POST['n'];
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
        
        

        
        $output = printStaircase($n);
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
    <title>Test 2 - Staircase</title>
</head>
<body>
    <h2>Generate Staircase</h2>
    <form action="" method="post">
        <div>
            <label for="n">Enter a number</label>
            <input type="number" value="<?php getOldValue('n') ?>" required min="1" max="100" name="n" id="n">
        </div>
        <div>
            <button>Submit</button>
        </div>
        <?php if (isset($output)): ?>
            <br>
            <div>Here is your staircase:</div>
            <div><?php echo $output ?></div>
        <?php endif ?>
    </form>

</body>
</html>