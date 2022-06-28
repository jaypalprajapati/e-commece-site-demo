<?php
include 'connection.php';
session_start();
//var_dump($_post);
// if(!isset($_POST["btn_sb"]))
// {
// 	header("location:login.php");
// 	exit();
// }
if (isset($_POST) && count($_POST) > 0) {

    $email = $_POST['txtemail'];
    $cpass = md5($_POST['confpassword']);
    $pass = md5($_POST['txtpassword']);

    $qry1 = "SELECT * FROM admin where email = '" . $email . "'";
    $rs1 = mysqli_query($conn, $qry1);
    if (mysqli_num_rows($rs1) > 0) {
        if ($pass == $cpass) {

            $qry = "UPDATE `admin` SET `password`='$pass' WHERE `email`='$email'";
          
            $rs = mysqli_query($conn, $qry);
            // if(mysqli_num_rows($row) > 0)
            // {
            //     $qry2 = "SELECT * FROM admin where `password` = '" . $pass . "'";
            //     $rs2 = mysqli_query($conn, $qry2);
            //     if (mysqli_num_rows($rs2) > 0) {
            //         echo "Password";
            //         exit();
            //     }
            // }
            $row = mysqli_fetch_assoc($rs);
 
            header("location:login.php");

            exit();
        } else {
            header("location:forgot_pass.php?msg=password and confirm password not match");

            exit();
        }
    }
    else{
        header("location:forgot_pass.php?msg=Email not found");
}
}
