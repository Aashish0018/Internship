<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result Sheet</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:30px;
        }

        h1{
            text-align:center;
            color:#222;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        th{
            background:#1e3a8a;
            color:white;
            padding:12px;
        }

        td{
            padding:10px;
            text-align:center;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f9f9f9;
        }

        .gold{
            background:#ffd700 !important;
        }

        .silver{
            background:#c0c0c0 !important;
        }

        .bronze{
            background:#cd7f32 !important;
            color:white;
        }

        .summary{
            background:#111827;
            color:white;
            font-weight:bold;
        }

        .pass{
            color:green;
            font-weight:bold;
        }

        .fail{
            color:red;
            font-weight:bold;
        }
    </style>
</head>
<body>

<h1>Student Result Sheet Generator</h1>

<?php

$students = [

    [
        "roll_no" => 101,
        "name" => "Rahul",
        "city" => "Ahmedabad",
        "php" => 88,
        "mysql" => 75,
        "html" => 90,
        "js" => 85,
        "python" => 92
    ],

    [
        "roll_no" => 102,
        "name" => "Priya",
        "city" => "Surat",
        "php" => 70,
        "mysql" => 65,
        "html" => 72,
        "js" => 68,
        "python" => 75
    ],

    [
        "roll_no" => 103,
        "name" => "Amit",
        "city" => "Vadodara",
        "php" => 45,
        "mysql" => 50,
        "html" => 40,
        "js" => 42,
        "python" => 48
    ],

    [
        "roll_no" => 104,
        "name" => "Sneha",
        "city" => "Rajkot",
        "php" => 95,
        "mysql" => 91,
        "html" => 93,
        "js" => 96,
        "python" => 94
    ],

    [
        "roll_no" => 105,
        "name" => "Karan",
        "city" => "Anand",
        "php" => 30,
        "mysql" => 35,
        "html" => 28,
        "js" => 32,
        "python" => 40
    ],

    [
        "roll_no" => 106,
        "name" => "Neha",
        "city" => "Mumbai",
        "php" => 78,
        "mysql" => 82,
        "html" => 80,
        "js" => 76,
        "python" => 84
    ],

    [
        "roll_no" => 107,
        "name" => "Vikas",
        "city" => "Delhi",
        "php" => 60,
        "mysql" => 58,
        "html" => 62,
        "js" => 64,
        "python" => 66
    ],

    [
        "roll_no" => 108,
        "name" => "Pooja",
        "city" => "Pune",
        "php" => 85,
        "mysql" => 89,
        "html" => 87,
        "js" => 90,
        "python" => 88
    ]

];

$percentages = [];
$totals = [];

/* CALCULATIONS */

foreach($students as $key => $student){

    $total = $student['php'] +
             $student['mysql'] +
             $student['html'] +
             $student['js'] +
             $student['python'];

    $percentage = $total / 5;

    // Grade using elseif
    if($percentage >= 90){
        $grade = "A+";
    }
    elseif($percentage >= 75){
        $grade = "A";
    }
    elseif($percentage >= 60){
        $grade = "B";
    }
    elseif($percentage >= 40){
        $grade = "C";
    }
    else{
        $grade = "F";
    }

    $students[$key]['total'] = $total;
    $students[$key]['percentage'] = $percentage;
    $students[$key]['grade'] = $grade;

    $percentages[] = $percentage;
    $totals[] = $total;
}

/* SORT BY PERCENTAGE DESC */

usort($students, function($a, $b){
    return $b['percentage'] <=> $a['percentage'];
});

/* SUMMARY */

$classAverage = array_sum($percentages) / count($percentages);
$highestScore = max($totals);
$lowestScore = min($totals);

?>

<table>

    <tr>
        <th>Rank</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>City</th>
        <th>PHP</th>
        <th>MySQL</th>
        <th>HTML</th>
        <th>JS</th>
        <th>Python</th>
        <th>Total</th>
        <th>Percentage</th>
        <th>Grade</th>
        <th>Status</th>
    </tr>

<?php

$rank = 1;

foreach($students as $student){

    // BONUS FILTER
    if($student['percentage'] < 40){
        continue;
    }

    $class = "";

    if($rank == 1){
        $class = "gold";
    }
    elseif($rank == 2){
        $class = "silver";
    }
    elseif($rank == 3){
        $class = "bronze";
    }

?>

<tr class="<?php echo $class; ?>">

    <td><?php echo $rank; ?></td>

    <td><?php echo $student['roll_no']; ?></td>

    <td><?php echo $student['name']; ?></td>

    <td><?php echo $student['city']; ?></td>

    <td><?php echo $student['php']; ?></td>

    <td><?php echo $student['mysql']; ?></td>

    <td><?php echo $student['html']; ?></td>

    <td><?php echo $student['js']; ?></td>

    <td><?php echo $student['python']; ?></td>

    <td><?php echo $student['total']; ?></td>

    <td><?php echo number_format($student['percentage'],2)." %"; ?></td>

    <td><?php echo $student['grade']; ?></td>

    <td>
        <?php
            if($student['percentage'] >= 40){
                echo "<span class='pass'>PASS</span>";
            }
            else{
                echo "<span class='fail'>FAIL</span>";
            }
        ?>
    </td>

</tr>

<?php

$rank++;

}

?>

<tr class="summary">
    <td colspan="9">SUMMARY</td>

    <td>Highest: <?php echo $highestScore; ?></td>

    <td>Average: <?php echo number_format($classAverage,2)." %"; ?></td>

    <td colspan="2">Lowest: <?php echo $lowestScore; ?></td>
</tr>

</table>

</body>
</html>