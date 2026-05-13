<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>

    <style>
        body{
            font-family: Arial;
            background: linear-gradient(to right,#74ebd5,#ACB6E5);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:350px;
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 0 15px gray;
        }

        h1{
            text-align:center;
            margin-bottom:20px;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:10px;
            border-radius:8px;
            border:1px solid gray;
        }

        button{
            width:100%;
            padding:12px;
            margin-top:15px;
            background:green;
            color:white;
            border:none;
            border-radius:8px;
            font-size:18px;
        }

        .result{
            margin-top:20px;
            background:#f2f2f2;
            padding:15px;
            border-radius:10px;
            text-align:center;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>BMI Calculator</h1>

    <form method="post">

        <input type="number" name="weight" placeholder="Weight in KG" required>

        <input type="number" name="height" placeholder="Height in CM" required>

        <button type="submit">Calculate BMI</button>

    </form>

    <?php

    if($_POST)
    {
        $weight = $_POST['weight'];
        $height = $_POST['height'] / 100;

        $bmi = $weight / ($height * $height);

        echo "<div class='result'>";
        echo "<h2>BMI: " . round($bmi,2) . "</h2>";

        if($bmi < 18.5)
        {
            echo "<h3>Underweight</h3>";
        }
        elseif($bmi < 25)
        {
            echo "<h3>Normal Weight</h3>";
        }
        elseif($bmi < 30)
        {
            echo "<h3>Overweight</h3>";
        }
        else
        {
            echo "<h3>Obese</h3>";
        }

        echo "</div>";
    }

    ?>

</div>

</body>
</html>