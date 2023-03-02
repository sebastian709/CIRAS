<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CIRAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/cardv.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="apple-touch-icon" href="https://i.pinimg.com/originals/98/a6/73/98a67354b9dd047b4aefa9ab13bc780d.png">
  <link rel="shortcut icon" href="https://i.pinimg.com/originals/98/a6/73/98a67354b9dd047b4aefa9ab13bc780d.png">

</head>

<body onload="startTime()">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu" style="background: #18233a">
            <div class="sidebar-header" style="background: #18233a">
                <div class="logo">
                    <a href="index.html"><img style="height: 80px;" src="https://i.pinimg.com/originals/98/a6/73/98a67354b9dd047b4aefa9ab13bc780d.png" alt="logo"><h5 class="text-light">CIRAS</h5></a>
                </div>
            </div>
            <div class="main-menu bg-my-secondary">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            
                            <li class="active"><a href="admin-dashboard.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pencil-alt text-light"></i> <span>Crime Information</span></a>
                                <ul class="collapse">
                                    <li><a href="admin-victimlist.php">Victim Master</a></li>
                                    <li><a href="admin-suspectlist.php">Suspect Master</a></li>
                                    <li><a href="admin-informantlist.php">Informant</a></li>
                                    <li><a href="admin-missinglist.php">Missing Master</a></li>
                                    <li><a href="admin-druglist.php">Drug related</a></li>
                                    <li><a href="admin-crimelist.php">Crime Case</a></li>
                                    
                                    
                                </ul>
                            </li>
                            

                            
                            <li><a href="admin-DOblotterbook.php"><i class="fa fa-book text-light" aria-hidden="true"></i> <span>Blotter Book</span></a></li>

                             <li><a href="admin-incident.php"><i class="fa fa-newspaper-o text-light" aria-hidden="true"></i> <span>Incident Record</span></a></li>

                            <li><a href="logout.php"><i class="fas fa-sign-out-alt text-danger"></i> <span>Sign out</span></a></li>

                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <h4>Sto.Tomas, Pampanga </h4>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <input type="text" class="btn btn-dark btn-sm font-weight-bold" id="currentDateTime" disabled="">
                            </li> 
                            <div id="txt" class="btn btn-danger btn-sm font-weight-bold" disabled pointer-events:none;></div>  
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['NAME'];?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container-fluid">
                    <?php if (isset($_GET['success'])) { ?>
                        <div class="myDiv">
                            <div class="row">
                                <div class="col mt-5">
                                    <div class="card bg-success">
                                        <h4 class="text-center text-light"><?php echo $_GET['success']; ?></h4>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    <?php } ?>
                    <div class="row">
                        <div class="col mb-2">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col">
                            <div class="card l-bg-cherry">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users-cog"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">Admin Account</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                3,243
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col">
                            <div class="card l-bg-blue-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">Desk Officer</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                15.07
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col">
                            <div class="card l-bg-green-dark">
                                <div class="card-statistic-3 p-4">
                                    <div class="card-icon card-icon-large"><i class="fas fa-user-lock"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">Investigator</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 class="d-flex align-items-center mb-0">
                                                578
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="text-center header-title">Title</h4>    
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">

                                                    </div>
                                                    <div class="col">
                                                            
                                                    </div>
                                                    <div class="col">
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <canvas id="lineChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col py-4">
                                                <div class="card py-5">
                                                    <div class="card-body py-5">
                                                        <h4 class="header-title text-center">Title</h4>
                                                        <canvas id="chDonut1"></canvas>    
                                                    </div> 
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col mt-5">
                                            <div class="card">
                                                <h2 class="text-center header-title mt-4" style="font-weight: bold;">Sto. Tomas, Pampanga</h2>
                                                <div class="card-body">
                                                    <p class="text-center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30830.707735798027!2d120.70286461899364!3d15.001669490938772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f7f7346f2e3d%3A0x47b968034fa26d9e!2sSanto%20Tomas%2C%20Pampanga!5e0!3m2!1sen!2sph!4v1622084122077!5m2!1sen!2sph" width="1000" height="600" style="border: 3px solid black;" allowfullscreen="" loading="lazy"></iframe></p>    
                                                </div>    
                                            </div>
                                        </div>  
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2021. All right reserved. Template by <a href="https://www.facebook.com/acevergel.espino">Ace Espino</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
        var today = new Date();
        var date = 'Date: '+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var dateTime = date;
          document.getElementById("currentDateTime").value = dateTime;
    </script>

    <script>
        function startTime() {
        const today = new Date();
        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = "Time: " + h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
        }

        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }
    </script>

    <script>
             $( ".myDiv" ).show( "slow").delay(3500).fadeOut('slow', function() {
          $(this).remove();
     }); 
    </script>

    <script>
        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
        labels: ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"],
        datasets: [{
        label: "Crime",
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
        'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 3
        },
        {
        label: "Not Crime",
        data: [28, 48, 40, 19, 86, 27, 90],
        backgroundColor: [
        'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
        'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 3
        }
        ]
        },
        options: {
        responsive: true
        }
        });
    </script>

    <script>
        /* chart.js chart examples */

        // chart colors
        var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

        /* 3 donut charts */
        var donutOptions = {
          cutoutPercentage: 50, 
          legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
        };

        // donut 1
        var chDonutData1 = {
            labels: ['Bootstrap', 'Popper', 'Other'],
            datasets: [
              {
                backgroundColor: colors.slice(0,3),
                borderWidth: 0,
                data: [74, 11, 40]
              }
            ]
        };

        var chDonut1 = document.getElementById("chDonut1");
        if (chDonut1) {
          new Chart(chDonut1, {
              type: 'pie',
              data: chDonutData1,
              options: donutOptions
          });
        }
    </script>

</body>

</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>
