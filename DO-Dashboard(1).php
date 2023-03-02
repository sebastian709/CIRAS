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
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

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

<body onload="startTime()" style="background-color: #f5f5f5;">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->

    <div class="container-fluid">
        <div class="row bg-my-secondary">
            <div class="col py-3">
                <h2 class="text-light">Police Blotter Book</h2>   
            </div>
            <div class="col">
                <div id="txt" class="btn btn-danger btn-sm font-weight-bold pull-right mt-3 mx-1" pointer-events:none;></div>
                <input type="text" class="btn btn-dark btn-sm font-weight-bold pull-right mt-3 tex" id="currentDateTime" disabled="">
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-2 bg-dark">
                <h5 class="text-center mt-2 text-light text-uppercase">Desk officer</h5>    
            </div>
            <div class="col border border-secondary bg-secondary py-1">
                <a href="logout.php" class="btn btn-danger py-2 pull-right mx-1 font-weight-bold"><i class="fas fa-sign-out-alt"></i> LOG OUT</a>
                <a href="DO-Blotterbook.php" class="btn btn-info py-2 pull-right mx-1 font-weight-bold"><i class="fa fa-book" aria-hidden="true"></i> BLOTTER BOOK</a>
                <a href="DO-Blotterbook.php" class="btn btn-info py-2 pull-right mx-1 font-weight-bold"><i class="fa fa-book" aria-hidden="true"></i> POLICE CLEARANCE</a>
                <a href="" class="btn btn-info py-2 pull-right mx-1 font-weight-bold"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
                        <div class="col mt-5">
                            <div class="card">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col mt-3">
                                            <h2 class="header-title text-center">DASH BOARD</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>    
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
    </div>

    
    

    

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

     <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

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
        $(document).ready(function()
        {
            $('.deletebtn').on('click', function(){
            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);

            $('#delete_id').val(data[0]);
            $('#delete_lastname').val(data[1])
                });
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

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