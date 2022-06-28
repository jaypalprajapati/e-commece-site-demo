<?php
include 'connection.php';
$id = $_GET['id'];

if (isset($_REQUEST['edit'])) {
    $name = $_POST["cname"];
    $active = $_POST["active"];

    if ($name != ""  && $active != "") {
        $qry = "UPDATE `category` SET `cname`='$name',`active`='$active' WHERE `id`='$id'";
        $rs = $conn->query($qry);
        if ($rs == TRUE) {
            header("Location:categorylist.php?msg=Category updated successfully");
        } else {
            echo "Error:" . $edit . "<br>" . $conn->error;
        }
    } else {
        echo ("Please input all Required fields..!!");
    }
}
