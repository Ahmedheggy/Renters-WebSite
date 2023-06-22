<?php
include('functions/conn.php');
$logged = "";
$logout = "";

if(isset($_SESSION['logged_id']))
{
    $img = $_SESSION['logged_img'];
    $name = $_SESSION['logged_name'];
    $logged = "<li><a href='profile.php'><span><img src='functions/users/$img' width='50' height='50' class='img-circle'></span> $name </a></li>";




}
else
{
    header('location:login.php?session_error=1');
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Products</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" />
        <!-- Vendor Styles -->
        <link href="css/magnific-popup.css" rel="stylesheet"> 
        <!-- Block Styles -->
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/gallery-1.css" rel="stylesheet">
        <link href="css/sweetalert2.min.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    </head>
    <style>

        body,html{
            height: 100%;
        }

        nav.sidebar, .main{
            -webkit-transition: margin 200ms ease-out;
            -moz-transition: margin 200ms ease-out;
            -o-transition: margin 200ms ease-out;
            transition: margin 200ms ease-out;
        }

        .main{
            padding: 10px 10px 0 10px;
        }

        @media (min-width: 765px) {

            .main{
                position: absolute;
                width: calc(100% - 40px); 
                margin-left: 40px;
                float: right;
            }

            nav.sidebar:hover + .main{
                margin-left: 200px;
            }

            nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
                margin-left: 0px;
            }

            nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
                text-align: center;
                width: 100%;
                margin-left: 0px;
            }

            nav.sidebar a{
                padding-right: 13px;
            }

            nav.sidebar .navbar-nav > li:first-child{
                border-top: 1px #e5e5e5 solid;
            }

            nav.sidebar .navbar-nav > li{
                border-bottom: 1px #e5e5e5 solid;
            }

            nav.sidebar .navbar-nav .open .dropdown-menu {
                position: static;
                float: none;
                width: auto;
                margin-top: 0;
                background-color: transparent;
                border: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
                padding: 0 0px 0 0px;
            }

            .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
                color: #777;
            }

            nav.sidebar{
                width: 200px;
                height: 100%;
                margin-left: -160px;
                float: left;
                margin-bottom: 0px;
            }

            nav.sidebar li {
                width: 100%;
            }

            nav.sidebar:hover{
                margin-left: 0px;
            }

            .forAnimate{
                opacity: 0;
            }
        }

        @media (min-width: 1330px) {

            .main{
                width: calc(100% - 200px);
                margin-left: 200px;
            }

            nav.sidebar{
                margin-left: 0px;
                float: left;
            }

            nav.sidebar .forAnimate{
                opacity: 1;
            }
        }

        nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
            color: #CCC;
            background-color: transparent;
        }

        nav:hover .forAnimate{
            opacity: 1;
        }
        section{
            padding-left: 15px;
        }


    </style>

    <body>
        <div id="wrapper">

            <!-- start header -->
            <header>
                <div class="navbar navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php" style="color:#ff5733"><img src="img/logo.png" width="170" style="margin-top:-15px;"></a>
                        </div>
                        <div class="navbar-collapse collapse ">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li> 
                                <li><a href="about.php">About Us</a></li>

                                <li><a href="products.php">Products</a></li>
                                <?php echo $logged; ?>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header><!-- end header -->
            <section id="inner-headline">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="pageTitle">Products</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <div class="container">


                </div>
            </section>	

            <nav class="navbar navbar-default sidebar" role="navigation" style="height:1000px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>      
                    </div>
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav" style="color:black;">
                            <li class="active" style="color:white;background-color:#ff5733;"><a style="color:white;" href="javasvript:void(0);">Categories<span style="font-size:17px;" class="pull-right hidden-xs showopacity fa fa-list"></span></a></li>

                            <?php
                            $sql = "select * from categories";
                            $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
                            while($row = $result->fetch_assoc()):
                            {


                            ?>

                            <li ><a href="products.php?cat_id=<?php echo $row['id'] ?>" style="color:black;"><?php echo $row['cat_title'] ?><span style="font-size:16px;" class="pull-right hidden-xs showopacity "></span></a></li>        
                            <?php
                            }
                            endwhile;
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Start Gallery 1-2 -->
            <section id="gallery-1" class="content-block section-wrapper gallery-1">
                <div class="container-fluid">


                    <div class="row">

                        <?php
                        if(isset($_GET['cat_id']))
                        {


                            $sql = "select * from products where cat_id = '$_GET[cat_id]'";
                            $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

                            $count = $result->num_rows;

                            if($count > 0)
                            {
                                while($row = $result->fetch_assoc()):
                                {



                        ?>


                        <div class="col-md-3">
                            <div class="box-content">
                                <img src="dashboard/functions/products/<?php echo $row['img']; ?>" alt="" width="260" height="220">   
                                <h3><?php echo $row['title']; ?><span style="float:right"><?php echo $row['price']; ?> EGP</span> </h3>
                                <strong>Short Desc</strong>  
                                <p style="width:220px;height:80px;" >

                                    <?php echo mb_strimwidth($row['desc'], 0, 100,' ...'); ?>
                                </p>
                                <center>
                                    <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" style="width:260px;">View Details</a>
                                </center>

                            </div>
                        </div>
                        <?php
                                }
                                endwhile;
                            }

                            else
                            {
                                echo "<h2 style='text-align:center;'>Still No Products Added In This Category</h2>";
                            }


                        }

                        else
                        {



                            $sql = "select * from products";
                            $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

                            $count = $result->num_rows;

                            if($count > 0)
                            {
                                while($row = $result->fetch_assoc()):
                                {



                        ?>


                        <div class="col-md-3">
                            <div class="box-content">
                                <img src="dashboard/functions/products/<?php echo $row['img']; ?>" alt="" width="260" height="250">   
                                <h3><?php echo $row['title']; ?><span style="float:right"><?php echo $row['price']; ?> EGP</span> </h3>
                                <strong>Description</strong>  
                                <p style="width:220px;height:80px;" >

                                    <?php echo mb_strimwidth($row['desc'], 0, 100,' ...'); ?>
                                </p>
                                <center>
                                    <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" style="width:260px;">View Details</a>
                                </center>

                            </div>
                        </div>
                        <?php
                                }
                                endwhile;
                            }

                            else
                            {
                                echo "<h2 style='text-align:center;'>Still No Products Added</h2>";
                            }
                        }
                        ?>


                        <!-- /.isotope-gallery-container -->
                    </div>
                    <!-- /.row --> 
                    <!-- /.container -->
                </div>
            </section>
            <!--// End Gallery 1-2 -->  
        </div>

        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>
                                <span>&copy; Renters 2023 All right reserved. 
                                    </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="social-network">
                            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    <!-- javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>  
    <script src="js/jquery.flexslider.js"></script>
    <!-- Vendor Scripts -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/sweetalert2.min.js"></script> 


    </body>
</html>