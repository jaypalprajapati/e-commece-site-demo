<?php
session_start();
include 'connection.php';
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];

echo "$user";
if (!$user == "1" || !$user == "2" || !$user == "3") {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/product_CSS.css" />
    <!-- <script type="text/javascript" src="js/filter_javascript.js"></script> -->
    <script type="text/javascript" src="../js/ajaxdelete_product.js"> </script>

</head>

<body>
<?php include 'layout.php'; ?>
    <div class="container">
        
        <div class="row" style="margin-top: 5rem;">
        <div id="msg">
        <?php
    if (isset($_GET['msg'])) {
      # code...
      $msg = $_GET['msg'];
    ?>
      <h3 style="color:red;text-align: center;"><?php echo "<p>('$msg')</p>"; ?></h3>
    <?php
    } else {
      $msg = "";
    }
    ?>
        </div>
            <div class="col-lg-12 margin-tb">
                <span id="txtmsg"></span>
                <div class="pull-right">
                    <?php
                    if ($user == "1" || $user == "2") { ?>
                        <a class="btn btn-success" href="addproduct.php"> Add New Product</a>
                        <a class="btn btn-primary" href="../index.php">Home</a>
                    <?php } else { ?>
                       
                    <?php } ?>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-responsive-stack" id="Productlist">
            <thead>
                <center>
                    <h2>Products</h2>
                </center>
                <tr id="Productlist">
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Add By</th>
                    <th >Active</th>
                    <?php
                    if ($user == "1" || $user == "2") { ?>
                        <th width="280px">Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <?php

            $sql = "SELECT p.id,p.p_name,c.cname,p.images,a.email,p.active FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN admin a ON p.createdbyuser = a.id where c.active= 'Yes';";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tbody id="productbody">
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['p_name'] ?></td>
                            <td><?= $row['cname'] ?> </td>
                            <td><img src="../uploads/<?php echo $row['images']; ?>" width="160" height="80"></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['active'] ?></td>
                            
                            <?php
                            if ($user == "1" || $user == "2") { ?>
                                <td><a href='editproduct.php?id=<?= $row['id'] ?>' class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" onclick="deleterow(<?= $row['id'] ?>);">Delete</button>
                                </td>
                            <?php } ?>

                        </tr>
                    </tbody>
            <?php }
            }
            ?>
        </table>
    </div>
</body>
</html>