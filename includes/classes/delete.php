<?php
include "connection.php";
session_start();
class delete{
    private $article_title;
    private $id;

    public function delete_function($title, $id){
        $this->article_title = $title;
        $this->id  = $id;

        // if (isset($this->id, $this->title)) {
            global $pdo;
            // echo "DELETE FROM articles WHERE user_id = $this->id AND title = '$this->article_title'";
            $query = $pdo->prepare("DELETE FROM articles WHERE user_id = $this->id AND title = '$this->article_title'");
            $query->execute();
        // }
    }
}

if (isset($_GET['delete_post'])&& isset($_SESSION['id'])) {
    # code...
    $delete = new delete();
    $delete->delete_function($_GET['delete_post'], $_SESSION['id']);
    header("location: ../../profile_page.php");
}

?>