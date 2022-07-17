<?php
    
    if (isset($_POST['n'])) {
            
        $n = $_POST['n'];
        function getSumOfDigits(int $n) : int
        {
            if ($n == 0) {
                return 0;
            }

            return ($n % 10 + getSumOfDigits($n / 10));
        }

            
        $output = "The sum of digits $n is " .getSumOfDigits($n);
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
    <title>Test 2 - Sum of Digits</title>
</head>
<body>
    <h2>Sum of Digits</h2>
    <form action="" method="post">
        <div>
            <label for="n">Enter a number greater than 10</label>
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