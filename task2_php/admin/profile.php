<?php
session_start();
include 'connection.php';
@$email = $_SESSION['email1'];
@$user = $_SESSION['user1'];
@$id = $_SESSION['user_id1'];
echo "$user";


?>
<!DOCTYPE html>
<html>

<head>
    <title> Show Personal Information</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <!-- Jquery Validation Extermal Link  -->
  <style> 
label,span{font-size:20px;padding-left:50px;}
  </style>
</head>
<body>
<?php include 'layout.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                 <a href="#" class="btn btn-primary"onclick="history.back();">Back</a>                
            </div>
            </div>
        </div>
        <form action="" method="POST">
            <?php
            $qry = "select * from admin where id='$id'";
            $result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="row">
                        <hr>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <center>
                                <h2>Show Personal Information</h2>
                            </center>
                           <hr>
                      <label class="control-label">Name    :  </label>  <span style=""><?= $row['name'] ?></span><br>
                      <label class="control-label">Email   :  </label>  <span><?= $row['email'] ?></span><br>
                      <label class="control-label">Gender  :  </label>  <span><?= $row['gender'] ?></span><br>
                      <label class="control-label">Hobbies :  </label>  <span><?= $row['hobbies'] ?></span>
                       
                        <?php
                        }
                    } else {
                        echo "Sorry...No Records Found...!";
                    }
                  ?>
               
                </div>
               
    </div>
</body>
</html>