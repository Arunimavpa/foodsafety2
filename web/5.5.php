<html>
<head>
</head>
<body>
<center>
<h1> REGISTRARTION FORM</h1>
<form action="#" method="POST">
PRN <input type="text" name="r"> <br><br><br>
BATCH YEAR <input type="text" name="b"> <br><br><br>
USERNAME<input type="text" name="u"> <br><br><br>
PASSWORD<input type="password" name="p"> <br><br><br>
<input type="submit" name="btn" value="ok">
</form>
<?php
if(isset($_POST['btn']))
{

$conn=mysqli_connect("localhost","root","","ttt");
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_erorr);
}

$id=$_POST['r'];
$batch=$_POST['b'];
$user=$_POST['u'];
$password=$_POST['p'];

$sql=" INSERT INTO register(reg_id,batch,username,password)VALUES('$id','$batch','$user','$password')";
if(mysqli_query($conn,$sql))
{
echo"sucess";
}
else
{
echo"error:".$sql."<br>" .mysqli_error($conn);
}
}
?>
</center>
</body>
</html>
