<!DOCTYPE html>
<html>
<head>
    <title>Smart Fee Receipt Generator</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:linear-gradient(to right,#74ebd5,#ACB6E5);
            padding:40px;
        }

        .container{
            width:90%;
            max-width:500px;
            margin:auto;
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 0 15px gray;
        }

        h1{
            text-align:center;
            margin-bottom:20px;
            color:darkblue;
        }

        input,select{
            width:100%;
            padding:12px;
            margin-top:10px;
            margin-bottom:15px;
            border:1px solid gray;
            border-radius:8px;
            font-size:16px;
        }

        button{
            width:100%;
            padding:12px;
            background:green;
            color:white;
            border:none;
            border-radius:8px;
            font-size:18px;
            cursor:pointer;
        }

        button:hover{
            background:darkgreen;
        }

        .receipt{
            margin-top:25px;
            background:#f2f2f2;
            padding:20px;
            border-radius:10px;
        }

        .receipt h2{
            text-align:center;
            margin-bottom:15px;
            color:darkblue;
        }

        .receipt p{
            margin:8px 0;
            font-size:17px;
        }

    </style>
</head>

<body>

<div class="container">

    <h1>Fee Receipt Generator</h1>

    <form method="GET">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="text" name="roll" placeholder="Enter Roll Number" required>

        <select name="course" required>
            <option value="">Select Course</option>
            <option value="BCA">BCA</option>
            <option value="MCA">MCA</option>
            <option value="BTech">BTech</option>
            <option value="MBA">MBA</option>
        </select>

        <input type="number" name="semester" placeholder="Enter Semester" required>

        <input type="number" name="marks" placeholder="Enter Marks %" required>

        <button type="submit">Generate Receipt</button>

    </form>

<?php

if($_GET)
{
    $name = htmlspecialchars($_GET['name']);
    $roll = htmlspecialchars($_GET['roll']);
    $course = htmlspecialchars($_GET['course']);
    $semester = htmlspecialchars($_GET['semester']);
    $marks = htmlspecialchars($_GET['marks']);

    // Course Fee
    switch($course)
    {
        case "BCA":
            $fee = 25000;
            break;

        case "MCA":
            $fee = 40000;
            break;

        case "BTech":
            $fee = 55000;
            break;

        case "MBA":
            $fee = 60000;
            break;

        default:
            $fee = 0;
    }

    // Scholarship Discount
    if($marks >= 90)
    {
        $discount = 30;
    }
    elseif($marks >= 75)
    {
        $discount = 20;
    }
    elseif($marks >= 60)
    {
        $discount = 10;
    }
    else
    {
        $discount = 0;
    }

    $discountAmount = ($fee * $discount) / 100;

    // Bonus Late Fee
    $lateFee = 0;

    if($semester > 4 && $course == "MCA")
    {
        $lateFee = 2000;
    }

    $finalFee = $fee - $discountAmount + $lateFee;

?>

    <div class="receipt">

        <h2>Fee Receipt</h2>

        <p><b>Name:</b> <?php echo $name; ?></p>

        <p><b>Roll No:</b> <?php echo $roll; ?></p>

        <p><b>Course:</b> <?php echo $course; ?></p>

        <p><b>Semester:</b> <?php echo $semester; ?></p>

        <p><b>Marks:</b> <?php echo $marks; ?>%</p>

        <hr><br>

        <p><b>Base Fee:</b> ₹<?php echo $fee; ?></p>

        <p><b>Scholarship Discount:</b> <?php echo $discount; ?>%</p>

        <p><b>Discount Amount:</b> ₹<?php echo $discountAmount; ?></p>

        <p><b>Late Fee:</b> ₹<?php echo $lateFee; ?></p>

        <p><b>Final Fee Payable:</b> ₹<?php echo $finalFee; ?></p>

        <br>

        <button onclick="window.print()">Print Receipt</button>

    </div>

<?php
}
?>

</div>

</body>
</html>