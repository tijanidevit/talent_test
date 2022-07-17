<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Test 1</title>
</head>
<body>

    <h2>Test 1</h2>
    <h4>The correct options are:</h4>
    <p>1. SELECT DISTINCT salary FROM emp ORDER BY salary DESC OFFSET 1 LIMIT 1;</p>
    
    <p>2. SELECT MAX(salary) FROM emp WHERE salary < (SELECT MAX(salary) FROM emp);</p>
            
    <p>3. SELECT salary FROM (SELECT DISTINCT salary FROM emp ORDER BY salary DESC LIMIT 2) AS emp ORDER BY salary LIMIT 1;</p>


    <h2>Test 2</h2>
    <p>SELECT country,yr FROM games JOIN city ON city.name = games.city</p>
    <small>Please note: yr was also selected because the question says "Select the country where the games took place each year.", so we can map year with country</small>


    <h2>Test 3 - LEFT JOIN</h2>
    <p>SELECT country,yr FROM games LEFT JOIN city ON city.name = games.city</p>
    <small><strong>Left Join will fetch the records from the left table (games) and the matching records on the right table (city). If there is no matching records on the right table (city), it returns the records on the left table only. It can be expressed in set as <em>A u (AnB)</em>; A union (A intersects B)</strong></small>

    <h2>Test 3 - RIGTH JOIN</h2>
    <p>SELECT country,yr FROM games RIGTH JOIN city ON city.name = games.city</p>
    <small><strong>Right Join will fetch the records from the right table (city) and the matching records on the left table (games). If there is no matching records on the left table (games), it returns the records on the right table only. It can be expressed in set as <em>B u (AnB)</em>; A union (A intersects B)</strong></small>


    <h2>Test 4 - Session</h2>
    <p>SELECT userid, FLOOR (avg(duration)) AS AverageDuration FROM sessions GROUP BY userid HAVING COUNT(userid) > 1;</p>
    
                         
</body>
</html>