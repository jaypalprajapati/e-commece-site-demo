<?php
include 'connection.php';
if (isset($_POST) && count($_POST) > 0) {
    $name = $_POST["cname"];
    $active = $_POST["active"];
    if ($name != "" && $active != "") {
        
        $qry = "INSERT INTO category VALUES (NULL,'$name','$active')";
        if (mysqli_query($conn, $qry)) {
            header("Location:categorylist.php?msg=Category Created successfully");
        } else {
            echo "ERROR: Sorry $qry. " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Enter Required Fields";
    }
}
?>