<?php
include "connection.php";
class category{
    protected $categories;
    protected $search_word;

    public function carousel_inner(){
        $title;
        $image;
        $id;
        global $pdo;

        $query = $pdo->prepare("SELECT *  FROM articles");
        $query->execute();
        $rowAffected =$query->rowCount();
        if ($rowAffected > 0) {
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            $i = 0;
            while ($row = $query->fetch()) {
                $image = $row->pics;
                $title = $row->title;
                $id = $row->id;
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
        } else {
            # code...
            echo "Nothing was found";
        }
    }

    public function carousel_indicator(){
        global $pdo;

        $query = $pdo->prepare("SELECT *  FROM articles");
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

    public function fetch_categories(){
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
            # code...
            echo "Nothing was found";
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
                echo "<li><a href='search.php?link = ".$this->categories."'>$this->categories</a></li>";
            }
        } else {

        }
    }
}

?>