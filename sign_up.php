<?php
include "includes/classes/category_search.php";
$cat = new category();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>Home Page</title>
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/jquery-3.3.1.slim.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- FONTAWESOME STYLES-->
    <link href="bootstrap/assets/css/font-awesome.css" rel="stylesheet" />
      <!-- MORRIS CHART STYLES-->
    <link href="bootstrap/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
   <!-- navigation -->
   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#">TMG</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Register<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php">login</a></li>
                            <li><a href="sign_up.php">sign up</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                                $cat->fetch_categories_searchlink();
                            ?>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" method="get" action="search.php">
                    <div class="form-group">
                        <select name="category" class="form-control">
                            <option value="all">all</option>
                            <?php
                                $cat->fetch_categories();
                            ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="title" placeholder="Search">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- navigation ends -->
    <!-- sign up begins -->
    <div class="row">
        <div class="container">
            <div class="col-md-6">
                <form action="includes/classes/process_sign_up.php" method="post" class="form-horizontal">
                    <h2 class="text-center">sign up</h2>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-2">Name:</label>
                        <div class="col-md-10">
                            <input type="text" name="name" id="name" required class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>Male&nbsp;&nbsp;<input type="radio" required name="gender" value="M"></label>
                        <label>Female&nbsp;&nbsp;<input type="radio" required name="gender" value="F"></label>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label col-md-2" autocomplete="off">Username:</label>
                        <div class="col-md-10">
                            <input type="text" name="username" id="username" required class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-md-2">password:</label>
                        <div class="col-md-10">
                            <input type="password" name="password" id="password" required class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="sign_up" class="btn btn-default">Sign up</button>
                </form>
            </div>
            <div class="col-md-6">
            <div class="column">
                    <img src="images/nature.jpg">
                </div>
            </div>
        </div>
    </div>
    <!-- sign up ends -->
    <!-- contact us begins -->
    <div class="row" id="contact_us">
        <div class="container-fluid">
            <div class="col-sm-4" id="arrow">
                <span><img src="images/logo.png" /></span>
            </div>
            <div class="col-sm-4">
                <span><i class="fa fa-phone-square fa-2x"></i>&nbsp;&nbsp; +2348103078096</span>
                <span><i class="fa fa-envelope fa-2x"></i>&nbsp;&nbsp; Okoyep98@gmail.com </span>
                <span><i class="fa fa-facebook-square fa-2x"></i>&nbsp;&nbsp; Okoye Peter</span>
                <span><i class="fa fa-instagram fa-2x"></i>&nbsp;&nbsp; The Magnificent </span>
            </div>
            <div class="col-sm-4">
                <h4 class="text-center" id="about_us">About us</h4>
                <p>This text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented, aligned, and the space between characters is specified. The underline is removed from this colored "Try it Yourself" link.</p>
            </div>
        </div>
    </div>


<?php include "includes/footer.php"; ?>