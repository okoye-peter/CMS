<?php
include "connection.php";

class read{
    protected $title;
    protected $id; 

    public function read_article($title, $id){
        $this->title = $title;
        $this->id = $id;

        global $pdo;
        $query = $pdo->prepare("SELECT * FROM articles WHERE title = '$this->title' AND id = $this->id");
        $query->execute();
        //set fetch mode
        $query->setFetchMode(PDO::FETCH_OBJ);
        while ($row = $query->fetch()) {
            # code...
            $content = $row->content;
            $date = $row->date_posted;
            $image = $row->pics;
            $this->title = $row->title;
            $user_id = $row->user_id;
            $query = $pdo->prepare("SELECT * FROM users WHERE id = $user_id");
            $query->execute();
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            while ($row1 = $query->fetch()) {
                # code...
                $name = $row1->name;
            }
            echo "<h3>".strtoupper($this->title)."</h3>";
            echo "<p>written by ".$name." <small>posted on ".date('j l m Y', $date)."</small></p>";
            echo "<p id='content'>
                        <span>
                            <img src='imageResize.php?image=upload/$image' >
                        </span>";
            echo "$content</p><br/>";
            echo "<a href='". $_SERVER['HTTP_REFERER']."'>&larr; back</a>";
        }
    }
}