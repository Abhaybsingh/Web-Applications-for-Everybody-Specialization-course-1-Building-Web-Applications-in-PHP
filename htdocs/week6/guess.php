<html>
<head>
    <title>Abhay Singh 1521012e</title>
</head>
<body>
    <h1> Welcome to my guessing game</h1>

    <?php
        $correctnumber=33;
        $value = $_GET['guess'];
    
        if (isset($value)){
            if (is_numeric($value)===FALSE)
            {
                echo 'Your guess is not a number';
            }
            else if ($value<$correctnumber)
            {
                echo 'Your guess is too low';
            }
            else if ($value>$correctnumber)
            {
                echo 'Your guess is too high';
            }
            else if ($value==$correctnumber)
            {
                echo 'Congratulations - You are right';
            }
        }
        else
        {
            echo 'Missing guess parameter';
        }
    ?>
</body>
</html>