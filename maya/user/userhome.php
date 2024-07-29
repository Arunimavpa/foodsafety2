<?php
session_start();
include 'userbase.html';
include '../connection.php';

?>
<style>
    th,
    td {
        padding: 10px;
    }
    .mainCon
{
    width: 90%;
    display:flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.content{
    margin:10px;
    padding:20px;
    max-width: 20rem;
    box-shadow: 5px,5px,5px,5px;
} 
.row{
    display:flex;
    padding: 10px;
    justify-content:center;
    align-items:center;
    border-radius:25px;
}
img{
    
    height: 150px;
    width: 150px;
}

</style>
<center>
    <div style="margin: 50px;">
        <hr>
        <h2 style="margin: 10px;">Welcome <?php echo $_SESSION['name']; ?></h2>
        <hr>
        
    </div>
    <div class="container-fluid mainCon">
    <?php

    $sql="select * from tblrestaurant";
    $sq=mysqli_query($conn,$sql);
    while($q=mysqli_fetch_array($sq)){

    
?>
   <a href="restaurantdetails.php?id=<?php echo $q[0] ?>"><div class='content card'>
    <div class='row'><img src=<?php echo $q[6] ?>></div>
    <h2><?php echo $q[1] ?></h2>
    <p><?php echo $q[2] ?></p>
    <p><?php echo $q[3] ?></p>
    <p><?php echo $q[4] ?></p>
    </div></a>
    
<?php 

    }
?>    
    </div>
</center>
