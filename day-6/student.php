<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $std = $_POST['std'];
    $city = $_POST['city'];
    $roll_no = $_POST['roll_no'];

    $sql = "INSERT INTO student(student_name, student_age, student_std, city, student_roll_number)
            VALUES('$name', '$age', '$std', '$city', '$roll_no')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php");
    }else{
        echo "Data not inserted";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>

    <style>

        body{
            font-family: Arial;
            background: whitesmoke;
        }

        .form-box{
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: green;
            color: white;
            border: none;
        }

    </style>

</head>

<body>

<div class="form-box">

    <h2>Add Student</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="number" name="age" placeholder="Enter Age" required>

        <input type="text" name="std" placeholder="Enter STD" required>

        <input type="text" name="city" placeholder="Enter City" required>

        <input type="text" name="roll_no" placeholder="Enter Roll Number" required>

        <button type="submit" name="submit">Submit</button>

    </form>

</div>

</body>
</html>