<?php
session_start();
include "connection.php";

class article_upload{
    protected $title;
    protected $content;
    protected static $image;
    protected $category;

    public static function image_check($image){
        $file = $_FILES["image"];
        $file_name = $file['name'];
        $file_type = explode('.',$file_name);
        $file_type = strtolower(end($file_type));
        $error = $file['error'];
        $fileTmpName = $file['tmp_name'];

        //give image a new unique name
        $fileNewName = uniqid('',true).'.'.$file_type;
        $extention_allowed = array('jpeg', "jpg", "png");
        // check if the image type is allowed
        if(in_array($file_type, $extention_allowed)){
            //check if there is any error
            if ($error === 0) {
                #move image to new folder
                $fileDestination = "../../upload/".basename($fileNewName);
                //move image to new destination
                move_uploaded_file($fileTmpName, $fileDestination);
                self::$image = $fileNewName;
            }

        }
    }

    public function upload($image,$category, $title, $content){
        $id  = $_SESSION['id'];
        $this->category = $category;
        self::$image = $image;
        $this->title = $title;
        $this->content = nl2br($content);

        
        # check if it an image
        article_upload::image_check(self::$image);
        if(getimagesize('../../upload/'.self::$image)) {
            // $this->image = $fileNewName;
            global $pdo;
            #prepare query for execution
            $query = $pdo->prepare("INSERT INTO articles(user_id, title,content,pics,categories, date_posted) VALUES(?, ?, ?, ?, ?, ?)");
            # parameters to be used in query execution
            $array = array($id, $this->title, $this->content, self::$image, $this->category, time());
            #excute query
            $query->execute($array);
            header("location: ../../profile_page.php");
        } else {
             
        }   
    }
}

if (isset($_POST['upload'])) {
    # code...
    $upload = new article_upload();

    $upload->upload($_FILES['image'], $_POST['categories'], $_POST['title'], $_POST['content']);   
}
?>