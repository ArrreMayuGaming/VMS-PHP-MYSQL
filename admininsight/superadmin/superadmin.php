<?php
include('../dbcon.php');

session_start();
$msg;
$today = date("Y-m-d");
if (!$_SESSION['IS_LOGIN'] || !$_SESSION['ROLE'] == 'superadmin') {
    header("location:index.php");
    die();
} else {
    if (!$conn) {
        echo "DataBase Connection Error! Please Contact Developer Team!";
    } else {
        $selectQuery = "SELECT * FROM visitorsinfo WHERE passdate='$today' ORDER BY id DESC";
        $result = mysqli_query($conn, $selectQuery);
        if (mysqli_num_rows($result) < 0) {
            $msg = "There is no data in Database!";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,user-scalable=no">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!--download current table's data to excel-->
    <script src="../vms/js/reports.js"></script>


    <title>VMS ADMIN PANEL</title>
</head>

<body>


    <nav class="navbar navbar-expand-custom navbar-mainbg fixed-top">
        <a class="navbar-brand navbar-logo" href="#">VMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>

                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Components</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php" href="javascript:void(0) " ;"><i class="fas fa-user-alt-slash"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <!-- The sidebar -->
    <div class="sidebar">
        <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#empentry"><i class="fa fa-fw fa-wrench"></i> Daily Entry</a>
        <a href="#clients"><i class="fa fa-fw fa-user"></i> Clients</a>
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
    </div>

    <!-- Page content -->
    <div id="home">
        <div class="content">
            <br>
            <marquee behavior="scroll" direction="left">
                <h1>VMS ADMIN DASHBOARD</h1>
            </marquee>
            <?php $msg; ?>
            <button type="button" id="report" class="btn btn-outline-success btn-fw pb-sm-2" onclick="exportToExcel('reportdata', 'visitor-report')">Export Report <i class="fas fa-file-excel"></i></button>
            <br>
            <br><br>
            <div class="col-lg-11 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b><i> TODAY'S VISITOR'S DATA</i></b></h4>
                        <table id="visitortable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th><b>NAME</b></th>
                                    <th><b>E-MAIL</b></th>
                                    <th><b>PHONE</b></th>
                                    <th><b>PERSON TO MEET</b></th>
                                    <th><b>REASON</b></th>
                                    <th><b>TEMPERATURE</b></th>
                                    <th><b>OXYGEN</b></th>
                                    <th><b>STATUS</b></th>
                                    <th><b>DATE</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['vname'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['whoomtomeet'] ?></td>
                                        <td><?php echo $row['purpose'] ?></td>
                                        <td><?php echo $row['temp'] ?></td>
                                        <td><?php echo $row['oxygen'] ?></td>
                                        <td><?php echo $row['vstatus'] ?></td>
                                        <td><?php echo $row['passdate'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Employe daily entry-->
    <?php
    include('../dbcon.php');
    if (isset($_POST['empdata'])) {
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        $empname = $_POST['empname'];
        $temp = $_POST['temp'];
        $oxygen = $_POST['oxygen'];
        $added = 'ADD';

        $insersql = mysqli_query($conn, "INSERT INTO emp_attendance(empname,temp,oxygen,date,time) VALUES('$empname','$temp','$oxygen',Now(),Now())");

        if (!$insersql) {
            $added = 'Error in adding data!';
        } else {
            $added = 'DONE!';
            header("location: superadmin.php#empentry");
            $sql = "SELECT * FROM emp_attendance where date='$today'";

            $empresult = mysqli_query($conn, $sql);
        }
    }

    ?>
    <div id="empentry">
        <div class="content">
            <br>
            <marquee behavior="scroll" direction="left">
                <h1>EMPLOYEE DAILY ENTRY</h1>
            </marquee>

            <button type="button" id="report" class="btn btn-outline-success btn-fw pb-sm-2" onclick="exportToExcel('emptable', 'employee-entry-report')">Export Report <i class="fas fa-file-excel"></i></button>
            <br>
            <br><br>


            <div class="col-lg-11 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title"><b><i> MAKE A ENTRY</i></b></h4>
                        </div>
                        <div>
                            <form method="POST">
                                <div class="row">
                                    <div class="row ml-sm-2">
                                        <input placeholder="EMPLOYEE NAME" name="empname" class="form-control" type="text" id="empname" style="margin-left: 1.5em">
                                    </div>
                                    <br>
                                    <p></p>

                                    <br>
                                    <div class="row ml-sm-2">
                                        <input placeholder="TEMPERATURE" name="temp" class="form-control" type="text" id="temp" style="margin-left: 2em">
                                    </div>
                                    <br>
                                    <div class="row ml-sm-2">
                                        <input placeholder="OXYGEN" name="oxygen" class="form-control" type="text" id="oxygen" style="margin-left: 2em">
                                    </div>
                                    <div>
                                        <button type="submit" name="empdata" id="empdata" class="btn btn-outline-success btn-fw pb-sm-2" style="margin-left: 2em">ADD <i class="fas fa-user-plus"></i></button>
                                    </div>
                                    <div>
                                        <h4><?php echo $added; ?></h4>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b><i> TODAY'S VISITOR'S DATA</i></b></h4>
                        <table id="emptable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th><b>NAME</b></th>
                                    <th><b>TEMPERATURE</b></th>
                                    <th><b>OXYGEN</b></th>
                                    <th><b>DATE</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($empresult)) { ?>
                                    <tr>
                                        <td><?php echo $row['empname'] ?></td>
                                        <td><?php echo $row['temp'] ?></td>
                                        <td><?php echo $row['oxygen'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--nav animation script-->
    <script>
        // ---------Responsive-navbar-active-animation-----------
        function test() {
            var tabsNewAnim = $('#navbarSupportedContent');
            var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
            var activeItemNewAnim = tabsNewAnim.find('.active');
            var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
            var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
            var itemPosNewAnimTop = activeItemNewAnim.position();
            var itemPosNewAnimLeft = activeItemNewAnim.position();
            $(".hori-selector").css({
                "top": itemPosNewAnimTop.top + "px",
                "left": itemPosNewAnimLeft.left + "px",
                "height": activeWidthNewAnimHeight + "px",
                "width": activeWidthNewAnimWidth + "px"
            });
            $("#navbarSupportedContent").on("click", "li", function(e) {
                $('#navbarSupportedContent ul li').removeClass("active");
                $(this).addClass('active');
                var activeWidthNewAnimHeight = $(this).innerHeight();
                var activeWidthNewAnimWidth = $(this).innerWidth();
                var itemPosNewAnimTop = $(this).position();
                var itemPosNewAnimLeft = $(this).position();
                $(".hori-selector").css({
                    "top": itemPosNewAnimTop.top + "px",
                    "left": itemPosNewAnimLeft.left + "px",
                    "height": activeWidthNewAnimHeight + "px",
                    "width": activeWidthNewAnimWidth + "px"
                });
            });
        }
        $(document).ready(function() {
            setTimeout(function() {
                test();
            });
        });
        $(window).on('resize', function() {
            setTimeout(function() {
                test();
            }, 500);
        });
        $(".navbar-toggler").click(function() {
            setTimeout(function() {
                test();
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css"></script>
    <script src="../js/navbar.js"></script>
</body>

</html>