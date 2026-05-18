<?php

include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM student WHERE student_id = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location: index.php");
}else{
    echo "Record not deleted";
}

?>