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
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <a href="DO-Blotterbook.php" class="btn btn-danger"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                                            </div>
                                            <div class="col-sm-9">
                                                <h2 class="header-title text-center">POLICE BLOTTER LIST RECOVERY</h2>       
                                            </div> 
                                            <div class="col-sm-2">
                                                <p class="text-light">asdf</p>
                                            </div>   
                                        </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead class="bg-my-secondary text-light">
                                        <tr>
                                            <th class="text-center col-sm-1">Enty No.</th>
                                            <th class="text-center col-sm-2">Date & Time</th>
                                            <th class="text-center">Incidentials/Events</th>
                                            <th class="text-center col-sm-4">Disposition</th>
                                            <th class="text-center col-sm-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $sname = "localhost";
                                        $uname = "root";
                                        $password = "";
                                        $db_name = "ciras";

                                        $conn = mysqli_connect($sname, $uname, $password, $db_name);

                                        $table = mysqli_query($conn,'SELECT * FROM tbl_blotter WHERE bdeleted = "Yes"');

                                            if(mysqli_num_rows($table) > 0)
                                            { 
                                                                    
                                                while ($row = mysqli_fetch_assoc($table)) 
                                                {  
                                                                            
                                                ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row["entryno"]; ?></td>
                                                <td class="text-center"><?php echo $row["bdate"]; ?>/<?php echo $row["btime"]; ?></td>
                                                <td class="text-center"><a href="" class="text-dark"><?php echo $row["bincidentevent"]; ?></a></td>
                                                <td class="text-center"><?php echo $row["bdisposition"]; ?>    
                                                </td>
                                                <td class="text-center">
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
    </div>

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
                        <input type="hidden" name="pbpdelete_id" id="delete_id">
                        <p>Are you sure to delete data permanently?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="pbpdeletedata" id="deletedata" class="btn btn-danger">Delete</button>
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
                        <input type="hidden" name="pbrestore_id" id="restore_id">
                        <p>Are you sure to restore data?</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                        <button type="submit" name="pbrestoredata" id="restoredata" class="btn btn-success">Restore</button>
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
            $('#example').DataTable({ "order": [[ 0, 'desc' ]] });
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
</body>

</html>
<?php 
}else{
  header("Location:index.php");
  exit();
}
 ?>