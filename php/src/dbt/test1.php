<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Test 1</title>
</head>
<body>
    <h4>The correct options are:</h4>
        <p>1. SELECT DISTINCT salary FROM emp ORDER BY salary DESC OFFSET 1 LIMIT 1;</p>
        
        <p>2. SELECT MAX(salary) FROM emp WHERE salary < (SELECT MAX(salary) FROM emp);</p>
                
        <p>3. SELECT salary FROM (SELECT DISTINCT salary FROM emp ORDER BY salary DESC LIMIT 2) AS emp ORDER BY salary LIMIT 1;</p>
                         
</body>
</html>