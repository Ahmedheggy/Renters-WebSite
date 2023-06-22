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


$sql = "select * from users where id = '$_SESSION[logged_id]'";
$result = $DB->query($sql);

$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="http://webthemez.com" />
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
    <body>

        <div id="myModalAdd" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Products</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="functions/add_product.php" enctype="multipart/form-data">
                            <input type="file" name="img" class="form-control" required>
                            <br>
                            <input type="text" name="title" placeholder="Title" class="form-control" required>
                            <br>
                            <input type="number" name="price" placeholder="Price" class="form-control" required>
                            <br>
                            <select name="category" class="form-control" required>
                                <option value="">Select Product Category</option>

                                <?php
                                $sqlCat = "select * from categories";
                                $resultCat = $DB->query($sqlCat) or die ("failed to query".mysqli_error($DB));
                                while($rowCat = $resultCat->fetch_assoc()):
                                {


                                ?>


                                <option value="<?php echo $rowCat['id'] ?>"><?php echo $rowCat['cat_title'] ?></option>

                                <?php
                                }
                                endwhile;
                                ?>
                            </select>
                            <br>
                            <textarea name="desc" rows="5" cols="50" placeholder="Description" class="form-control" required></textarea>




                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="add" value="Add Product" class="btn btn-success">

                            </form>
                    </div>
                </div>

            </div>
        </div>



        <div id="myModalView" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View Products</h4>
                    </div>
                    <div class="modal-body">


                        <table class="table table-striped table-condensed">
                            <thead>

                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>                                          
                                    <th>Requests</th>                                          
                                    <th>Action</th>                                          
                                </tr>

                            </thead>   
                            <tbody>
                                <?php


                                $sqlProduct = "select *,products.id,categories.cat_title from products
                                inner join categories on categories.id = products.cat_id
                                where owner_id = '$_SESSION[logged_id]'";
                                $resultProduct = $DB->query($sqlProduct) or die ("failed to query".mysqli_error($DB));

                                $count = $resultProduct->num_rows;

                                if($count > 0)
                                {
                                    while($rowProduct = $resultProduct->fetch_assoc()):
                                    {

                                ?>

                                <tr>
                                    <td><img src="dashboard/functions/products/<?php echo $rowProduct['img'] ?>" width="70"></td>
                                    <td><?php echo $rowProduct['title'] ?></td>
                                    <td><?php echo $rowProduct['price'] ?> EGP</td>
                                    <td><?php echo $rowProduct['cat_title'] ?></td>
                                  
                                    <td><a href="profile.php?product_id=<?php echo $rowProduct['id'] ?>">View Requests</a></td>
                                    <td><a href="functions/delete_product.php?id=<?php echo $rowProduct['id'] ?>">X</a></td>

                                </tr>

                                <?php
                                    }
                                    endwhile;
                                }
                                ?>


                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>



        <div id="myModalRequests" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">View Products Requests</h4>
                    </div>
                    <div class="modal-body">


                        <table class="table table-striped table-condensed">
                            <thead>

                                <tr>
                       
                                    <th>Renter Image</th>
                                    <th>Renter Name</th>
                                    <th>Request Date</th>                                          
                                    <th>Payment Method</th>                                          
                                    <th>Status</th>                                          
                                </tr>

                            </thead>   
                            <tbody>
                                <?php
                                $sqlRequets = "SELECT requests.id, requests.date, requests.status, requests.payment_method, users.name, users.img as user_img, requests.rentime, requests.shipping FROM requests INNER JOIN users on users.id = requests.user_id WHERE requests.product_id = '$_GET[product_id]'";
                                $resultRequests = $DB->query($sqlRequets) or die("failed to query".mysqli_error($DB));
                                while($rowRequests = $resultRequests->fetch_assoc()):
                                {

                                ?>

                                <tr>
                                    
                                    <td><img src="functions/users/<?php echo $rowRequests['user_img'] ?>" width="70"></td>
                                    <td><?php echo $rowRequests['name'] ?></td>
                                    <td><?php echo date('d/m/Y h:i:s a',strtotime($rowRequests['date']))  ?></td>
                                    <td><?php echo ($rowRequests['payment_method'] == "1" ? "Cash" : "Visa") ?></td>
                                    <td><?php echo $rowRequests['status'] ?></td>
                                     <td><?php echo $rowRequests['rentime'] ?></td>
                                    <td><?php echo $rowRequests['shipping'] ?></td>

                                </tr>

                                <?php
                                }
                                endwhile;
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
                            <h2 class="pageTitle">User Profile</h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content">

                <div class="container">

                    <div class="about">


                        <div class="row">

                            <div class="container">
                                <div class="row">

                                    <div class="col-md-5" >


                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><?php echo $row['name']; ?></h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="functions/users/<?php echo $row['img'] ?>" class="img-rounded img-responsive"> </div>

                                                    <div class=" col-md-9 col-lg-9 "> 
                                                        <table class="table table-user-information">
                                                            <tbody>
                                                                <tr>
                                                                    <td>User Name:</td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                </tr>

                                                                <td>Home Address</td>
                                                                <td><?php echo $row['location']; ?></td>
                                                            </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><a href="javascript:void(0)"><?php echo $row['email']; ?></a></td>
                                                        </tr>
                                                        <td>Phone Number</td>
                                                        <td><?php echo $row['number']; ?>
                                                        </td>

                                                        </tr>

                                                    </tbody>
                                                </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer" style="height:80px;">
                                    <a href="profile.php?add=1" class="btn btn-primary">Add Products</a>
                                    <a href="profile.php?view=1" class="btn btn-primary">View My Products</a>

                                </div>


                            </div>
                        </div>


                        <div class="col-md-6">
                            <h3>Product Requests</h3>

                            <table class="table table-striped table-condensed">
                                <thead>

                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Title</th>
                                        <th>Product Price</th>
                                        <th>Owner Image</th>
                                        <th>Owner Name</th>
                                        <th>Date</th>                                          
                                        <th>Payment Method</th>                                          
                                        <th>Status</th>
                                        <th>Renting Time</th> 
                                          <th>Shipping Company</th>                                                                                   
                                    </tr>

                                </thead>   
                                <tbody>
                                    <?php
                                    $sqlRequets = "SELECT requests.id, requests.date, requests.status, requests.payment_method, products.img as prod_img, products.title, products.price, users.name, users.img as user_img, requests.rentime, requests.shipping FROM requests INNER JOIN products on products.id = requests.product_id INNER JOIN users on users.id = products.owner_id WHERE requests.user_id = '$_SESSION[logged_id]'";
                                    $resultRequests = $DB->query($sqlRequets) or die("failed to query".mysqli_error($DB));
                                    while($rowRequests = $resultRequests->fetch_assoc()):
                                    {

                                    ?>

                                    <tr>
                                        <td><img src="dashboard/functions/products/<?php echo $rowRequests['prod_img'] ?>" width="70"></td>
                                        <td><?php echo $rowRequests['title'] ?></td>
                                        <td><?php echo $rowRequests['price'] ?></td>
                                        <td><img src="functions/users/<?php echo $rowRequests['user_img'] ?>" width="70"></td>
                                        <td><?php echo $rowRequests['name'] ?></td>
                                        <td><?php echo date('d/m/Y h:i:s a',strtotime($rowRequests['date']))  ?></td>
                                        <td><?php echo ($rowRequests['payment_method'] == "1" ? "Cash" : "Visa") ?></td>
                                        <td><?php echo $rowRequests['status'] ?></td>
                                        <td><?php echo $rowRequests['rentime'] ?></td>
                                        <td><?php echo $rowRequests['shipping'] ?></td>
                                        
                                    </tr>

                                    <?php
                                    }
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>





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

