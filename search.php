<?php
include "includes/classes/categories.php";
include "includes/classes/search_class.php";
$search = new search();
$cat = new categories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>Home Page</title>
    <script src="js/home.js"></script>
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/jquery-3.3.1.slim.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- FONTAWESOME STYLES-->
    <link href="bootstrap/assets/css/font-awesome.css" rel="stylesheet" />
      <!-- MORRIS CHART STYLES-->
    <link href="bootstrap/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/home.css">
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
                                $cat->fetchSearchCategories();
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
    
    <div class="row" id="carousel_row">
        <!-- carousel begins -->
        <div class="container">
            <div class="col-sm-6" id="carousel">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <!-- indicators -->
                    <ol class="carousel-indicators">
                        <?php
                            $search->carousel_indicator($_GET['title'], $_GET['category']);
                        ?>
                    </ol>

                    <!-- wrapper for slide -->
                    <div class="carousel-inner">
                        <?php
                            $search->carousel_inner($_GET['title'], $_GET['category']);
                        ?>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <h3 class="panel-heading text-center">Articles</h3>
                            <article class="panel-body">
                                <ul id="article_links">
                                <?php
                                    $search->fetch_searchlink($_GET['title'],$_GET['category']);
                                ?>
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- carousel ends -->
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
    <!-- contact us ends -->
<?php include "includes/footer.php"; ?>