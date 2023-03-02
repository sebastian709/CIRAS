<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ciras";
    $conn = mysqli_connect($servername,$username,$password,$dbname);


$query = "SELECT entryno FROM tbl_blotter ORDER BY entryno DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['entryno'];

if(empty($lastid))
{
    $number = "E-".date("Ymd")."1";
}
else
{
    $idd = str_replace("E-", "", $lastid);
    $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
    $number = 'E-'.$id;
}
?>

<?php

if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $invoiceid = $_POST['entryno'];
    $prodname = $_POST['bdate'];
    $price = $_POST['btime'];
    $event = $_POST['bevent'];
    $dispo = $_POST['bdisposition'];

    if(!$conn)
    {
        die("connection failed " . mysqli_connect_error());
    }
    else
    {
        $sql = "insert into tbl_blotter(entryno,bdate,btime,bincidentevent,bdisposition,bdeleted,bstatus)VALUES('".$invoiceid."','".$prodname."','".$price."','".$event."','".$dispo."','No','Pending') ";
        if(mysqli_query($conn,$sql))
        {
            $query = "SELECT entryno FROM tbl_blotter ORDER BY entryno DESC";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['entryno'];

            if(empty($lastid))
            {
                $number = "E-".date("Ymd")."1";
            }
            else
            {
                $idd = str_replace("E-", "", $lastid);
                $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                $number = 'E-'.$id;
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
                <a href="logout.php" class="btn btn-danger py-2 pull-right mx-1 font-weight-bold"><i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT</a>
                <a href="DO-Blotterbook.php" class="btn btn-info py-2 pull-right mx-1 font-weight-bold"><i class="fa fa-book" aria-hidden="true"></i> BLOTTER BOOK</a>
                <a href="DO-Dashboard.php" class="btn btn-info py-2 pull-right mx-1 font-weight-bold"><i class="fa fa-tachometer" aria-hidden="true"></i> DASHBOARD</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <a href="DO-Blotterbook.php" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                                                </div>
                                                <div class="col">
                                                    <h4 class="text-center text-uppercase mb-5">Add Blotter Record</h4>
                                                </div>
                                                <div class="col-sm-1">
                                                    <p class="text-light">Space</p>
                                                </div>
                                            </div>
                                            <!-- Current Date -->
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label>Blotter No.</label>
                                                    <input type="text" class="form-control border border-dark" name="entryno" value="<?php echo $number; ?>" readonly>
                                                </div>
                                                 <div class="col">
                                                    <label>Date</label>
                                                    <input type="text" id="currentDate" class="form-control border border-dark bg-light" name="bdate" readonly>
                                                    
                                                </div>
                                                <div class="col">
                                                    <label>Time</label>
                                                    <input type="text" id="currentTime" class="form-control border border-dark" name="btime" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <label>Incidental/Events</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="bevent"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <label>Disposition</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="bdisposition"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col">
                                                    <button type="submit" class="btn=sm btn btn-primary pull-right form-control" name="">Submit</button>
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
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        document.getElementById("currentDate").value = date;
    </script>

    <script>
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
          document.getElementById("currentTime").value = time;
    </script>

    <script>
        var today = new Date();
        var date = 'Date: '+today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var dateTime = date;
          document.getElementById("currentDateTime").value = dateTime;
    </script>

    <script>
        var today = new Date();
        var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
        var dateTime = date;
          document.getElementById("DateTime").value = dateTime;
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