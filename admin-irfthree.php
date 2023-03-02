<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {


$conn = mysqli_connect("localhost", "root", "", "ciras");
  $incitype = $_SESSION['incises'];
  $backup = $_SESSION['backupirfid'];
  $smyid = $_SESSION['createirf'];
  if ($smyid == 0) {
      $smyid = $backup;  
  }
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
                        <div class="col mt-5 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col bg-light border border-dark py-2">
                                            <p class="text-center font-weight-bold">Step 1: Reporting Person</p>
                                        </div>
                                        <div class="col bg-light border border-dark py-2">
                                            <p class="text-center font-weight-bold">Step 2: Suspect Data</p>
                                        </div>
                                        <div class="col bg-my-secondary py-2">
                                            <p class="text-center text-warning font-weight-bold">Step 3: Victim Data</p>
                                        </div>
                                        <div class="col bg-light border border-dark py-2">
                                            <p class="text-center font-weight-bold">Step 4: Narrative of Incident</p>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <button  class="btn btn-success restorebtn font-weight-bold"><i class="fa fa-plus" aria-hidden="true"></i> Add Victim</button>
                                                </div>
                                                <div class="col mb-5">
                                                    <h4 class="text-center">Victim Data</h4>   
                                                </div>
                                                <div class="col">
                                                    <?php foreach ($users as $user): ?>
                                                    <p class="text-center text-danger">Blotter Entry No:IS-<?php echo $user["entryno"]; ?></p>    
                                                </div>
                                            </div>
                                    <form action="code.php" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead class="bg-my-secondary text-light">
                                                            <tr>
                                                                <th class="text-center">No.</th>
                                                                <th class="text-center">Full name</th>
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

                                                                $table = mysqli_query($conn,'SELECT * FROM tbl_victim WHERE vdeleted = "No" AND investigno = "IS-'.$smyid.'"' );

                                                                if(mysqli_num_rows($table) > 0)
                                                                { 
                                                                
                                                                  while ($row = mysqli_fetch_assoc($table)) 
                                                                  {  
                                                                        
                                                                  ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $row["id"]; ?></td>
                                                                <td class="text-center"><a href="" class="text-dark"><?php echo $row["vlastname"]; ?>, <?php echo $row["vfirstname"]; ?> <?php echo $row["vmidname"]; ?></a></td>
                                                                <td>
                                                                    <ul class="d-flex justify-content-center">
                                                                        
                                                                        <li class="mr-3"><a href="#" class="text-danger deletebtn"><i class="ti-trash"></i> Delete </a></li>
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
                                            <div class="row">
                                                <div class="col">
                                                    <p class="pull-right mt-5 text-danger font-weight-bold">*Note:Include if reporting person is also a victim.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mt-4 form-group">
                                                    <form action="code.php" method="POST">
                                                        <button class="btn btn-danger form-control font-weight-bold" name="back32"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button>
                                                    </form>
                                                </div>
                                                <div class="col mt-4 form-group">
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" value="<?php echo $user["entryno"]; ?>" name="icnextno">
                                                        <button class="btn btn-primary form-control font-weight-bold" type="submit" name="itemcbtn">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button>         
                                                    </form>  
                                                </div>
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
                        <input type="hidden" name="ivdelete_id" id="delete_id">
                        <p>Are you sure to delete data?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="ivdeletedata" id="deletedata" class="btn btn-danger">Add Suspect</button>
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


    <!-- MODAL FOR ADD SUSPECT DATA -->
    <div class="modal fade bd-example-modal-xl" id="restoremodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">ADD VICTIM : IS-<?php echo $user["entryno"]; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="mrestore_id" id="restore_id">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        
                                        <input type="hidden" value="<?php echo "IS-".$user["entryno"]; ?>" name="investigid">
                                        <?php endforeach; ?>
                                        <input type="hidden" value="<?php echo $incitype;  ?>" name="incitypesus">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="vlastname">
                                    </div>    
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="vfirstname">
                                    </div>
                                </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" class="form-control" name="vmidname">
                                        </div>
                                    </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nickname</label>
                                        <input type="text" class="form-control" name="vnickname">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Civil Status</label>
                                        <select class="form-control" name="vcivilstatus">
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
                                            <select class="form-control" name="vgender">
                                                <option>Choose...</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Birthdate</label>
                                        <input type="date" class="form-control" name="vbirthday" placeholder="mm-dd-yyyy" value="" min="1899-01-01" max="2030-12-31" id="from-datepicker">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="vage">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="vmobileno">
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input type="text" class="form-control" name="vcitizen">
                                    </div>    
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Place of Birth</label>
                                        <input type="text" class="form-control" name="vplaceofbirth">
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
                                        <input type="text" class="form-control" name="vaddress">
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Highest Educational Attainment</label>
                                        <select class="form-control" name="vhigheduc">
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
                                        <input type="text" class="form-control" name="voccu">
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Work Address</label>
                                        <input type="text" class="form-control" name="vworkadd">
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="vemail">
                                    </div>    
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="victimsave" id="restoredata" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Victim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->

    <!-- Restore js modal -->
    <script>
        $(document).ready(function()
        {
            $('.restorebtn').on('click', function(){
            $('#restoremodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);

            $('#restore_id').val(data[0]);
                });
            });
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