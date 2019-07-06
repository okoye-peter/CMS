<?php
include "includes/classes/read_class.php";
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
    <link rel="stylesheet" href="css/read.css">
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

    <div class="row">
        <div class="container">
            <?php
            if (isset($_GET['title']) && isset($_GET['id'])) {
                # code...
                $read = new read();
                $read->read_article($_GET['title'], $_GET['id']);

            }else{
                
            }
            ?>
        </div>
    </div>