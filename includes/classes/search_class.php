<?php
include "connection.php";

class search{
    protected $title;
    protected $id;

    public function carousel_inner($title, $category){
        $this->title = $title;
        $cat = $category;
        $image;
        global $pdo;
        if ($cat == 'all') {
            # code...
            $query = $pdo->prepare("SELECT *  FROM articles  WHERE title LIKE '$this->title%'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                $i = 0;
                while ($row = $query->fetch()) {
                    $image = $row->pics;
                    $this->title = $row->title;
                    $this->id = $row->id;
                    if ($i == 0) {
                        # code...
                        echo "<div class='item active'>
                                <img src='imageResize.php?image=upload/$image'>
                                <div class='carousel-caption'>
                                    <h3><a href='read.php?title=$title&id=$this->id'>$this->title</a></h3>
                                </div>
                            </div>
                            ";
                    } else {
                        # code...
                        echo "<div class='item'>
                                <img src='imageResize.php?image=upload/$image'>
                                <div class='carousel-caption'>
                                    <h3><a href='read.php?title=$title&id=$this->id'>$title</a></h3>
                                </div>
                            </div>
                            ";
                    }
                    $i++;
                }
            } else {
                # code...
                echo "Nothing was found";
            }
        } else {
            # code...
            $query = $pdo->prepare("SELECT *  FROM articles  WHERE title LIKE '$this->title%' AND categories =  '$category'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                $i = 0;
                while ($row = $query->fetch()) {
                    $image = $row->pics;
                    $this->title = $row->title;
                    $this->id = $row->id;
                    if ($i == 0) {
                        # code...
                        echo "<div class='item active'>
                                <img src='imageResize.php?image=upload/$image'>
                                <div class='carousel-caption'>
                                    <h3><a href='read.php?title=$this->title&id=$this->id'>$this->title</a></h3>
                                </div>
                            </div>
                            ";
                    } else {
                        # code...
                        echo "<div class='item'>
                                <img src='imageResize.php?image=upload/$image'>
                                <div class='carousel-caption'>
                                    <h3><a href='read.php?title=$this->title&id=$this->id'>$this->title</a></h3>
                                </div>
                            </div>
                            ";
                    }
                    $i++;
                }
            } else {
                # code...
                echo "Nothing was found";
            }
        }
    }

    public function carousel_indicator($title,  $category){
        $this->title = $title;
        $cat = $category;
        global $pdo;
        if ($cat == 'all') {
            # code...
            $query = $pdo->prepare("SELECT *  FROM articles  WHERE title LIKE '$this->title%'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                $i = 0;
                while ($row = $query->fetch()) {
                    if ($i == 0) {
                        # code...
                        echo "<li data-target='#myCarousel' data-slide-to ='$i' class='active'></li>";
                    } else {
                        # code...
                        echo "<li data-target='#myCarousel' data-slide-to ='$i'></li>";
                    }
                    $i++;
                }
            } else {
                # code...
                echo "Nothing was found";
            }
        } else {
            # code...
            $query = $pdo->prepare("SELECT *  FROM articles  WHERE title LIKE '$this->title%' AND categories = '$cat'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                $i = 0;
                while ($row = $query->fetch()) {
                    if ($i == 0) {
                        # code...
                        echo "<li data-target='#myCarousel' data-slide-to ='$i' class='active'></li>";
                    } else {
                        # code...
                        echo "<li data-target='#myCarousel' data-slide-to ='$i'></li>";
                    }
                    $i++;
                }
            } else {
                # code...
                echo "Nothing was found";
            }
        }
        
    }

    public function fetch_searchlink($title, $category){
        $this->title = $title;
        $cat = $category;
        global $pdo;
        if ($cat == "all") {
            # code...
            $query = $pdo->prepare("SELECT * FROM articles WHERE title LIKE '$this->title%'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                while ($row = $query->fetch()) {
                $this->title = $row->title;
                $this->id = $row->id;
                    echo "<li><a href='read.php?title=$this->title&id=$this->id'>$this->title</a></li>";
                }
            } else {

            }
        } else {
            # code...
            $query = $pdo->prepare("SELECT * FROM articles WHERE title LIKE '$this->title%' AND categories = '$cat'");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                while ($row = $query->fetch()) {
                $this->title = $row->title;
                $this->id = $row->id;
                    echo "<li><a href='read.php?title=$this->title&id=$this->id'>$this->title</a></li>";
                }
            } else {

            }
        }
    }
}

?>