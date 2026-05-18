<?php

include 'config.php';

// Query
$sql = "SELECT * FROM student";

// Execute query
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>

    <style>

        body{
            font-family: Arial;
            background: whitesmoke;
            padding: 20px;
        }

        h2{
            text-align: center;
            color: red;
        }

        .add-btn{
            display: block;
            width: 150px;
            margin: 20px auto;
            text-align: center;
            background: green;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        table{
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }

        th{
            background: #007bff;
            color: white;
            padding: 12px;
        }

        td{
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        tr:nth-child(even){
            background: #f2f2f2;
        }

        .edit-btn{
            background: orange;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-btn{
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>

</head>

<body>

<h2>Student Data</h2>

<a href="student.php" class="add-btn">Add Student</a>

<table>

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>STD</th>
        <th>City</th>
        <th>Roll_no</th>
        <th>Action</th>
    </tr>

<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

    <tr>
        <td><?php echo $row['student_id']; ?></td>
        <td><?php echo $row['student_name']; ?></td>
        <td><?php echo $row['student_age']; ?></td>
        <td><?php echo $row['student_std']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['student_roll_number']; ?></td>

        <td>
            <a href="edit.php?id=<?php echo $row['student_id']; ?>" class="edit-btn">Edit</a>

            <a href="delete.php?id=<?php echo $row['student_id']; ?>" class="delete-btn">Delete</a>
        </td>
    </tr>

<?php

    }

}else{

    echo "<tr><td colspan='7'>No Data Found</td></tr>";
}

?>

</table>

</body>
</html>
