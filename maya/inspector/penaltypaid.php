<?php
include '../connection.php';
$id=$_GET['id'];

$sql = "update tblpenalty set status='Paid' where repId='$id'";
echo $sql;
$result=mysqli_query($conn,$sql);
echo '<script>location.href="admininspector.php"</script>';
?>