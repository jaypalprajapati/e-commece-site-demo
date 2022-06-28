<?php
session_start();
include 'connection.php';
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];
echo "$user";
if (!$user == 1 || !$user == 2|| !$user == 3) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/Home_CSS.css" />
    <script type="text/javascript" src="../js/ajaxdelete_admin.js"></script>
</head>

<body>
<?php include 'layout.php'; ?>
<span id="txtmsg"></span>
    <div class="container">
        <div class="row" style="margin-top: 5rem;">
        <div id="msg">
        <?php
    if (isset($_GET['msg'])) {
      # code...
      $msg = $_GET['msg'];
    ?>
      <h4 style="color:red;text-align: center;"><?php echo "<p>('$msg')</p>"; ?></h4>
    <?php
    } else {
      $msg = "";
    }
    ?>
        </div>
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">

                    <?php
                    if ($user == 1) { ?>
                    <a class="btn btn-primary" href="createadmin.php"> Create New Admin</a>
                    <a class="btn btn-info" href="index.php"> Home</a>
                    <?php } ?>
                    <?php
                    if ($user == 2) { ?>
                    <a class="btn btn-info" href="index.php"> Home</a>
                    <?php } ?>

                </div>
            </div>
            <table class="table table-bordered table-striped table-responsive-stack" id="Productlist">
                <thead>
                    <center>
                        <h3>ADMIN LIST</h3>
                    </center>
                    <tr id="Productlist">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <?php
                        if ($user == 1) { ?>
                         <th>User</th>
                        <th width="280px">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                //Select only normal Admin Records from database
                $qry = "SELECT * FROM admin WHERE utype = 2 OR utype = 3 ORDER BY id DESC";
                $result = mysqli_query($conn, $qry);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                <tbody id="productbody">
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['hobbies'] ?></td>
                        <?php
                                if ($user == 1) { ?>
                                  <td><?= $row['utype'] ?></td>
                        <td><a href='editadmin.php?id=<?= $row['id'] ?>' class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="deleterow(<?= $row['id'] ?>);">Delete</button>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
                <?php }
                } ?>
            </table>
        </div>
 
</body>
</html>