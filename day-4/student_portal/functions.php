<?php

function studentCard($name,$course)
{
    $id = rand(1000,9999);

    echo "
    <div class='card'>
        <h2>".strtoupper($name)."</h2>
        <p>Course : ".ucfirst($course)."</p>
        <p>Student ID : $id</p>
    </div>
    ";
}

?>