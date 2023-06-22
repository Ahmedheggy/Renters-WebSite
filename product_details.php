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
        <title>Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
        <link href="css/flexslider.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/sweetalert2.min.css" rel="stylesheet" />


    </head>


    <style>

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-default:focus,
        .btn-default.focus {
            color: #333;
            background-color: #e6e6e6;
            border-color: #8c8c8c;
        }
        .btn-default:hover {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }
        .btn-default:active:hover,
        .btn-default.active:hover,
        .open > .dropdown-toggle.btn-default:hover,
        .btn-default:active:focus,
        .btn-default.active:focus,
        .open > .dropdown-toggle.btn-default:focus,
        .btn-default:active.focus,
        .btn-default.active.focus,
        .open > .dropdown-toggle.btn-default.focus {
            color: #333;
            background-color: #d4d4d4;
            border-color: #8c8c8c;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            background-image: none;
        }
        .btn-default.disabled:hover,
        .btn-default[disabled]:hover,
        fieldset[disabled] .btn-default:hover,
        .btn-default.disabled:focus,
        .btn-default[disabled]:focus,
        fieldset[disabled] .btn-default:focus,
        .btn-default.disabled.focus,
        .btn-default[disabled].focus,
        fieldset[disabled] .btn-default.focus {
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-default .badge {
            color: #fff;
            background-color: #333;
        }

        .hide-bullets {
            list-style:none;
            margin-left: -40px;
            margin-top:20px;
        }

        .thumbnail {
            padding: 0;
        }

        .carousel-inner>.item>img, .carousel-inner>.item>a>img {
            width: 100%;
        }

    </style>
    <body>

        <div id="myModalView" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Select Payment Method</h4>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="functions/request.php">

                            <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
                            <select class="form-control" id="PaymentMethod" name="method">
                                <option value="" selected disabled>Select Payment Method</option>
                                <option value="1">Cash</option>
                                <option value="2">Visa</option>

                            </select>
                            <br>
                            <div id="visa_div">
                                <input type="text" class="form-control" name="name" placeholder="Card Holder Name">
                                <br>
                                <input type="number" class="form-control"  name="number" placeholder="Card Number">
                                <br>
                                <input type="date" class="form-control" name="exp_date" placeholder="Exp Date">
                                <p>exp date ex : 15/10/2026</p>
                                <br>
                                <input type="number" class="form-control"  name="cvv" placeholder="CVV">
                                <br>
                            </div>
                                  <div>
                    <label for="renting_time">Renting Time (in months):</label>
                    <select class="form-control" id="rentime" name="renting_time">
                         <form method="post" action="functions/request.php">
                        <option value="" selected disabled>Select Renting Time</option>
                        <option value="1">1 Day</option>
                        <option value="7">7 Days</option>
                        <option value="11">1 Month</option>
                        <option value="3">3 Months</option>
                        <option value="6">6 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                    <br>
                </div>

                                        <div>
                    <label for="shipping">Shipping:</label>
                    <select class="form-control" id="shipping" name="shipping">
                         <form method="post" action="functions/request.php">
                        <option value="" selected disabled>Select Shipping Company</option>
                       <option value="x">Aramex</option>
                        <option value="y">UPS</option>
                        <option value="z">Fedex</option>
                    </select>
                    <br>
                </div>

                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="pay" class="btn btn-primary" value="Rent">
                        </div>

                        </form>

                </div>
            </div>

        </div>
        </div>

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
                        <h2 class="pageTitle">Product Details</h2>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">

            <section class="section-padding gray-bg">
                <div class="container"> 
                    <div class="row">

                        <?php

                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $_SESSION['designer_id'] = $_GET['id'];

                            $sql = "select * from products where id = '$id'";
                            $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));

                            $row = $result->fetch_assoc();

                        }

                        ?>
                        <div class="col-md-6 col-sm-6">
                            <div class="">
                                <img src="dashboard/functions/products/<?php echo $row['img'] ?>" alt="About Images" width="500" height="400">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="about-text">




                                <ul class="withArrow">
                                    <li><span class="fa fa-angle-right"></span>Title : <?php echo $row['title']; ?></li>
                                    <li><span class="fa fa-angle-right"></span>Price : <?php echo $row['price']; ?> EGP</li>
                                </ul> 

                                <h2>Description</h2>
                                <p style="white-space:pre;"><?php echo $row['desc']; ?></p>
                                <a href="product_details.php?id=<?php echo $row['id']; ?>&offer=1" class="btn btn-primary" style="width:200px;">Rent Now</a>

                            </div>
                        </div>

                    </div>


                    <br>
                    <br>
                    <br>

                    <div class="col-md-12">
                        <h2>Owner Reviews</h2>
                        <div class="col-md-10">
                            <form method="post" action="functions/review_func.php" id="review_form">
                                <input type="hidden" name="designer_id" value="<?php echo $_SESSION['designer_id']; ?>">

                                <div class="form-group col-md-8" id="rating-ability-wrapper">
                                    <label class="control-label" for="rating">
                                        <span class="field-label-info"></span>
                                        <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                    </label>
                                    <h2 class="bold rating-header" style="">
                                        <span class="selected-rating">0</span><small> / 5</small>
                                    </h2>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>

                                    <br>
                                    <br>
                                    <br>
                                    <textarea class="form-control" name="review" cols="50" rows="5" placeholder="Give Your Feedback ..." style="white-space:pre;"></textarea>
                                    <br>
                                    <br>
                                    <input type="submit" name="add" value="add comment" class="btn btn-primary pull-right">
                                </div>



                            </form>

                            <div class="col-md-12" id="output"></div>
                            <div class="col-md-12" style="height:50px;"></div>

                            <div class="col-md-12">


                                <?php
                                if(isset($_GET['id']))
                                {
                                    $designer_id = $_GET['id'];

                                    $sql = "select * from review where designer_id = '$designer_id' ORDER BY id DESC ";
                                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));

                                    while($row = $result->fetch_assoc()):
                                    {




                                ?>

                                <div class="container">

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="functions/users/<?php echo $row['u_image'] ?>">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-5">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">

                                                    <strong><?php echo $row['u_name'] ?></strong><br><span class="text-muted"><?php echo date('h:i:s a d/m/Y' , strtotime($row['time'])); ?></span>
                                                    <span style="float:right; margin-right:-10px; margin-top:-20px;"><?php
                                        for ($i = 1; $i <= 5; $i++) 
                                        {
                                            $ratingClass = "btn-default btn-grey";
                                            if($i <= $row['rating_num']) 
                                            {
                                                $ratingClass = "btn-warning";
                                            }
                                                        ?>
                                                        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" style="padding:5px 10px;">
                                                            <span class="fa fa-star" aria-hidden="true"></span>
                                                        </button>
                                                        <?php
                                        } 
                                                        ?></span>
                                                </div>
                                                <div class="panel-body">
                                                    <?php echo $row['comment']; ?>
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->


                                    </div><!-- /row -->

                                </div><!-- /container -->

                                <?php
                                    }
                                    endwhile;
                                }
                                ?>



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
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    <!-- javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jqueryyyyyyy.js"></script>
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

        $(document).ready(function($){
            $('#visa_div').hide();
            $(".btnrating").on('click',(function(e) {

                var previous_value = $("#selected_rating").val();

                var selected_value = $(this).attr("data-attr");
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-"+i).toggleClass('btn-warning');
                    $("#rating-star-"+i).toggleClass('btn-default');
                }

                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-"+ix).toggleClass('btn-warning');
                    $("#rating-star-"+ix).toggleClass('btn-default');
                }

            }));




            $('#PaymentMethod').change(function(){

                var method = $(this).val();
                if(method == 1)
                {
                    $('#visa_div').slideUp();

                }
                else
                {
                    $('#visa_div').slideDown();

                }
            });


        });


    </script>



    <script>

        $(function(){


            $('#review_form').ajaxForm({
                success:function(data){
                    $('#output').html(data);
                    $("#review_form")[0].reset();
                    window.setTimeout(function(){window.location.reload()},3000)

                }
            });
        });  

    </script>

    <script>
        $(document).ready(function($) {

            $('#myCarousel').carousel({
                interval: 5000
            });

            //Handles the carousel thumbnails
            $('[id^=carousel-selector-]').click(function () {
                var id_selector = $(this).attr("id");
                try {
                    var id = /-(\d+)$/.exec(id_selector)[1];
                    console.log(id_selector, id);
                    jQuery('#myCarousel').carousel(parseInt(id));
                } catch (e) {
                    console.log('Regex failed!', e);
                }
            });
            // When the carousel slides, auto update the text
            $('#myCarousel').on('slid.bs.carousel', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
            });
        });

    </script>



    <?php
    if(isset($_GET['offer']))
    {
    ?>
    <script>
        $(document).ready(function(){
            $('#myModalView').modal('show');
        })

    </script>
    <?php
    }
    ?>


    </body>
</html>