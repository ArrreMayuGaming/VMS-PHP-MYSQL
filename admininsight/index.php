<?php

include('../dbcon.php');

session_start();
$error = '';
$nameinlink;
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE ausername='$username' AND apassword='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
      
        $row=mysqli_fetch_assoc($result);
        $_SESSION['ROLE']=$row['arole'];
        $_SESSION['USERNAME']=$row['aname'];
        $nameinlink=$row['aname'];
        $_SESSION['IS_LOGIN']='yes';
        echo $row['arole'];
        if($row['arole']=='superadmin')
        {
            header("location:superadmin/superadmin.php");
            die(); 
        }
        if($row['arole']=='admin')
        {
            header("location:normaladmin/normaladmin.php");
            die(); 
        }
    } else {
        $error = 'Invalid Inputs!';
    }
    mysqli_close($conn);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Insight</title>
</head>

<body>
    <br><br><br>

    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="../images/logo.png" alt="sing in image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login to IBMPL</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                        <div>
                            <h3><?php echo $error; ?></h3>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>