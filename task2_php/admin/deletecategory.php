<?php
include "connection.php";
$did=$_GET['id'];
  $query = "SELECT * FROM category where id = '$did'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
    if($total == 0)
    {
        echo "No Data available";
    }
    else
    {
        $qry = "DELETE FROM category WHERE id='$did'";
        if ($conn->query($qry) === TRUE) {
        echo '1';
        } else {
        echo "Error While deleting record: " . $conn->error;
        }
    }
  ?>