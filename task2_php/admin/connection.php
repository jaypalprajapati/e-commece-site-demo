<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="task2_php";	

$conn = mysqli_connect($servername,$username,$password);
if (!$conn) 
	{
		die("connection Failed" . mysqli_connect_error());

	}
$db = mysqli_select_db($conn,$dbname);

if ($db)
	{	 	
	 	// echo "Database Selected Sucsessfully...!";
	
	}
else
{

	 echo "Database Is Not Selected!";
}
?>
