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
        <title>Renters</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" /> 
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/sweetalert2.min.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    </head>
    <style>

        .holderCircle { width: 500px; height: 500px; border-radius: 100%; margin: 60px auto; position: relative; }


        .dotCircle { width: 100%; height: 100%; position: absolute; margin: auto; top: 0; left: 0; right: 0; bottom: 0; border-radius: 100%; z-index: 20; }
        .dotCircle  .itemDot { display: block; width: 80px; height: 80px; position: absolute; background: #ffffff; color: #ff5733; border-radius: 20px; text-align: center; line-height: 80px; font-size: 30px; z-index: 3; cursor: pointer; border: 2px solid #e6e6e6; }
        .dotCircle  .itemDot .forActive { width: 56px; height: 56px; position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: none; }
        .dotCircle  .itemDot .forActive::after { content: ''; width: 5px; height: 5px; border: 3px solid #ff5733; bottom: -31px; left: -14px; filter: blur(1px); position: absolute; border-radius: 100%; }
        .dotCircle  .itemDot .forActive::before { content: ''; width: 6px; height: 6px; filter: blur(5px); top: -15px; position: absolute; transform: rotate(-45deg); border: 6px solid #ff5733; right: -39px; }
        .dotCircle  .itemDot.active .forActive { display: block; }
        .round { position: absolute; left: 40px; top: 45px; width: 410px; height: 410px; border: 2px dotted #ff5733; border-radius: 100%; -webkit-animation: rotation 100s infinite linear; }
        .dotCircle .itemDot:hover, .dotCircle .itemDot.active { color: #ffffff; transition: 0.5s;   /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ff5733+0,a733bb+100 */ background: #ff5733; /* Old browsers */ background: -moz-linear-gradient(left, #ff5733 0%, #a733bb 100%); /* FF3.6-15 */ background: -webkit-linear-gradient(left, #ff5733 0%, #a733bb 100%); /* Chrome10-25,Safari5.1-6 */ background: linear-gradient(to right, #ff5733 0%, #ff5733 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */ filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5733', endColorstr='#ff5733', GradientType=1); /* IE6-9 */ border: 2px solid #ffffff; -webkit-box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13); -moz-box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13); box-shadow: 0 30px 30px 0 rgba(0, 0, 0, .13); }
        .dotCircle .itemDot { font-size: 40px; }
        .contentCircle { width: 250px; border-radius: 100%; color: #222222; position: relative; top: 150px; left: 50%; transform: translate(-50%, -50%); }
        .contentCircle .CirItem { border-radius: 100%; color: #222222; position: absolute; text-align: center; bottom: 0; left: 0; opacity: 0; transform: scale(0); transition: 0.5s; font-size: 15px; width: 100%; height: 100%; top: 0; right: 0; margin: auto; line-height: 250px; }
        .CirItem.active { z-index: 1; opacity: 1; transform: scale(1); transition: 0.5s; }
        .contentCircle .CirItem i { font-size: 180px; position: absolute; top: 0; left: 50%; margin-left: -90px; color: #000000; opacity: 0.1; }
        @media only screen and (min-width:300px) and (max-width:599px) {
            .holderCircle {/* width: 300px; height: 300px;*/ margin: 110px auto; }
            .holderCircle::after { width: 100%; height: 100%; }
            .dotCircle { width: 100%; height: 100%; top: 0; right: 0; bottom: 0; left: 0; margin: auto; }
        }
        @media only screen and (min-width:600px) and (max-width:767px) { }
        @media only screen and (min-width:768px) and (max-width:991px) { }
        @media only screen and (min-width:992px) and (max-width:1199px) { }
        @media only screen and (min-width:1200px) and (max-width:1499px) { }
        .title-box .title { font-weight: 600; letter-spacing: 2px; position: relative; z-index: -1; }
        .title-box span { text-shadow: 0 10px 10px rgba(0, 0, 0, .15); font-weight: 800; color: #ff5733; }
        .title-box p {font-size: 17px; line-height: 2em; }

        /* The controlsy */
        .carousel-control {
            left: -12px;
            height: 40px;
            width: 40px;
            background: none repeat scroll 0 0 #222222;
            border: 4px solid #FFFFFF;
            border-radius: 23px 23px 23px 23px;
            margin-top: 90px;
        }
        .carousel-control.right {
            right: -12px;
        }
        /* The indicators */
        .carousel-indicators {
            right: 50%;
            top: auto;
            bottom: -10px;
            margin-right: -19px;
        }
        /* The colour of the indicators */
        .carousel-indicators li {
            background: #cecece;
        }
        .carousel-indicators .active {
            background: #428bca;
        }
    </style>
    <body>



        <div id="wrapper" class="home-page">

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
                            <a class="navbar-brand" href="index.php" style="color:#ff5733"><img src="img/logo.png" width="200" style="margin-top:-15px;"></a>
                        </div>
                        <div class="navbar-collapse collapse">
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
            </header>
            <!-- end header -->
            <section id="banner">

                <!-- Slider -->
                <div id="main-slider" class="flexslider ">
                    <ul class="slides">
                        <li>
                            <img src="img/slides/1.jpg" alt="" height="900px;"/>
                            <div class="flex-caption text-center" style="margin-top:-500px;">
                                <h3 style="text-align:center;margin-top:-100px;">Everything Can Be Rented</h3> 
                                <p style="text-align:center;margin-top:-100px;">With Easy Way</p> 

                            </div>
                        </li>
                        <li>
                            <img src="img/slides/2.jpg" alt="" height="900px;"/>
                            <div class="flex-caption" style="margin-top:-100px;">
                                <h3 style="text-align:center;margin-top:-100px;">Offer Your Products Here</h3> 
                                <p style="text-align:center;margin-top:-100px;">Punsh Of categories</p> 

                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end slider -->

            </section> 
            <section id="call-to-action-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-sm-9" >
                            <h3 style="color:white">Renters</h3>
                            <p style="color:white">Why you purchase something whether in your home or business while you can rent it with affordable prices and save your money?
                                The application is introducing an online renting platform locally in Egypt called: Renters.
                                You can rent anything such as laptops, monitors, home supplies, photography supplies, printers, scanners, and anything you need in your daily life. Also, it offers a good opportunity for making money if you have something that you didn’t use & publishing it for rent or a service you can provide.

                            </p>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <a href="about.php" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </section>

            <br>
            <br>
            <br>
            <section class="iq-features">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aligncenter"><h2 class="aligncenter">How It Works</h2></div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-12"></div>
                            <div class="col-lg-6 col-md-12">
                                <div class="holderCircle">
                                    <div class="round"></div>
                                    <div class="dotCircle">
                                        <span class="itemDot active itemDot1" data-tab="1">
                                            <i class="fa fa-user"></i>
                                            <span class="forActive"></span>
                                        </span>
                                        <span class="itemDot itemDot2" data-tab="2">
                                            <i class="fa fa-list-alt"></i>
                                            <span class="forActive"></span>
                                        </span>
                                        <span class="itemDot itemDot3" data-tab="3">
                                            <i class="fa fa-tags"></i>
                                            <span class="forActive"></span>
                                        </span>
                                        <span class="itemDot itemDot4" data-tab="4">
                                            <i class="fa fa-map-marker"></i>
                                            <span class="forActive"></span>
                                        </span>

                                    </div>
                                    <div class="contentCircle">
                                        <div class="CirItem title-box active CirItem1">
                                            <h2 class="title"><span>Create Account</span></h2>
                                            <p>First You Have To Create Account To Be Able To Use Our Services And To Be always Updated By Our Offers.</p>
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="CirItem title-box CirItem2">
                                            <h2 class="title"><span>Select Products Category </span></h2>
                                            <p>Select Category Will Help Us To Filtering You The Products That You Will Rent</p>
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <div class="CirItem title-box CirItem3">
                                            <h2 class="title"><span>Check Product</span></h2>
                                            <p>Check Product Details And See Previous Reviews Before Taking Any Action</p>
                                            <i class="fa fa-tags"></i>
                                        </div>
                                        <div class="CirItem title-box CirItem4">
                                            <h2 class="title"><span>Track Your Requests</span></h2>
                                            <p>It is a long established fact that a reader will be distracted by the readable content check Your Profile And Track Your Requests</p>
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12"></div>
                        </div>
                    </div>
                    </section>



                <section class="section-padding gray-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h2>What We Offer ?</h2>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="about-text">
                                    <h3>Renting With Easy Way</h3>

                                    <ul class="withArrow">
                                      
                                        <li><span class="fa fa-angle-right"></span>Choose From Punch Of Categories.</li>
                                        <li><span class="fa fa-angle-right"></span>See Previous Reviews Of Owner And Product.</li>
                                        <li><span class="fa fa-angle-right"></span>We Will Deliver The Product To Your Home.</li>
                                        <li><span class="fa fa-angle-right"></span>Variety In Payment Methods.</li>
                                        <li><span class="fa fa-angle-right"></span>call our representative in case of need.</li>

                                    </ul>
                                    <a href="products.php" class="btn btn-primary">View Products</a>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="about-image">
                                    <img src="img/about.png" alt="About Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>	 



                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2>Our Best Renting Products</h2>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="Carousel" class="carousel slide">

                                <ol class="carousel-indicators">
                                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#Carousel" data-slide-to="1"></li>
                                </ol>

                                <!-- Carousel items -->
                                <div class="carousel-inner">

                                    <div class="item active">
                                        <div class="row">
                                            <?php
                                            $sql = "SELECT COUNT(requests.id) as RentingCount, products.id, products.img, products.title, products.price FROM requests INNER JOIN products on products.id = requests.product_id GROUP BY products.id, products.img, products.title, products.price
                                            order by COUNT(requests.id) desc
                                            limit 3";
                                            $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

                                            while($row = $result->fetch_assoc()):
                                            {

                                            ?>

                                            <div class="col-md-4"><a href="product_details.php?id=<?php echo $row['id'] ?>" class="thumbnail"><img src="dashboard/functions/products/<?php echo $row['img'] ?>" alt="Image" style="max-width:100%;height:250px"></a></div>


                                            <?php
                                            }
                                            endwhile;
                                            ?>


                                        </div><!--.row-->
                                    </div><!--.item-->




                                    <div class="item">
                                        <div class="row">
                                            <?php
                                            $sql = "SELECT COUNT(requests.id) as RentingCount, products.id, products.img, products.title, products.price FROM requests INNER JOIN products on products.id = requests.product_id GROUP BY products.id, products.img, products.title, products.price
                                            order by COUNT(requests.id) desc
                                            limit 3";
                                            $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

                                            while($row = $result->fetch_assoc()):
                                            {

                                            ?>

                                            <div class="col-md-4"><a href="product_details.php?id=<?php echo $row['id'] ?>" class="thumbnail"><img src="dashboard/functions/products/<?php echo $row['img'] ?>" alt="Image" style="max-width:100%;height:250px"></a></div>


                                            <?php
                                            }
                                            endwhile;
                                            ?>


                                        </div><!--.row-->
                                    </div><!--.item-->





                                </div><!--.carousel-inner-->
                                <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                                <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                            </div><!--.Carousel-->

                        </div>
                    </div>
                </div><!--.container-->



                <section id="content-3-10" class="content-block data-section nopad content-3-10">
                    <div class="image-container col-sm-6 col-xs-12 pull-left">
                        <div class="background-image-holder">

                        </div>
                    </div>


                </section>

                <div class="about home-about">
                    <div class="container">

                        <div class="row">





                        </div>



                        <br>

                    </div>

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
            <script src="js/animate.js"></script>
            <!-- Vendor Scripts -->
            <script src="js/modernizr.custom.js"></script>
            <script src="js/jquery.isotope.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/animate.js"></script>
            <script src="js/custom.js"></script> 
            <script src="js/sweetalert2.min.js"></script> 




            <script>

                <?php
                if(isset($_GET['login_error']))
                {

                ?>

                $(document).ready(function(){
                    Swal.fire(
                        'Warning !',
                        'You Have To login first',
                        'warning'
                    )
                });

                <?php
                }

                ?>

            </script>
            <script>


                let i=2;


                $(document).ready(function(){
                    $(document).ready(function() {
                        $('#Carousel').carousel({
                            interval: 5000
                        })
                    });

                    var radius = 200;
                    var fields = $('.itemDot');
                    var container = $('.dotCircle');
                    var width = container.width();
                    radius = width/2.5;

                    var height = container.height();
                    var angle = 0, step = (2*Math.PI) / fields.length;
                    fields.each(function() {
                        var x = Math.round(width/2 + radius * Math.cos(angle) - $(this).width()/2);
                        var y = Math.round(height/2 + radius * Math.sin(angle) - $(this).height()/2);
                        if(window.console) {
                            console.log($(this).text(), x, y);
                        }

                        $(this).css({
                            left: x + 'px',
                            top: y + 'px'
                        });
                        angle += step;
                    });


                    $('.itemDot').click(function(){

                        var dataTab= $(this).data("tab");
                        $('.itemDot').removeClass('active');
                        $(this).addClass('active');
                        $('.CirItem').removeClass('active');
                        $( '.CirItem'+ dataTab).addClass('active');
                        i=dataTab;

                        $('.dotCircle').css({
                            "transform":"rotate("+(360-(i-1)*36)+"deg)",
                            "transition":"2s"
                        });
                        $('.itemDot').css({
                            "transform":"rotate("+((i-1)*36)+"deg)",
                            "transition":"1s"
                        });


                    });

                    setInterval(function(){
                        var dataTab= $('.itemDot.active').data("tab");
                        if(dataTab>6||i>6){
                            dataTab=1;
                            i=1;
                        }
                        $('.itemDot').removeClass('active');
                        $('[data-tab="'+i+'"]').addClass('active');
                        $('.CirItem').removeClass('active');
                        $( '.CirItem'+i).addClass('active');
                        i++;


                        $('.dotCircle').css({
                            "transform":"rotate("+(360-(i-2)*36)+"deg)",
                            "transition":"2s"
                        });
                        $('.itemDot').css({
                            "transform":"rotate("+((i-2)*36)+"deg)",
                            "transition":"1s"
                        });

                    }, 5000);

                });



            </script>


            </body>
        </html>