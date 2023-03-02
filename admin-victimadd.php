<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {


$crimesuslist = $_SESSION['sllist'];
$sss = $_SESSION['inclist'];
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
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
                            
                            <li><a href="admin-dashboard.php"><i class="fa fa-tachometer text-light" aria-hidden="true"></i> <span>Dashboard</span></a></li>
                            
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pencil-alt text-light"></i> <span>Crime Information</span></a>
                                <ul class="collapse">
                                    <li><a href="admin-victimlist.php" class="text-light">Victim Master</a></li>
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
                            <h4 class="page-title pull-left">Victim Master</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="admin-victimlist.php">Victim Master</a></li>
                                <li><span></span>Add Victim</li>
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
                    <div class="row">
                        <div class="col">
                            <h3 class="mt-5 text-center">Add Victim</h3>
                            <p class="text-center text-danger">Investigation no: <?php echo $crimesuslist; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="admin-crimevictimlist.php" class="btn btn-danger">Back</a>   
                        </div>   
                    </div>
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

                    <?php if (isset($_GET['error'])) { ?>
                    <div class="myDiv">
                        <div class="row">
                            <div class="col mt-5">
                                <div class="card bg-danger">
                                    <h4 class="text-center text-light"><?php echo $_GET['error']; ?></h4>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
                    <div class="row">
                        <div class="col mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="header-title text-center">Victim Data</h2>
                                    <div class="container-fluid">
                                        <form action="code.php" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last name</label>
                                                        <input type="hidden" value="<?php echo $crimesuslist;  ?>" name="investigid1">
                                                        <input type="hidden" value="<?php echo $sss;  ?>" name="incitypesus1">
                                                        <input type="text" class="form-control" name="vlastname1">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>First name</label>
                                                        <input type="text" class="form-control" name="vfirstname1">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Middle name</label>
                                                        <input type="text" class="form-control" name="vmidname1">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nickname</label>
                                                        <input type="text" class="form-control" name="vnickname1">
                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Civil Status</label>
                                                        <select class="form-control h-100" name="vcivilstatus1">
                                                            <option>Choose...</option>
                                                            <option>Single</option>
                                                            <option>Married</option>
                                                            <option>Divorced</option>
                                                            <option>Widowed</option>
                                                            <option>Seperated</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control h-100" name="vgender1">
                                                            <option>Choose...</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                                           
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="vbirthday1" placeholder="mm-dd-yyyy" value="" min="1899-01-01" max="2030-12-31" id="from-datepicker">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="vage1">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" class="form-control" name="vmobileno1">
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Citizenship</label>
                                                        <input type="text" class="form-control" name="vcitizen1">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Place of Birth</label>
                                                        <input type="text" class="form-control" name="vplaceofbirth1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="text-center">Current Address</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Complete Address</label>
                                                        <input type="text" class="form-control" name="vaddress1">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Highest Educational Attainment</label>
                                                        <select class="form-control h-100" name="vhigheduc1">
                                                            <option>Choose...</option>
                                                            <option>No schooling completed</option>
                                                            <option>Elementary</option>
                                                            <option>High school</option>
                                                            <option>Junior Highschool Graduate</option>
                                                            <option>College</option>
                                                            <option>Associate's degree</option>
                                                            <option>Master's degree</option>
                                                            <option>Professional school degree</option>
                                                            <option>Doctorate degree</option>
                                                        </select>
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Occupation</label>
                                                        <input type="text" class="form-control" name="voccu1">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Work Address</label>
                                                        <input type="text" class="form-control" name="vworkadd1">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="vemail1">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-5">
                                                    <button class="btn btn-primary pull-right" name="victimsave1" type="submit">Add Victim Data</button>
                                                    <a href="#" class="text-dark btn btn-light mr-3 pull-right border border-dark">Clear Form</a>
                                                </div>
                                            </div>
                                        </form>
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
    <!-- page container area end -->>

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

    


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script> 
        $( document ).ready(function() {     
        $("#from-datepicker").datepicker({          
        format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
        });      
        });  
    </script> 

    <script>
             $( ".myDiv" ).show( "slow").delay(3500).fadeOut('slow', function() {
          $(this).remove();
     }); 
    </script>
    <script>
             $( ".myDiv2" ).show( "slow").delay(5000).fadeOut('slow', function() {
          $(this).remove();
     }); 
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
</body>

</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>
