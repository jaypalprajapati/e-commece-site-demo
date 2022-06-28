<?php
session_start();
include 'connection.php';
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];
echo "$user";
if (!$user == "1" || !$user == "2") {
    header("Location:login.php");
}
include 'edit_category_process.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="pull-right">
    <a class="btn btn-primary" href="index.php"> Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
            </div>
        </div>
        <form action="" method="POST">
            <?php
            $qry = "select * from category where id='$id'";
            $result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h3>Edit Category</h3>
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="cname" class="form-control" placeholder="Enter Category Name" value="<?= $row['cname'] ?>" required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <b>Active</b>
                            <div class="form-group">
                                <select name="active" id="active" class="form-control">
                                    <option value="" disabled>Active</option>Select Option</option>
                                    <option value="Yes" <?php if ($row['active'] == "Yes") {echo "selected"; } ?>>Yes</option>
                                    <option value="No" <?php if ($row['active'] == "No") {echo "selected"; } ?>>No</option>
                                </select>
                            </div>
                            <small id="activeval" class="text-danger"></small>
                        </div>
                            <?php
                            }
                        } else {
                            echo "* No Records Found.. * ";
                        } ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>
                </div>
           </div>
        </form>
    </div>
</body>

</html>