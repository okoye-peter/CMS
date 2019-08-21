<?php
session_start();
include "includes/classes/category_search.php";
include "includes/classes/edit.php";
$edit = new edit();
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
    <link rel="stylesheet" href="css/profile_page.css">
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
                    <li class="dropdown"><a href="includes/classes/process_login.php?logout=logout">logout &nbsp;<span class="glyphicon glyphicon-log-out  "></span></a>
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
        <div class="container-fluid">
            <!-- edit profile begins -->
            <nav class="col-sm-3">
                <form method="post" action="includes/classes/edit.php" class="nav nav-pills nav-stacked">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="passsword" placeholder="password" class="form-control" required>
                    </div>
                    <div class="form-button">
                        <input type="submit" name="update" class="btn btn-success"  value="update">
                    </div>
                </form>
                <div id="section1"> 
                    <h1 class="text-center">Section 1</h1>
                    <p>Try to scroll this page and look at the navigation list while scrolling!Try to scroll this page and look at the navigation list while scrolling!Try to scroll this page and look at the navigation list while scrolling!Try to scroll this page and look at the navigation list while scrolling!</p>
                </div> 
            </nav>
            <!-- edit profile ends -->

            <!-- upload and link to articles begins -->
            <div class="col-sm-9">
                <div class="col-sm-7">
                    <form action="includes/classes/article_upload.php" method="post" enctype="multipart/form-data">                
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="categories" placeholder="category" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" placeholder="title" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="content" rows="10" placeholder="content" class="form-control" required autocomplete="off"></textarea>
                        </div>
                        <input type="submit" value="upload" name="upload" class="btn btn-primary">
                    </form>
                    <br>
                </div>
                <div class="col-sm-5">
                    <h4>select an article the delete:</h4>
                    <form action="includes/classes/delete.php" method="get">
                        <div class="form-group">
                            <select name="delete_post" class="form-control" onchange="this.form.submit();" id="delete">
                               
                            </select>
                        </div>
                    </form>
                    <ul id="article_links">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="col-sm-4">
                <form class="includes/classes/edit.php">
                    <select name="edit_post" class="form-control" onchange="this.form.submit();">
                        <option value="">peter</option>
                        <?php
                            $edit->fectchArticleToEdit();
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
<script src="js/profile_fetch.js"></script>
