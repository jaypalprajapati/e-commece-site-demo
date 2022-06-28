<?php
include 'connection.php';
$id = $_GET['id'];
if (isset($_REQUEST['edit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    // $password = md5($_POST["password"]);
    $gender = $_POST["gender"];
    $utype = $_POST["user"];
    $hobbies = implode(',', $_POST["checkbox"]);

    if ($name != ""  && $email != ""  && $gender != "" && $hobbies != "") {

        $qry = "UPDATE `admin` SET `name`='$name',`email`='$email',`gender`='$gender',`hobbies`='$hobbies',`utype`='$utype' WHERE `id`='$id'";
        $rs = $conn->query($qry);

        if ($rs == TRUE) {
            header("Location:adminlist.php?msg=Admin updated successfully");
        } else {
            echo "Error:" . $edit . "<br>" . $conn->error;
        }
    } else {
        echo("Please input all Required fields..!!");
    }
}
?>