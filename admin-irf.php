<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {


$conn = mysqli_connect("localhost", "root", "", "ciras");
  $smyid = $_SESSION['createirf'];
  $results = mysqli_query($conn, "SELECT * FROM tbl_blotter WHERE entryno = '$smyid'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
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
                            <h4 class="page-title pull-left">Incident Record Form</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin-dashboard.php">Home</a></li>
                                <li><a href="admin-DOblotterbook.php">Blotter Book</a></li>
                                <li><span>Add Incident</span></li>
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
                        <div class="col mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col  bg-my-secondary">
                                            <p class="text-center font-weight-bold text-warning">Step 1: Reporting Person</p>
                                        </div>
                                        <div class="col bg-light border border-dark">
                                            <p class="text-center font-weight-bold  ">Step 2: Suspect Data</p>
                                        </div>
                                        <div class="col bg-light border border-dark">
                                            <p class="text-center font-weight-bold">Step 3: Victim Data</p>
                                        </div>
                                        <div class="col bg-light border border-dark">
                                            <p class="text-center font-weight-bold">Step 4: Narrative of Incident</p>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <form action="code.php" method="POST">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <form action="code.php" method="POST">
                                                        <button  class="btn btn-danger font-weight-bold" type="submit"><i class="fa fa-chevron-left" aria-hidden="true"></i> Cancel</button>    
                                                    </form>
                                                </div>
                                                <div class="col mb-5">
                                                    <h4 class="text-center">Incident Record Form</h4>   
                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                            </div>
                                            <?php foreach ($users as $user): ?>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Blotter Entry No.</label>
                                                    <input type="text" class="text-danger font-weight-bold form-control" value="IS-<?php echo $user["entryno"]; ?>" name="ben" readonly>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Type of Incident</label>
                                                         <?php
                               
                                                            $mysqli= NEW MySQLi('localhost', 'root','','ciras');

                                                            $result = $mysqli->query("SELECT typee FROM incitype");
                                                           ?>
                                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="toi" required >
                                                            <option selected>Choose...</option>
                                                            <?php
                                                            while ($rows = $result->fetch_assoc()) {
                                                                $cname =  $rows['typee'];
                                                                echo "<option value='$cname'>$cname</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Date Reported</label>
                                                    <input type="date" class="form-control" name="dr">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Time Reported</label>
                                                    <input type="Time" class="form-control" name="tr">
                                                </div>

                                                <div class="col form-group">
                                                    <label>Date of Incident</label>
                                                    <input type="date" class="form-control" name="di">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Time of Incident</label>
                                                    <input type="Time" class="form-control" name="ti">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Is it Crime?</label>
                                                    <select class="form-control" name="iic">
                                                            <option>Choose...</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-5 mb-4">
                                                    <h5 class="text-center">Reporting Person</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last name</label>
                                                        <input type="text" class="form-control" name="ilastname">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>First name</label>
                                                        <input type="text" class="form-control" name="ifirstname">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Middle name</label>
                                                        <input type="text" class="form-control" name="imidname">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nickname</label>
                                                        <input type="text" class="form-control" name="inickname">
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Civil Status</label>
                                                        <select class="form-control h-100" name="icivilstatus">
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
                                                        <select class="form-control h-100" name="igender">
                                                            <option>Choose...</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="ibirthday" placeholder="mm-dd-yyyy" value="" min="1899-01-01" max="2030-12-31" id="from-datepicker">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="iage">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" class="form-control" name="imobileno">
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Citizenship</label>
                                                        <input type="text" class="form-control" name="icitizen">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Place of Birth</label>
                                                        <input type="text" class="form-control" name="iplaceofbirth">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control" name="iaddress" placeholder="House No./Street">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Barangay</label> 
                                                    <select class="form-control" name="ibarangay">
                                                        <option selected="" readonly="">Choose...</option>
                                                        <option>Moras De La Paz</option>
                                                        <option>Poblacion</option>
                                                        <option>San Bartolome</option>
                                                        <option>San Matias</option>
                                                        <option>San Vicente</option>
                                                        <option>Santo Rosario</option>
                                                        <option>Sapa</option>
                                                    </select>   
                                                </div>
                                                <div class="col form-group">
                                                    <label>Municipality</label>
                                                    <input type="text" class="form-control" name="imuni" value="Sto.Tomas" readonly="">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Province</label>
                                                    <input type="text" class="form-control" name="iprovince" value="Pampanga" readonly="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Highest Educational Attainment</label>
                                                        <select class="form-control h-100" name="ihigheduc">
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
                                                        <input type="text" class="form-control" name="ioccu">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Work Address</label>
                                                        <input type="text" class="form-control" name="iworkadd">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="iemail">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-4 form-group">
                                                    <button class="btn btn-secondary form-control font-weight-bold"><i class="fa fa-eraser" aria-hidden="true"></i> Clear Form</button>
                                                </div>
                                                <div class="col mt-4 form-group">
                                                    <input type="hidden" value="<?php echo $user["entryno"]; ?>" name="blotterstatus">
                                                    <button class="btn btn-primary form-control font-weight-bold" type="submit" name="itemabtn">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button>    
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </form>        

                                        <form method="POST" action="code.php">

                                            <?php

                                            if (!empty($_SESSION['backid'])) {
                                                // code...
                                            

                                                
                                                $mybackid1 = $_SESSION['backid'];
                                                $table1 = mysqli_query($conn,"SELECT * FROM tbl_irf WHERE blotterno = '$mybackid1'");

                                                if(mysqli_num_rows($table1) > 0)
                                                { 
                                            
                                                  while ($row1 = mysqli_fetch_assoc($table1)) 
                                                {  
                                            
                                            ?>
                                        
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Blotter Entry No.</label>
                                                    <input type="text" class="text-danger font-weight-bold form-control" value="<?php echo $row1["blotterno"]; ?>" name="upben" readonly>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Type of Incident</label>
                                                        <select class="form-control h-100" name="uptoi">
                                                            <option class="bg-my-secondary text-white" value="<?php echo $row1["incitype"]; ?>" selected><?php echo $row1["incitype"]; ?></option>
                                                            <option>incident 1</option>
                                                            <option>incident 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label>Date Reported</label>
                                                    <input type="date" class="form-control" name="updr" value="<?php echo $row1["datereported"]; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Time Reported</label>
                                                    <input type="Time" class="form-control" name="uptr" value="<?php echo $row1["timereported"]; ?>">
                                                </div>

                                                <div class="col form-group">
                                                    <label>Date of Incident</label>
                                                    <input type="date" class="form-control" name="updi" value="<?php echo $row1["dateincident"]; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Time of Incident</label>
                                                    <input type="Time" class="form-control" name="upti" value="<?php echo $row1["timeincident"]; ?>">
                                                </div>
                                                <div class="col form-group">
                                                    <label>Is it Crime?</label>
                                                    <select class="form-control" name="upiic">
                                                            <option class="bg-my-secondary text-white" value="<?php echo $row1["isitcrime"]; ?>" selected><?php echo $row1["isitcrime"]; ?></option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                               }
                                            
                                              }
                                              }
                                            ?>

                                            <?php

                                            if (!empty($_SESSION['backid'])) {
                                                // code...
                                            

                                                
                                                $mybackid = $_SESSION['backid'];
                                                $table = mysqli_query($conn,"SELECT * FROM tbl_informant WHERE investigno = '$mybackid'");

                                                if(mysqli_num_rows($table) > 0)
                                                { 
                                            
                                                  while ($row = mysqli_fetch_assoc($table)) 
                                                {  
                                            
                                            ?>
                                            <div class="row">
                                                <div class="col mt-5 mb-4">
                                                    <h5 class="text-center">Reporting Person</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last name</label>
                                                        <input type="text" class="form-control" name="upilastname" value="<?php echo $row["ilastname"]; ?>">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>First name</label>
                                                        <input type="text" class="form-control" name="upifirstname" value="<?php echo $row["ifirstname"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Middle name</label>
                                                        <input type="text" class="form-control" name="upimidname" value="<?php echo $row["imidname"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Nickname</label>
                                                        <input type="text" class="form-control" name="upinickname" value="<?php echo $row["inickname"]; ?>">
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Civil Status</label>
                                                        <select class="form-control h-100" name="upicivilstatus">
                                                            <option class="bg-my-secondary text-white" value="<?php echo $row["icivilstatus"]; ?>" selected><?php echo $row["icivilstatus"]; ?></option>
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
                                                        <select class="form-control h-100" name="upigender">
                                                            <option class="bg-my-secondary text-white" value="<?php echo $row["igender"]; ?>" selected><?php echo $row["igender"]; ?></option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="upibirthday" id="from-datepicker"  value="<?php echo $row["ibirthday"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="upiage"  value="<?php echo $row["iage"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" class="form-control" name="upimobileno" value="<?php echo $row["imobileno"]; ?>">
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Citizenship</label>
                                                        <input type="text" class="form-control" name="upicitizen" value="<?php echo $row["icitizen"]; ?>">
                                                    </div>    
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Place of Birth</label>
                                                        <input type="text" class="form-control" name="upiplaceofbirth" value="<?php echo $row["iplaceofbirth"]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Complete Address</label>
                                                        <input type="text" class="form-control" name="upiaddress" value="<?php echo $row["iaddress"]; ?>">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Highest Educational Attainment</label>
                                                        <select class="form-control h-100" name="upihigheduc">
                                                            <option class="bg-my-secondary text-white" value="<?php echo $row["ihigheduc"]; ?>" selected><?php echo $row["ihigheduc"]; ?></option>
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
                                                        <input type="text" class="form-control" name="upioccu" value="<?php echo $row["ioccu"]; ?>">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Work Address</label>
                                                        <input type="text" class="form-control" name="upiworkadd" value="<?php echo $row["iworkadd"]; ?>">
                                                    </div>    
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="upiemail" value="<?php echo $row["iemail"]; ?>">
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-4 form-group">
                                                    <button class="btn btn-secondary form-control font-weight-bold"><i class="fa fa-eraser" aria-hidden="true"></i> Clear Form</button>
                                                </div>
                                                <div class="col mt-4 form-group">
                                                    <!-- Edit button nato kase bumalik sa step 1 -->
                                                    <button class="btn btn-primary form-control font-weight-bold" type="submit" name="itemabtnup">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button>    
                                                </div>
                                            </div>
                                            <?php
                                               }
                                            
                                              }
                                              }
                                            ?>
                                        </div>
                                    </form>
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
                    <h5 class="modal-title">Delete data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="vdelete_id" id="delete_id">
                        <p>Are you sure to delete data?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="vdeletedata" id="deletedata" class="btn btn-danger">Delete</button>
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
             $( ".myDiv" ).show( "slow").delay(3500).fadeOut('slow', function() {
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