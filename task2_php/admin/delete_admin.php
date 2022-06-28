
<?php
session_start();
include "connection.php";
@$email=$_SESSION['email1'];
$user=$_SESSION['user1'];

if ($user == 2) {
    header("Location:login.php");
}

  $did = $_GET['id'];
  $query = "SELECT * FROM admin where id = '$did'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
if ($total == 0) {
      echo "No Data available";
  } 
  else {
    $qry = "DELETE FROM admin WHERE id='$did'";
    if ($conn->query($qry) === TRUE) {
      echo '1';
    } else {
      echo "Error deleting record: " . $conn->error;
    }
}
?>