<?php
if(isset($_GET['add']))
{
?>
<script>
    $(document).ready(function(){
        $('#myModalAdd').modal('show');
    })

</script>
<?php
}
?>

<?php
if(isset($_GET['view']))
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

<?php
if(isset($_GET['offers']))
{
?>
<script>
    $(document).ready(function(){
        $('#myModalOffers').modal('show');
    })

</script>
<?php
}
?>



<?php
if(isset($_GET['product_id']))
{
?>
<script>
    $(document).ready(function(){
        $('#myModalRequests').modal('show');
    })

</script>
<?php
}
?>




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
    if(isset($_GET['added']))
    {

    ?>

    $(document).ready(function(){
        Swal.fire(
            'Success !',
            'product successfully added',
            'success'
        )
    });

    <?php
    }

    ?>


    <?php
    if(isset($_GET['delete']))
    {

    ?>

    $(document).ready(function(){
        Swal.fire(
            'Success !',
            'Product Was Successfully Deleted',
            'success'
        )
    });

    <?php
    }

    ?>



    <?php
    if(isset($_GET['requested']))
    {

    ?>

    $(document).ready(function(){
        Swal.fire(
            'Success !',
            'Successfully Requested',
            'success'
        )
    });

    <?php
    }

    ?>




</script>





</body>
</html>