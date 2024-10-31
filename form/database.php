<?php
    $host_db = "localhost";
    $username_db = "root";
    $password_db = "";
    $name_db = "form_db";

    try {
        $conn = mysqli_connect($host_db, $username_db, $password_db, $name_db);
    } catch (mysqli_sql_exception) {
        echo"Database not connected!";
    }
?>