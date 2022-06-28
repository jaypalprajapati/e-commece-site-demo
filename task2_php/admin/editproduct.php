<?php
session_start();
include 'connection.php';
$id = $_REQUEST['id'];
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];
// echo "$user";
if (!$user == "1" || !$user == "2"|| !$user == "3") {
    header("Location:login.php");
}
include 'edit_product_process.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
        

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>

    <br>
    <div class="container">
        <div class="pull-right">
            <a class="btn btn-primary" href="index.php"> Back</a>
        </div>
        <span id="txtmsg"></span>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $qry = "SELECT * from product where id='$id'";
            $result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h2>Edit Product</h2>
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="<?= $row['p_name'] ?>" required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category </strong>
                                <select name="category_id" id="category_id" class="form-control">
                                    <?php

                                    $qry1 = "SELECT * FROM category";
                                    $rs1 = mysqli_query($conn, $qry1);
                                    if (mysqli_num_rows($rs1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($rs1)) { ?>
                                         <option value="">Select</option>
                                            <option value="<?php echo $row1['id'] ?>" <?php if ($row['category_id'] == $row1['id']) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                <?php echo $row1['cname'] ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                                <span class="text-danger" id="category_id"></span>
                            </div>
                        </div>
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Created By UserId:</strong>
                                <span>
                                    </? $email ?>
                                </span>
                            </div>
                        </div> -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Active</strong>
                                <select name="active" id="active" class="form-control">
                                    <option value=""  >Select</option>
                                    <option value="Yes" <?php if ($row['active'] == "Yes") {
                                                            echo "selected";
                                                        } ?>>Yes</option>
                                    <option value="No" <?php if ($row['active'] == "No") {
                                                            echo "selected";
                                                        } ?>>No</option>
                                </select>
                                <small id="activeval" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                           
                            <div class="form-group" >
                                <strong>Product Image:</strong>
                                <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
                           <a  href="delete_image.php?id=<?= $row['id'] ?>" class="btn-close" style=" float:right; "title="Delete Image" > </a>

                            <!-- <img src="../uploads/</?php echo $row['images']; ?>" width="160" height="180" class="form-control"><i class="fa fa-trash"  onclick="deleterow(</?= $row['id'] ?>);" aria-hidden="true"></i> -->
                            <img  src="../uploads/<?php echo $row['images']; ?>" width="180" height="180" class="form-control" alt="Please select image" >
                           
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Select Image:</strong>
                                <input type="file" id="image" name="image" class="form-control">
                                <span style="color:red;">Only PNG, JPEG and JPG files are allowed</span>
                                <!-- <span class="text-danger" id="imageval"></?php echo $row['images']; ?></span> -->
                            </div>
                        </div>
                        </div>
                <?php
                }
            } else {
                echo "Error";
            }
                ?>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <script>
    function deleterow(str) {
    if (confirm('Are you sure want to delete?')) {
        if (str.length == 0) {
            document.getElementById("txtmsg").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        document.getElementById("txtmsg").innerHTML = "Image deleted successfully";
                        setInterval('window.location.reload()', 100);
                    } else {
                        document.getElementById("txtmsg").innerHTML = this.responseText;
                    }
                }
            }
        };
        xmlhttp.open("GET", "delete_image.php?id=" + str, true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>