<?php 
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

$investignum = $_SESSION['evinoid'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ciras";
    $conn = mysqli_connect($servername,$username,$password,$dbname);


$query = "SELECT sococaseno FROM tbl_evidence ORDER BY sococaseno DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['sococaseno'];

if(empty($lastid))
{
    $number = "SC-".date("Ymd")."1";
}
else
{
    $idd = str_replace("SC-", "", $lastid);
    $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
    $number = 'SC-'.$id;
}
?>
<?php

if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $scno = $_POST['scno'];
    $investigno = $_POST['investigno'];
    $dsc = $_POST['dsc'];
    $quant = $_POST['quant'];
    $dcollected = $_POST['dcollected'];
    $splace = $_POST['splace'];
    $evicusto = $_POST['evicusto'];
    $socotl = $_POST['socotl'];

    if(!$conn)
    {
        die("connection failed " . mysqli_connect_error());
    }
    else
    {
        $sql = "insert into tbl_evidence(investigno,sococaseno,description,quantity,datecollected,place,evicustodian,socoteamleader)VALUES('".$investigno."','".$scno."','".$dsc."','".$quant."','".$dcollected."','".$splace."','".$evicusto."','".$socotl."') ";
        if(mysqli_query($conn,$sql))
        {
            $query = "SELECT sococaseno FROM tbl_evidence ORDER BY sococaseno DESC";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['sococaseno'];

            if(empty($lastid))
            {
                $number = "E-".date("Ymd")."1";
            }
            else
            {
                $idd = str_replace("SC-", "", $lastid);
                $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                $number = 'SC-'.$id;
            }

        }
        else
        {
            echo "Record Faileddd";
        }
    }
}
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
                                    <li><a href="admin-druglist.php">Drug related</a></li>
                                    <li><a href="admin-crimelist.php" class="text-light">Crime Case</a></li>
                                    
                                    
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
                                <li><a href="index.html">Home</a></li>
                                <li><a href="index.html">Crime Case Master</a></li>
                                <li><span>Add Evidence Form</span></li>
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


            <div class="container-fluid">
                <div class="col mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="admin-crimelist.php" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>    
                                            </div>
                                            <div class="col">
                                                <p class="header-title text-center text-uppercase">Add Evidence Form: <?php echo $investignum; ?></p>
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-success deletebtn"><i class="fa fa-plus" aria-hidden="true"></i> Add Evidence</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col mt-5">
                                                            <p class="text-center text-uppercase font-weight-bold">List of Evidence</p>

                                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                <thead class="bg-my-secondary text-light">
                                                                    <tr>
                                                                        <th class="text-center">Soco Case Number</th>
                                                                        <th class="text-center">Speciment Collected </th>
                                                                        <th class="text-center">Quantity </th>
                                                                        <th class="text-center">Date Collected</th>
                                                                        <th class="text-center">Place</th>
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

                                                                        $table = mysqli_query($conn,'SELECT * FROM tbl_evidence WHERE investigno = "'.$investignum.'"');

                                                                        if(mysqli_num_rows($table) > 0)
                                                                        { 
                                                                        
                                                                          while ($row = mysqli_fetch_assoc($table)) 
                                                                          {  
                                                                                
                                                                          ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $row['sococaseno']; ?></td>
                                                                        <td class="text-center"><?php echo $row['description']; ?></td>
                                                                        <td class="text-center"><?php echo $row['quantity']; ?></td>
                                                                        <td class="text-center"><?php echo $row['datecollected']; ?></td>
                                                                        <td class="text-center"><?php echo $row['place']; ?></td>
                                                                        <td>
                                                                            <ul class="d-flex justify-content-center">

                                                                                <li class="mr-3"><button class="text-success editbtn border-0"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </button></li>
                                                                                <li class="mr-3"><a href="#" class="text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a></li>
                                                                                
                                                                                
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
                    <h5 class="modal-title">Add Evidence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                       <div class="container-fluid">
                            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="row">
                                    <div class="col mt-5">
                                        <p class="text-center text-uppercase font-weight-bold">Add Evidence</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-4">
                                        <div class="form-group">
                                            <label>Soco Case Number</label>
                                            <input type="hidden" value="<?php echo $investignum; ?>" name="investigno">
                                            <input type="text" class="form-control text-danger" value="<?php echo $number; ?>" name="scno" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Description Speciment Collected</label>
                                            <input type="text" class="form-control" name="dsc">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" name="quant">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Date Collected</label>
                                            <input type="date" class="form-control" name="dcollected" id="from-datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Specific Place</label>
                                            <input type="text" class="form-control" name="splace">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label>Evidence Custodian</label>
                                            <input type="text" class="form-control" name="evicusto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Soco Team Leader</label>
                                            <input type="text" class="form-control" name="socotl">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center mt-4">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary form-control" name="" value="Save">
                                        </div>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="form-group">
                                            <button class="btn btn-danger form-control" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                       
                    </div>
                
            </div>
        </div>
    </div>
    <!--END OF MODAL DELETE-->



    <!-- MODAL EDIT-->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Evidence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                       <div class="container-fluid">
                            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="row">
                                    <div class="col mt-5">
                                        <p class="text-center text-uppercase font-weight-bold">Edit Evidence</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-4">
                                        <div class="form-group">
                                            <label>Soco Case Number</label>
                                            <input type="hidden" value="<?php echo $investignum; ?>" name="eeinvestigno">
                                            <input type="text" class="form-control text-danger" value="<?php echo $number; ?>" name="scno" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Description Speciment Collected</label>
                                            <input type="text" class="form-control" name="eedsc" id="spec">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" name="eequant">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Date Collected</label>
                                            <input type="date" class="form-control" name="eedcollected" id="from-datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Specific Place</label>
                                            <input type="text" class="form-control" name="eesplace">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label>Evidence Custodian</label>
                                            <input type="text" class="form-control" name="eeevicusto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Soco Team Leader</label>
                                            <input type="text" class="form-control" name="eesocotl">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center mt-4">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary form-control" name="" value="Save">
                                        </div>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="form-group">
                                            <button class="btn btn-danger form-control" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                       
                    </div>
                
            </div>
        </div>
    </div>
    <!--END OF MODAL EDIT-->

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

            $('#idd').val(data[0]);
            $('#spec').val(data[1])
                });
            });
    </script>


    <script>
        $(document).ready(function()
        {
            $('.editbtn').on('click', function(){
            $('#editmodal').modal('show');

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
</body>

</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>