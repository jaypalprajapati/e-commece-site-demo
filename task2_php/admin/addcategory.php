<?php

session_start();
include 'connection.php';
@$email=$_SESSION['email1'];
$user=$_SESSION['user1'];
echo "$user";
if (!$user == 1 || !$user == 2) {
    header("Location:login.php");
} 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add New Category</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/category_validations.js"></script>
</head>

<body>
<?php include 'layout.php'; ?>
    <div class="container">
    <div class="pull-right">
    <a class="btn btn-primary" href="index.php"> Back</a>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                </div>
            </div>
        </div>
        <form name="category" action="create_category_process.php" method="POST">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h3>Add Category</h3>
                        <strong>Category Name:</strong>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Enter Category Name" required autofocus>
                        <span class="text-danger" id="cnameval"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Active</strong>
                        <select name="active" id="active" class="form-control">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <span class="text-danger" id="activeval"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="button" id="Btnsubmit" name="btnsubmit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>