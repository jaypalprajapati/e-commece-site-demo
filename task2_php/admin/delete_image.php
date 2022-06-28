
<?php
session_start();
include "connection.php";

$id = $_GET['id'];
$selecti = "select * from product where id='$id'";

$datai = mysqli_query($conn, $selecti);
// echo  $datai;
// exit;
$total = mysqli_num_rows($datai);

$row = mysqli_fetch_assoc($datai);

unlink("../uploads/" . $row['images']);
header("location:editproduct.php?id=$id");
?>