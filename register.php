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
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/sweetalert2.min.css" rel="stylesheet" />


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
                            <h2 class="pageTitle">Register</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">

                <div class="container">

                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-4" style="background-color:black; height:650px; background-image:url('img/slides/1.jpg'); background-size:cover;box-shadow:0px 10px 10px 5px #ddd;">
                        </div>
                        <div class="col-md-4" style="border:1px solid #ddd; height:650px; box-shadow:10px 10px 10px 0px #ddd;">

                            <!-- Form itself -->
                            <form method="post" action="functions/register_func.php" enctype="multipart/form-data">
                                <h3>Create Account</h3>
                                <div class="control-group">
                                    <div class="controls">
                                        <label>Choose Your Display Picture</label>
                                        <input type="file" class="form-control" name="img" required/>
                                    </div>
                                </div> 
                                <br>
                                
                                <div class="control-group">
                                    <div class="controls">
                                        <label>Upload Your National ID Pictue</label>
                                        <input type="file" class="form-control" name="NID" required/>
                                    </div>
                                </div> 
                                <br>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" required/>
                                    </div>
                                </div> 
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" required/>
                                    </div>
                                </div> 

                                <br>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Password" name="pass" required/>
                                    </div>
                                </div> 	
                                <br>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" required/>
                                    </div>
                                </div> 	
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Number" name="number" required/>
                                    </div>
                                </div> 

                                <br>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Location" name="location" required/>
                                    </div>
                                </div> 

                                <br>



                                <br>
                                <input type="submit" class="btn btn-primary" value="Sign Up" style="width:389px;margin-left:-16px;margin-top:7px;" name="register">
                            </form>
                        </div>


                    </div>
                </div>

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

        <script src="contact/jqBootstrapValidation.js"></script>
        <script src="contact/contact_me.js"></script>
        <script src="js/sweetalert2.min.js"></script> 




        <script>



            <?php
            if(isset($_GET['error']))
            {

            ?>

            $(document).ready(function(){
                Swal.fire(
                    'Opps !',
                    'password and confirm password does not match !',
                    'error'
                )
            });

            <?php
            }

            ?>

            <?php
            if(isset($_GET['success']))
            {

            ?>

            $(document).ready(function(){
                Swal.fire(
                    'Success !',
                    'successfully registered',
                    'success'
                )
            });

            <?php
            }

            ?>

        </script>

    </body>
</html>