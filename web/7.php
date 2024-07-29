<html>
<head>
</head>
<body>
<center>
<form action="#" method="POST">
<input type="text" name="name" placeholder="enter PRN">

<br><br>
<input type="submit" name="submit" value="ok">
</form>
</center>
</body>

<?php
if(isset($_POST["submit"]))
{
$conn=mysqli_connect("localhost","root","","ttt");

if($conn->connect_error)
{
    die("connection failed:".$conn->connect_erorr);
}
$reg_id=$_REQUEST['name'];
$sql="select reg_id,batch,username from register where reg_id LIKE'%$reg_id%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo"data found";
}
else
{
echo"not";
}
}
?>
</body>
</html>
