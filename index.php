<?php
include('dbcon.php');

if (isset($_POST['submit'])) {

    $vname = $_POST['name'];
    $vphone = $_POST['phone'];
    $vemail = $_POST['email'];
    $vmeet = $_POST['meet'];
    $vreason = $_POST['reason'];
    $vtemp = $_POST['temp'];
    $voxygen = $_POST['oxygen'];
    $vstatus = "pending";
    // $vdate = Now();

    

    $mphone;
    if ($vmeet == "Piyush Vibhakar") {
        $mphone = "9890548465";
    }
    if ($vmeet == "Neel Shah") {
        $mphone = "7678088860";
    }
    if ($vmeet == "Gunjan Shah") {
        $mphone = "9082939164";
    }
    if ($vmeet == "HR") {
        $mphone = "9082939164";
    }

    $insersql = mysqli_query($conn, "INSERT INTO visitorsinfo(vname,phone,email,passdate,whoomtomeet,purpose,vstatus,temp,oxygen) VALUES('$vname','$vphone','$vemail',Now(),'$vmeet','$vreason','$vstatus','$vtemp','$voxygen')");

    if (!$insersql) {
        echo "Error in adding data!";
    }
    // send sms to user and then person to meet
    else {
        echo "Added";
        $msg = " Dear $vname \nWelcome to Insight Business Machines Pvt. Ltd.! ";
        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => "$msg",
            "language" => "english",
            "route" => "p",
            "numbers" => "$vphone",
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: YGcX7DQAjemprngC2WPFJZ6wxEfVhH8kRiKyaLSN5lBIo4Ouz0opFXEnlq87tUbSWIjgTyzGAcHa0B96",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        //send sms to person to meet
        else {
            $vurl = "/p@ssw0rd2008.php?vphone=$vphone&vmail=$vemail";
            $msg = "$vname wants to meet you for $vreason kindly allow him";
            $fields = array(
                "sender_id" => "FSTSMS",
                "message" => "$msg",
                "language" => "english",
                "route" => "p",
                "numbers" => "$mphone",
            );

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => array(
                    "authorization: YGcX7DQAjemprngC2WPFJZ6wxEfVhH8kRiKyaLSN5lBIo4Ouz0opFXEnlq87tUbSWIjgTyzGAcHa0B96",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
        }

        curl_close($curl);
    }
    mysqli_close($conn);
    header("location: index.php");
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor's Management </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-image">
                        <figure><img src="images/logo.png" alt="sing up image"></figure>
                       
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Visitors Form</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone animated infinite wobble zmdi-hc-fw"></i></label>
                                <input type="text" maxlength="10" name="phone" id="phone" placeholder="phone" required />
                            </div>
                            <select placeholder="Whom to Meet" name="meet" required>
                               
                                <option value="HR">HR</option>
                                <option value="Neel Shah">Neel Shah</option>
                                <option value="Piyush Vibhakar">Piyush Vibhakar</option>
                                <option value="Gunjan Shah">Gunjan Shah</option>
                            </select>
                            <br><br>
                            <div class="form-group">
                                <label for="reason"><i class="zmdi zmdi-accounts"></i></label>
                                <input type="text" name="reason" id="reason" placeholder="Reason to Meet" required />
                            </div>
                            <div class="form-group">
                                <label for="temperature"><i class="zmdi zmdi-circle"></i></label>
                                <input type="text" maxlength="2" name="temp" id="temp" placeholder="Temperature" required />
                            </div>
                            <div class="form-group">
                                <label for="oxygen"><i class="zmdi zmdi-dot-circle"></i></label>
                                <input type="text" maxlength="2" name="oxygen" id="oxygen" placeholder="Oxygen Level" required />
                            </div>



                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>