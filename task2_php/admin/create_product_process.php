<?php
session_start();
include 'connection.php';
if (isset($_POST) && count($_POST) > 0) {

    $name = $_POST["name"];
    $category_id = $_POST["category_id"];
    $createdbyuser = $_SESSION['user_id1'];
   
    $active = $_POST["active"];
    $image = $_FILES["image"]["name"];
    $randname=rand(). $image;

    if ($name != ""  && $category_id != "" && $active != "" && $image != "") {

        $target_dir = "../uploads/";
        $target_file = $target_dir . $randname;
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large." . "<br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($filetype != "png" && $filetype != "jpeg" && $filetype != "jpg") {
            echo "Sorry, only PNG, JPEG and JPG files are allowed." . "<br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there xwas an error uploading your file." . "<br>";
            }
        }
        if ($name != "" && $category_id != "" && $image != "" && $createdbyuser != "" && $active != "") {
            $qry = "INSERT INTO product VALUES (NULL,'$name','$category_id','$randname','$createdbyuser','$active')";
            if (mysqli_query($conn, $qry)) {
                header("Location:index.php?msg=Product Created successfully");
            } else {
                echo "ERROR: Sorry $qry. " . mysqli_error($conn);
            }
            mysqli_close($conn);
        } 
    } else {
        echo("Please input all Required fields..!!");
    }
}
?>