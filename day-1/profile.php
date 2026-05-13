<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile Page</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #dbeafe;
            margin: 0;
            padding: 20px;
        }

        .container{
            width: 70%;
            margin: auto;
        }

        .box{
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            color: #222;
        }

        /* Different Background Colors */
        .intro{
            background-color: #93c5fd;
        }

        .info{
            background-color: #86efac;
        }

        .datetime{
            background-color: #fde68a;
        }

        .skills{
            background-color: #f9a8d4;
        }

        h1,h2{
            margin-top: 0;
        }

        ul{
            padding-left: 20px;
        }

        footer{
            text-align: center;
            background-color: #1e293b;
            color: white;
            padding: 12px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<?php

$name = "Aashish";
$city = "Anand";
$hobby = "watching series";

// Date & Time
$date = date('D, d M Y');
$time = date('h:i A');

// Greeting
$hour = date('H');

if($hour < 12){
    $greeting = "Good Morning";
}
elseif($hour < 17){
    $greeting = "Good Afternoon";
}
else{
    $greeting = "Good Evening";
}

// Sunday Message
if(date('l') == "Sunday"){
    $message = "Enjoy your weekend";
}
else{
    $message = "do hardwork and enjoy your day";
}

?>

<div class="container">

    <!-- Intro Section -->
    <div class="box intro">
        <h1><?php echo $greeting; ?>, <?php echo $name; ?>!</h1>
        <p>Welcome to my personal profile page.</p>
    </div>

    <!-- Personal Info -->
    <div class="box info">
        <h2>Personal Information</h2>
        <p><b>Name:</b> <?php echo $name; ?></p>
        <p><b>City:</b> <?php echo $city; ?></p>
        <p><b>Hobby:</b> <?php echo $hobby; ?></p>
    </div>

    <!-- Date Time -->
    <div class="box datetime">
        <h2>Date & Time</h2>
        <p><b>Date:</b> <?php echo $date; ?></p>
        <p><b>Time:</b> <?php echo $time; ?></p>
        <p><?php echo $message; ?></p>
    </div>

    <!-- Skills -->
    <div class="box skills">
        <h2>Skills to Learn This Month</h2>
        <ul>
            <li>PHP</li>
            <li>JavaScript</li>
            <li>CSS</li>
            <li>MySQL</li>
            <li>Laravel</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date('Y'); ?> <?php echo $name; ?>
    </footer>

</div>

</body>
</html>