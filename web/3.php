<?php
$db="ttt";
$conn=mysqli_connect("localhost","root","","ttt");
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_error);
}
echo"*********";
mysqli_select_db($conn,$db);
$conn->close();
?>