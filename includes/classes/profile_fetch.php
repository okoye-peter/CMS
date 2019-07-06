<?php
include "connection.php";
session_start();

class fetch{
    protected $article_id;
    protected $title;

    public function fetch_article(){
        $user_id = $_SESSION['id'];
        global $pdo;
        $query = $pdo->prepare("SELECT *  FROM articles WHERE user_id = $user_id");
        $query->execute();
        $rowAffected =$query->rowCount();
        if ($rowAffected > 0) {
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            $_SESSION['delete'] = array();
            while ($row = $query->fetch()) {
                $this->article_id = $row->id;
                $this->title = $row->title;
                array_push($_SESSION['delete'], $this->title);
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