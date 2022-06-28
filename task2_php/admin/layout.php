<?php @$id = $_SESSION['user_id1'];
echo "$id"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../css/product_CSS.css" />

<nav class="navbar navbar-inverse" style="background-color:navy !important;">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav" style="float:right;">
            <?php
            if (!empty($email)) {
            ?>
                <li style="color:aliceblue; text-align:left;"> <?php echo "$email"; ?> </li>
            <?php
            } else {
            ?>
            <?php
            }
            ?>
            <?php
            if ($user == "1" || $user == "2") { ?>
                <li><a href="adminlist.php">Admin</a></li>
                <li><a href="categorylist.php">Category</a></li>
                <li><a href="index.php">Product</a></li>
                <li><a href="profile.php">Profile</a></li>
                 <?php 
                } else {
                     ?>
                      <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
            <?php } ?>

            <?php
            if (!empty($email)) {
            ?>
                <li> <a href="logout.php" class="" onClick="return confirm('Are You Sure You Want to logout?');" title="<?php echo "$email" ?>">Logout</a></li>
            <?php
            } else {
            ?>
                <li> <? echo "$email"; ?> <a href="login.php" class="btn btn-primary">Login</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
<script>
        $("document").ready(function(){
    setTimeout(function(){
       $("#msg").remove();
    }, 3000 ); // 2 secs

});
</script>