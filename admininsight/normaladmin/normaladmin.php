<?php
include('../vms/dbcon.php');
$msg;
$datanametoshow;
$adminname;
$today = date("Y-m-d");


$reportQuery;

if (!$conn) {
    echo "DataBase Connection Error! Please Contact Developer Team!";
} else {

    session_start();

    $adminname = $_SESSION['USERNAME'];

    $startdate = isset($_POST['startdate']);
    $end = isset($_POST['enddate']);
    if (empty($startdate) && empty($enddate)) {
        $reportQuery = "SELECT * FROM visitorsinfo WHERE whoomtomeet='$adminname' ORDER BY passdate DESC";
    } else {
        $reportQuery = "SELECT * FROM visitorsinfo WHERE whoomtomeet='$adminname' AND passdate BETWEEN '$startdate' AND '$end' ORDER BY passdate DESC";
    }
    $dataresult = mysqli_query($conn, $reportQuery);
    $row = mysqli_fetch_assoc($dataresult);
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
                    <a class="nav-link" href="#" href="javascript:void(0);"><i class="far fa-address-book"></i>Dashboard</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#about" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Reports</a>
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
                    <a class="nav-link" href="logout.php" href="javascript:void(0);"><i class="fas fa-user-alt-slash"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <!-- The sidebar -->
    <div class="sidebar">
        <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
        <a href="#clients"><i class="fa fa-fw fa-user"></i> Clients</a>
        <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <br>
        <marquee behavior="scroll" direction="left">
            <h1>ADMIN PANEL FOR <?php echo $_SESSION['USERNAME'] ?></h1>
        </marquee>

        <button type="button" class="btn btn-outline-success btn-fw pb-sm-2" style="margin-left: 1em" onclick="exportToExcel('reportdata', 'visitor-report')">Export Report <i class="fas fa-file-excel"></i></button>
        <br><br>
        <form method="POST">
            <div class="row">
                <div class="row ml-sm-2">
                    <input placeholder="Starting Date" name="startdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="startdate" style="margin-left: 1.5em" required>
                </div>
                <br>
                <p></p>

                <br>
                <div class="row ml-sm-2">
                    <input placeholder="End Date" name="enddate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="enddate" style="margin-left: 2em" required>
                </div>
                <br>
                <div>
                    <a href=""><button type="submit" name="date" id="date" class="btn btn-outline-success btn-fw pb-sm-2" style="margin-left: 2em">Search <i class="fas fa-search"></i></button></a>
                </div>
            </div>
        </form>


        <br>
        <div class="col-lg-11 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><b><i>VISITOR'S TABLE DATA</i></b></h4>

                    <table class="table table-hover">
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
                            <?php
                            while ($row = mysqli_fetch_assoc($dataresult)) { ?>
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