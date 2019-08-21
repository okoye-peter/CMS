<?php
include "connection.php";
session_start();

class profileFetchDeletePost{
    protected $article_id;
    protected $title;

    public function fetchArticleDelete(){
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
                echo "<option value='$this->title'>$this->title</option>";
            }
        } else {
            # code...
            echo "Welcome to TMG";
        }

    }
}

$fetch = new profileFetchDeletePost();
$fetch->fetchArticleDelete();

?>