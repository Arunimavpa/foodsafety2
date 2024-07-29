<?php
$conn=mysqli_connect("localhost","root","","ttt");
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_erorr);
}
echo"****";
$sql= "CREATE TABLE register(reg_id INT NOT NULL,batch VARCHAR(20) NOT NULL,username VARCHAR(20) NOT NULL,password VARCHAR(20) NOT NULL,primary key(reg_id))";
if(mysqli_query($conn,$sql))
{
echo"******";
}
else
{
echo"error :".mysqli_error($conn);
}
?>
