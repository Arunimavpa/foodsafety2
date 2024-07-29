<?php
session_start();
include 'userbase.html';
include '../connection.php';
$id=$_REQUEST['id'];
?>
<style>
    th,
    td {
        padding: 10px;
    }

    th {
        background-color: brown;
        color: white;
    }
    table{
        width:1050px;
    }
</style>
<center>

    <div style="margin: 50px;">
        <hr>
        <h2 style="margin: 10px;">Inspection Details</h2>
        <hr>

        <?php

            $sql = "SELECT * FROM `tblinspection` i,`tblresponse` r WHERE i.`iId`=r.`inspId` AND i.`rId`='$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
        <table border="0" id="tb" >
          
            <tr>
                <th>ID</th>
                <th>Date of Inspection</th>
                <th>Inspection Request</th>
                <th>Report</th>
                <th>Rating</th>
            </tr>
            <?php
            while($row=mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['inspId'];?></td>
                <td><?php echo $row['inspDate'];?></td>
                <td><?php echo $row['inspRequest'];?></td>
                <td><?php echo $row['report'];?></td>
                <td><?php echo $row['rating'];?></td>
            </tr>
       <?php
             }
            }
           ?>
        </table>

    </div>
</center>
