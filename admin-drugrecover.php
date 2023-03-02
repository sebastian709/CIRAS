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
                                    <li><a href="admin-victimlist.php">Victim Master</a></li>
                                    <li><a href="admin-suspectlist.php">Suspect Master</a></li>
                                    <li><a href="admin-informantlist.php">Informant</a></li>
                                    <li><a href="admin-missinglist.php">Missing Master</a></li>
                                    <li><a href="admin-druglist.php" class="text-light">Drug related</a></li>
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
                            <h4 class="page-title pull-left">Drug Related Master</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="admin-druglist.php">Drug Related Master</a></li>
                                <li><span>Drug Case Recovery List</span></li>
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
                            <ul class="nav nav-tabs nav-justified">
                              <li class="nav-item bg-my-secondary">
                                <a class="nav-link active text-warning font-weight-bold border border-dark" data-toggle="tab" href="#arrested">ARRESTED DRUG CASE LIST</a>
                              </li>
                              <li class="nav-item bg-my-secondary">
                                <a class="nav-link text-warning font-weight-bold border border-dark" data-toggle="tab" href="#surrendered">SURRENDERED DRUG CASE LIST</a>
                              </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="arrested">
                                    <div class="container-fluid">
                                        
                                        <div class="row">
                                            <div class="col text-light">
                                                
                                               
                                                <a href="admin-druglist.php" class="btn btn-danger mt-5">Back</a>    
                                            </div>   
                                        </div>
                                        <div class="row">
                                            <div class="col mt-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="header-title text-center">ARRESTED DRUG CASE RECOVERY LIST</h2>
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead class="bg-my-secondary text-light">
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Investigation No.</th>
                                                                    <th class="text-center">Full name</th>
                                                                    <th class="text-center">Date Reported</th>
                                                                    <th class="text-center">Status</th>
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

                                                                    $table = mysqli_query($conn,'SELECT * FROM tbl_drug WHERE ddeleted = "Yes" AND dtype = "arrested"');

                                                                    if(mysqli_num_rows($table) > 0)
                                                                    { 
                                                                    
                                                                      while ($row = mysqli_fetch_assoc($table)) 
                                                                      {  
                                                                            
                                                                      ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $row["id"]; ?></td>
                                                                    <td class="text-center"><?php echo $row["dinvestigno"]; ?></td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["dfullname"]; ?></a></td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["ddatereported"]; ?></a>
                                                                    </td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["dstatus"]; ?></a>
                                                                    </td>
                                                                    <td class="">
                                                                        <ul class="d-flex justify-content-center">
                                                                            <li class="mr-3"><a href="#" class="text-success restorebtn"><i class="fa fa-recycle"></i> Restore </a></li>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane container fade <?php echo $class; ?>" id="surrendered" >
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col text-light">
                                                <a href="admin-druglist.php" class="btn btn-danger mt-5">Back</a>    
                                            </div>   
                                        </div>
                                        <div class="row">
                                            <div class="col mt-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="header-title text-center">SURRENDERED DRUG CASE RECOVERY LIST</h2>
                                                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                                            <thead class="bg-my-secondary text-light">
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th class="text-center">Investigation No.</th>
                                                                    <th class="text-center">Full name</th>
                                                                    <th class="text-center">Date Reported</th>
                                                                    <th class="text-center">Status</th>
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

                                                                    $table = mysqli_query($conn,'SELECT * FROM tbl_drug WHERE ddeleted = "Yes" AND dtype = "surrendered"');

                                                                    if(mysqli_num_rows($table) > 0)
                                                                    { 
                                                                    
                                                                      while ($row = mysqli_fetch_assoc($table)) 
                                                                      {  
                                                                            
                                                                      ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $row["id"]; ?></td>
                                                                    <td class="text-center"><?php echo $row["dinvestigno"]; ?></td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["dfullname"]; ?></a></td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["ddatereported"]; ?></a>
                                                                    </td>
                                                                    <td class="text-center"><a href="" class="text-dark"><?php echo $row["dstatus"]; ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <ul class="d-flex justify-content-center">
                                                                            <li class="mr-3"><a href="#" class="text-success srestorebtn"><i class="fa fa-recycle"></i> Restore </a></li>
                                                                            <li class="mr-3"><a href="#" class="text-danger sdeletebtn"><i class="ti-trash"></i> Delete </a></li>
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

   <!-- MODAL FOR Delete -->
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
                        <input type="hidden" name="dapdelete_id" id="delete_id">
                        <p>Are you sure to delete data permanently?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="dapdeletedata" id="deletedata" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->

     <!-- MODAL FOR RESTORING DATA -->
    <div class="modal fade" id="restoremodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Restore data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="darestore_id" id="restore_id">
                        <p>Are you sure to restore data?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="darestoredata" id="restoredata" class="btn btn-success">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->


    <!-- MODAL FOR Delete -->
    <div class="modal fade" id="sdeletemodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
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
                        <input type="text" name="sdapdelete_id" id="sdelete_id">
                        <p>Are you sure to delete data permanently?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="sdapdeletedata" id="sdeletedata" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->

     <!-- MODAL FOR RESTORING DATA -->
    <div class="modal fade" id="srestoremodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Restore data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="sdarestore_id" id="srestore_id">
                        <p>Are you sure to restore data?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="sdarestoredata" id="srestoredata" class="btn btn-success">Restore</button>
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


     <!-- Delete js modal -->
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
                });
            });
    </script>

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

    <!-- Delete js modal -->
    <script>
        $(document).ready(function()
        {
            $('.sdeletebtn').on('click', function(){
            $('#sdeletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);

            $('#sdelete_id').val(data[0]);
                });
            });
    </script>

    <!-- Restore js modal -->
    <script>
        $(document).ready(function()
        {
            $('.srestorebtn').on('click', function(){
            $('#srestoremodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            console.log(data);

            $('#srestore_id').val(data[0]);
                });
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({ "order": [[ 2, 'desc' ]] });
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable();
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
</body>

</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>