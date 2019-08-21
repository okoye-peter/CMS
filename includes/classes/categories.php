<?php
include "connection.php";

class categories {
    protected $cat;

    public function fetch_article($cat){
        $this->cat = $cat;
        global $pdo;
        $query = "SELECT * FROM articles WHERE categories = '$this->cat'";
        $query = $pdo->prepare($query);
        $query->execute();

        $rowAffected =$query->rowCount();
        if ($rowAffected > 0) {
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $query->fetch()) {
                $this->article_id = $row->id;
                $this->title = $row->title;
                echo "<li><a href='read.php?title=$this->title&id=$this->article_id'>$this->title</a></li>";
            }
        } else {
            # code...
            echo "Welcome to TMG";
        }

    }

    public function fetch_categories_searchlink(){
        global $pdo;
        $query = $pdo->prepare("SELECT categories  FROM articles");
        $query->execute();
        $rowAffected =$query->rowCount();
        if ($rowAffected > 0) {
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $query->fetch()) {
               $this->categories = $row->categories;
                echo "<li><a href='categories.php?cat=".$this->categories."'>$this->categories</a></li>";
            }
        } else {

        }
    }

        public function fetchSearchCategories(){
            global $pdo;
            $query = $pdo->prepare("SELECT categories  FROM articles");
            $query->execute();
            $rowAffected =$query->rowCount();
            if ($rowAffected > 0) {
                //set fetch mode
                $query->setFetchMode(PDO::FETCH_OBJ);
                while ($row = $query->fetch()) {
                   $this->categories = $row->categories;
                    echo "<option value='$this->categories'>$this->categories</option>";
                }
            } else {
    
            }
        }

    public function carousel_inner($cat){
        $this->cat = $cat;
        global $pdo;
        $query = "SELECT * FROM articles WHERE categories = '$this->cat'";
        $query = $pdo->prepare($query);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            # code...
            $image = $row->pics;
                $title = $row->title;
                $id = $row->id;
                $i = 0;
                if ($i == 0) {
                    # code...
                    echo "<div class='item active'>
                            <img src='imageResize.php?image=upload/$image'>
                            <div class='carousel-caption'>
                                <h3><a href='read.php?title=$title&id=$id'>$title</a></h3>
                            </div>
                        </div>
                        ";
                } else {
                    # code...
                    echo "<div class='item'>
                            <img src='imageResize.php?image=upload/$image'>
                            <div class='carousel-caption'>
                                <h3><a href='read.php?title=$title&id=$id'>$title</a></h3>
                            </div>
                        </div>
                        ";
                }
                $i++;
        }
    }

    public function carousel_indicator($cat){
        global $pdo;
        echo $cat;
        $this->cat = $cat; 
        $query = "SELECT * FROM articles WHERE categories = '$this->cat'";
        $query = $pdo->prepare($query);
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
        }
    }


}
?>