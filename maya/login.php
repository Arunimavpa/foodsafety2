<?php
session_start();
include 'commonbase.html';
include 'connection.php';
?>
<style>
    th,
    td {
        padding: 10px;
    }
</style>
<center>
    <div style="margin: 50px;">
        <hr>
        <h2 style="margin: 10px;">Login</h2>
        <hr>
        <form method="POST">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="pwd" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" class="btn btn-danger" style="color: white; width:400px;" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</center>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $qry = "select count(*) from tbllogin where lcase(username)='$email'";
    $res = mysqli_query($conn, $qry);
    $row = mysqli_fetch_array($res);
    if ($row[0] > 0) {
        $qry = "select * from tbllogin where lcase(username)='$email'";
        $res = mysqli_query($conn, $qry);
        $row = mysqli_fetch_array($res);
        if ($row['password'] == $pwd) {
            $_SESSION['email'] = $email;
            if ($row['status'] == '1') {
                if ($row['usertype'] == 'admin') {
                    echo '<script>location.href="admin/adminhome.php"</script>';
                } else if ($row['usertype'] == 'restaurant') {
                    $qry = "select * from tblrestaurant where rEmail='$email'";
                    $res = mysqli_query($conn, $qry);
                    $row = mysqli_fetch_array($res);
                    $_SESSION['id'] = $row['rId'];
                    $_SESSION['name'] = $row['rName'];
                    echo '<script>location.href="restaurant/restauranthome.php"</script>';
                } else if ($row['usertype'] == 'inspector') {
                    $qry = "select * from tblinspector where iEmail='$email'";
                    $res = mysqli_query($conn, $qry);
                    $row = mysqli_fetch_array($res);
                    $_SESSION['id'] = $row['iId'];
                    $_SESSION['name'] = $row['iName'];
                    echo '<script>location.href="inspector/inspectorhome.php"</script>';
                } else if ($row['usertype'] == 'public') {
                    $qry = "select * from tblpublic where pEmail='$email'";
                    $res = mysqli_query($conn, $qry);
                    $row = mysqli_fetch_array($res);
                    $_SESSION['id'] = $row['pId'];
                    $_SESSION['name'] = $row['pName'];
                    echo '<script>location.href="user/userhome.php"</script>';
                } else
                    echo $row['utype'];
            } else if($row['status'] == '-1') {
                echo '<script>alert(" Rejected ");</script>';
            }else{

                echo '<script>alert("Not Approoved");</script>';
            }
        } else {
            echo '<script>alert(" incorrect password ....");</script>';
        }
    } else {
        echo '<script>alert(" User doesnt exist ....");</script>';
    }
}
?>