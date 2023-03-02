<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

$bookarrid = $_SESSION['bookarid'];
$susid = $_SESSION['susid'];
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
    <link rel="stylesheet" href="assets/css/prostyle1.css">
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
                            <h4 class="page-title pull-left">Crime Case Master</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin-dashboard.php">Home</a></li>
                                <li><a href="admin-crimelist.php">CRIMECASE MASTER</a></li>
                                <li><a href="admin-crimelist.php">SUSPECT PERSON LIST</a></li>
                                <li><span>Book Arrest</span></li>
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
                            <h3 class="mt-5 text-center text-uppercase">PNP arrest and booking Sheet</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                              
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <a href="admin-crimesuspectlist.php" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>     
                                        </div>
                                        <div class="col">
                                            <h2 class="header-title text-center text-uppercase mb-5">Suspect Information</h2>    
                                        </div>
                                        <div class="col">
                                            <p class="pull-right text-danger">Investigation No.: <?php echo $bookarrid; ?></p>    
                                        </div>
                                    </div>
                                     <?php
                                                $sname = "localhost";
                                                $uname = "root";
                                                $password = "";
                                                $db_name = "ciras";

                                                $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                                $table = mysqli_query($conn,'SELECT * FROM tbl_suspect WHERE id = "'.$susid.'"');

                                                if(mysqli_num_rows($table) > 0)
                                                { 
                                                
                                                  while ($row = mysqli_fetch_assoc($table)) 
                                                  {  
                                                        
                                                  ?>
                                    <div class="container-fluid">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group text-center" style="position: relative;" >
                                                                    <span class="img-div">
                                                                        <div class="text-center img-placeholder"  onClick="triggerClick()">
                                                                            
                                                                        </div>
                                                                        <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
                                                                    </span>
                                                                    <input type="file" name="profile_image" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                                                                </div>    
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <input type="hidden" value="<?php echo $bookarrid;?>" name="investigno">
                                                                                <input type="hidden" value="<?php echo $susid;?>" name="susidno">
                                                                                <label class="text-uppercase">Full name</label>
                                                                                <input type="text" value="<?php echo $row["slastname"]; ?>, <?php echo $row["sfirstname"]; ?> <?php echo $row["smidname"]; ?>." class="form-control" name="fullname">
                                                                            </div>    
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label class="text-uppercase">Name of School</label>
                                                                                <input type="text" class="form-control" name="nameofschool">
                                                                            </div>    
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label class="text-uppercase">location of shool</label>
                                                                                <input type="text" class="form-control" name="schoolloc">
                                                                            </div>    
                                                                        </div>    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                            Identifying marks
                                                        </label>
                                                        
                                                        <input type="text" class="form-control" name="idmarks">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">driver lic nr</label>
                                                        <input type="text" class="form-control" name="driverlic">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                            issued at
                                                        </label>
                                                        <input type="text" class="form-control" name="issueat">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>issued on </label>
                                                        <input type="date" class="form-control" name="issueon" id="from-datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">residence certificate no</label>
                                                        <input type="text" class="form-control" name="residentcert">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Date issue</label>
                                                        <input type="date" class="form-control" name="rdissue" id="from-datepicker">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                            Place issue
                                                        </label>
                                                        <input type="text" class="form-control" name="pissue">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">other id cards</label>
                                                        <input type="text" class="form-control" name="othidcard">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                            id NR
                                                        </label>
                                                        <input type="text" class="form-control" name="idnr">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">name of father</label>
                                                        <input type="text" class="form-control" name="nameoffather">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                           age
                                                        </label>
                                                        <input type="text" class="form-control" name="fage">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Address</label>
                                                        <input type="text" class="form-control" name="fadd">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">name of mother</label>
                                                        <input type="text" class="form-control" name="nameofmother">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">
                                                           age
                                                        </label>
                                                        <input type="text" class="form-control" name="mage">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Address</label>
                                                        <input type="text" class="form-control" name="madd">
                                                    </div>    
                                                </div>
                                            </div>
                                            <hr size="8" color="black">
                                            <h2 class="header-title text-center text-uppercase">Name and address of person to be contracted in case of emergency</h2>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Name</label>
                                                        <input type="text" class="form-control" name="cname">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Relationship</label>
                                                        <input type="text" class="form-control" name="rel">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">address</label>
                                                        <input type="text" class="form-control" name="npadd">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">phone number</label>
                                                        <input type="text" class="form-control" name="npnum">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">lawyer</label>
                                                        <input type="text" class="form-control" name="law">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">phone number</label>
                                                        <input type="text" class="form-control" name="lawnum">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">doctor</label>
                                                        <input type="text" class="form-control" name="doc">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">phone number</label>
                                                        <input type="text" class="form-control" name="docnum">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Health problem</label>
                                                        <input type="text" class="form-control" name="healthprob">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">offense charge</label>
                                                        <input type="text" class="form-control" name="offench">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Where arrested</label>
                                                        <input type="text" class="form-control" name="wherearr">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Date and time arrested</label>
                                                        <input type="date" class="form-control" name="datearr"  id="from-datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">Name of arresting officer</label>
                                                        <input type="text" class="form-control" name="nameofarroff">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label class="text-uppercase">unit</label>
                                                        <input type="text" class="form-control" name="unit">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="" name="" class="btn btn-secondary form-control" value="Clear Data">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <button type="submit" name="bookcomparr" class="btn btn-primary form-control">Book Arrest</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                                    }
                                                        
                                                    }

                                                    ?> 
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

    <script src="assets/js/prostyle1.js"></script>

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
