 
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
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/cardv.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

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
                            
                             <li ><a href="main-dashboard.php"><i class="fas fa-tachometer-alt text-light"></i> <span>Dashboard</span></a></li>

                            <li class="active"><a href="main-incident.php"><i class="fa fa-file-text text-light" aria-hidden="true"></i> <span>Add Incident Type</span></a></li>


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
                            <h4 class="page-title pull-left">Admin Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Admin Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">

               

                <div class="container-fluid">
                    <div class="row">
                        <div class="col mb-4">
                            
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                     <?php if (isset($_GET['success'])) { ?>
                        <div class="myDiv">
                            <div class="row">
                                <div class="col mt-2">
                                    <div class="card bg-success">
                                        <h4 class="text-center text-light"><?php echo $_GET['success']; ?></h4>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    <?php } ?>
                

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title text-center">Add Incident Type</h4>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                               <form action="code.php" method="POST">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col form-group">
                                                                <label>Incident Type</label>
                                                                <input type="text" class="form-control" name="inctype">
                                                            </div>
                                                        </div>   
                                                        <div class="row">
                                                            <div class="col form-group">
                                                                <button type="submit" name="addinci" class="form-control btn-success btn">Add</button>
                                                            </div>
                                                        </div> 
                                                    </div>    
                                               </form>
                                            </div>
                                            <div class="col">
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead class="bg-my-secondary text-light">
                                                                <tr>
                                                                    <th class="text-center">No.</th>
                                                                    <th class="text-center">Type</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $sname = "localhost";
                                                                    $uname = "root";
                                                                    $password = "";
                                                                    $db_name = "ciras";

                                                                    $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                                                    $table = mysqli_query($conn,'SELECT * FROM incitype');

                                                                    if(mysqli_num_rows($table) > 0)
                                                                    { 
                                                                    
                                                                      while ($row = mysqli_fetch_assoc($table)) 
                                                                      {  
                                                                            
                                                                      ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $row["id"]; ?></td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["typee"]; ?></a></td>
                                                                    <td>
                                                                        <ul class="d-flex justify-content-center">
                                                                            <form method="POST" action="code.php">
                                                                                <li class="mr-3">
                                                                                    <input type="hidden" value="<?php echo $row["id"]; ?>" name="delinciid">
                                                                                    <button class="text-danger deletebtn border-0" name="delinci"><i class="ti-trash"></i> Delete </button>
                                                                                </li>    
                                                                            </form>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                    <?php
                                                                        }
                                                                            
                                                                        }

                                                                        ?> 
                                                            </tbody>
                                                        </table>   
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


    <!-- MODAL FOR Moving Data into Recovery Data -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Default Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="code.php" method="POST">
                                <div class="row">
                                    <div class="col form-group">
                                        <label>Username:</label> 
                                        <input type="text" class="form-control" name="tempuser">   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" name="temppass">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <button class="btn btn-success form-control" name="tempreg">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->
    
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

     <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>



    <script>
        var today = new Date();
        var date = 'Date: '+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var dateTime = date;
          document.getElementById("currentDateTime").value = dateTime;
    </script>

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
        $(document).ready(function() {
            $('#example').DataTable();
        } );
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
