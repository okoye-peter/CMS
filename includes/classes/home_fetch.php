<?php
include "connection.php";
// session_start();

class fetch{
    protected $article_id;
    protected $title;

    public function fetch_article(){
        global $pdo;
        $query = $pdo->prepare("SELECT *  FROM articles");
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
}

$fetch = new fetch();
$fetch->fetch_article();

?>