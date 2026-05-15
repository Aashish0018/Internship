<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>

    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f4f4f4;
        }

        header{
            background:#2c3e50;
            padding:15px;
        }

        nav a{
            color:white;
            text-decoration:none;
            margin:10px;
            padding:8px 15px;
            border-radius:5px;
        }

        .active{
            background:orange;
        }

        .container{
            width:90%;
            margin:auto;
            padding:20px;
        }

        .card{
            background:white;
            padding:15px;
            margin:15px 0;
            border-radius:10px;
            box-shadow:0 0 5px gray;
        }

        footer{
            background:#222;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:20px;
        }
    </style>
</head>

<body>

<header>
    <nav>
        <a href="index.php"
        class="<?php echo basename($_SERVER['PHP_SELF'])=='index.php' ? 'active' : ''; ?>">
        Home</a>

        <a href="students.php"
        class="<?php echo basename($_SERVER['PHP_SELF'])=='students.php' ? 'active' : ''; ?>">
        Students</a>

        <a href="courses.php"
        class="<?php echo basename($_SERVER['PHP_SELF'])=='courses.php' ? 'active' : ''; ?>">
        Courses</a>

        <a href="contact.php"
        class="<?php echo basename($_SERVER['PHP_SELF'])=='contact.php' ? 'active' : ''; ?>">
        Contact</a>
    </nav>
</header>

<div class="container">