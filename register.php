<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])){

$lvl = $_SESSION['lvlacc'];

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
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="apple-touch-icon" href="https://i.pinimg.com/originals/98/a6/73/98a67354b9dd047b4aefa9ab13bc780d.png">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/98/a6/73/98a67354b9dd047b4aefa9ab13bc780d.png">


</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- tab start -->


                    <div class="container-fluid">
                        <div class="row bg-my-secondary text-light">
                            <div class="col p-4">
                                <h1 class="py-0 pl-5 pl-5">E-Blotter</h1><h3 class="pl-5">Philippine National Police</h3>
                            </div>

                            <div class="col-sm-2 mt-5 form-group">
                                <a href="index.php" class="pull-right btn btn-success form-control">Login</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h2 class="pt-5 pl-5">Account Registration Form (<?php echo $lvl; ?>)</h2>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <form action="code.php" method="POST">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card p-0">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label font-weight-bold">Rank</label>
                                                                        <select class="form-control" name="rrank" required="">
                                                                            <option selected disabled>Choose...</option>
                                                                            <option>NUP</option>
                                                                            <option>Pat</option>
                                                                            <option>PCpl</option>
                                                                            <option>PSSg</option>
                                                                            <option>PMSg</option>
                                                                            <option>PSMSg</option>
                                                                            <option>PCMSg</option>
                                                                            <option>PCOL</option>
                                                                            <option>PBGEN</option>
                                                                            <option>PMGEN</option>
                                                                            <option>PLTGEN</option>
                                                                            <option>PGEN</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="rrid">
                                                                        <label class="col-form-label">First Name</label>
                                                                        <input class="form-control" type="text" name="rfname" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Middle Name</label>
                                                                        <input class="form-control" type="text" name="rmname" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Last Name</label>
                                                                        <input class="form-control" type="text" name="rlname" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Email</label>
                                                                        <input class="form-control" type="text" name="remail" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Username</label>
                                                                        <input class="form-control" type="text" name="runame" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Password</label>
                                                                        <input class="form-control" type="Password" name="rpass" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Confirm Password</label>
                                                                        <input class="form-control" type="Password" name="rcpass" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pl-4">
                                                        <div class="col form-group">
                                                            <p class="text-center">By clicking Register, you agree to our Terms and that you have read our Policy.</p>
                                                            <button type="submit" name="regbutton" class="btn btn-primary form-control mt-3 pr-4 pl-4 mb-1">Register</button>
                                                           
                                                        </div>    
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-sm-4">
                                            <h3 class="pt-4">CIRAS</h3><br>
                                            <p class="text-justify">&emsp;Lorem ipsum dolor sit amet. Est nemo quia est esse molestias et galisum quas. Ab minma iure vel odit quibusdam qui perferendis repudiandae est sunt dolores ut pariatur labore aut ullam ratione et tempore provident. Et laborum odit id sunt consequatur eum asperiores voluptatem 33 velit atque ut velit voluptates est voluptas velit? Non nobis consectetur et earum tempore ut quisquam quaerat eum tenetur perferendis ex voluptate autem ut alias vero et voluptatibus Quis.</p>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     
                    <!-- tab end -->

    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>

</html>

<?php 
}else{
  
}
 ?>