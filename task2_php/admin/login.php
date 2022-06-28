<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js" integrity="sha512-Hqe3s+yLpqaBbXM6VA0cnj/T56ii5YjNrMT9v+us11Q81L0wzUG0jEMNECtugqNu2Uq5MSttCg0p4KK0kCPVaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/login_css.css" />

    
</head>
<body id="myDiv" style="background-color:antiquewhite;">   
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>|
      <a class="inactive underlineHover"href="../index.php" style="color: black;">Home</a>
    <div id="msg">
      <?php
    if (isset($_GET['msg'])) {
      # code...
      $msg = $_GET['msg'];
    ?>
      <h6 style="color:red;text-align: center;"><?php echo "<p>('$msg')</p>"; ?></h6>
    <?php
    } else {
      $msg = "";
    }
    ?>
    </div>
      <form name="register" action="checklogin.php" method="POST">
        <input type="text" id="email" class="fadeIn second" name="txtemail" placeholder="email">
        <input type="password" id="password" class="fadeIn third" name="txtpassword" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
      <!-- Remind Passowrd -->
      <div id="formFooter">
          <a class="" href="forgot_pass.php">Forgot Password</a> | 
          <a class="" href="user_regi.php">New Registration?</a>

      </div>

    </div>
  </div>
  <script>
        $("document").ready(function(){
    setTimeout(function(){
       $("#msg").remove();
    }, 2000 ); // 2 secs

});
</script>
</body>
</html>