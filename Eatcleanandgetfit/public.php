<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
<?php
include 'commonbase.html';
include 'connection.php';
?>
<style>
    th,
    td {
        padding: 10px;
    }
</style>


<body style="background-image: url('images/back.jpg');background-size:cover;background-repeat:no-repeat;">
       
<center>
    <div style="margin: 50px;">
   
        <h2 style="margin: 10px;">Public user</h2>
        <hr>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name" pattern="[a-zA-Z ]+" required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea class="form-control" name="address" required></textarea></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" class="form-control" name="contact" pattern="[6789][0-9]{9}" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" class="btn btn-danger" style="color: white; width:400px;" value="Register"></td>
                </tr>
            </table>
        </form>
    </div>
</center>
</body>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "select count(*) from tbllogin where lcase(username)='$email'";
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_array($res);
    if ($row[0] > 0) {
        echo '<script>alert("Email already exist");</script>';
    } else {
        $qry = "insert into tblpublic(pName,pAddress,pEmail,pContact) values('$name','$address','$email','$contact')";
        $res = mysqli_query($conn, $qry);
        if ($res) {
            $qry = "insert into tbllogin (username,password,usertype,status) values('$email','$password','public','1')";
            $res = mysqli_query($conn, $qry);
            if ($res) {
                echo '<script>alert("Registered successfully");</script>';
            } else {
                echo '<script>alert("Sorry some error occured");</script>';
            }
        } else {
            echo '<script>alert("Sorry some error occured");</script>';
        }
    }
}
?>
