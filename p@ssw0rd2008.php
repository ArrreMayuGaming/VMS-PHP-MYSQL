<?php
include('dbcon.php');

if(isset($_GET['vphone'],$_GET['vmail'] ))
{
    $phone=$_GET['vphone'];
    $email=$_GET['vmail'];
    $today = date("Y-m-d");
    $sql="SELECT * FROM visitorsinfo WHERE phone='$phone' AND email='$email' AND passdate='$today'";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo "Error";
    }
    else{
        while($row=mysqli_fetch_assoc($result)){
            echo $row['id']."\n";
            echo $row['vname']."\n";
            echo $row['phone']."\n";
            echo $row['email']."\n";
            echo $row['purpose']."\n";
            echo $row['temp']."\n";
            echo $row['oxygen']."\n";
            echo $row['oxygen']."\n";

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <input type="button">submit</input>
    
</body>
</html>