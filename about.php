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



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="http://webthemez.com" />
        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    </head>
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
                            <h2 class="pageTitle">About Us</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">
                <section class="section-padding">
                    <div class="container">
                        <div class="row showcase-section">
                            <div class="col-md-6">
                                <img src="img/dev1.png" alt="showcase image" width="500">
                            </div>
                            <div class="col-md-6">
                                <div class="about-text">
                                    <h3>Who We Are ?</h3>
                                    <p>
                                       
                                        Do you want to save your time and money and get the best guaranteed prices on renting all the products you need, whether in your home or business?
                                        Renters is the best online renting platform in Egypt.
                                        <br><br>
                                        <h4> What’s new …?</h4>
                                        Special offers & hot deals provided, rent 6 months will get 1 month free and 1 year will get 2 months free. The free shipping service & possibility of canceling the renting at any time with partially refund to your money calculated according to the period of the renting just in case you rent something and finish using it before the renting period ends.

                                        <br><br>
                                        <b>Business objectives:</b>
                                        <br><br>
                                   
                                    
                                      <ul class="withArrow">
                                        <li><span class="fa fa-angle-right"></span>Being profitable.</li>
                                        <li><span class="fa fa-angle-right"></span>Build a huge user base in the first year.</li>
                                        <li><span class="fa fa-angle-right"></span>Build trust between the application and the users.</li>
                                        <li><span class="fa fa-angle-right"></span>Become recognized.</li>
                                        <li><span class="fa fa-angle-right"></span>expand our listings and reduce our prices to higher our position relative to other applications or website that offers this kind of service.</li>

                                    </ul>

                                    </p>

                            </div>
                        </div>
                    </div>
                    </div>
            </section>

            </section>
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
        <script src="js/animate.js"></script>
        <!-- Vendor Scripts -->
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>