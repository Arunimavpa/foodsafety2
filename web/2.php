<?php
$conn=mysqli_connect("localhost","root","");
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_erorr);
}
echo"****";

$sql="CREATE DATABASE ttt";
if($conn->query($sql)===TRUE)
{
    echo"success";

}
else{
    echo"error:".$conn->error;
}
?>