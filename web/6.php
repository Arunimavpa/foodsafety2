<?php
$conn=mysqli_connect("localhost","root","","ttt");
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_error);
}
$sql="SELECT * FROM register";
if(mysqli_query($conn,$sql))
{
echo"success";
}
else
{
echo"error:".$sql."<br>".mysqli_error($conn);
}
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo "PRN:".$row["reg_id"].
     "studentname:".$row["username"].
     "batch year:".$row["batch"]."<br>";
}
}
else
{
echo "0 results";
}
echo"****************";
mysqli_close($conn);
?>