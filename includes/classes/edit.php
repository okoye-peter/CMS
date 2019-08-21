<?php
session_start();
include "connection.php";
class edit{
    private $name;
    private $username;
    private $password;

    public function edit_detail($name, $username, $password){
        $id = $_SESSION['id'];
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        global $pdo;
        $query = $pdo->prepare("UPDATE users SET name = :name, username = :username, password= :password WHERE id = $id");
        $array = array("name"=>$this->name,"username"=>$this->username, "password" => $this->password);
        $query->execute($array);
    }

    public function fectchListOfArticleToEdit(){
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
                echo "<option value='$this->article_id'>$this->title</option>";
            }
        }
    }

    public function fectchArticleToEdit($id, $articleId){
        $user_id = $id;
        $articleId = $articleId;
        global $pdo;
        $query = $pdo->prepare("SELECT *  FROM articles WHERE user_id = $user_id AND  id = $articleId");
        $query->execute();
        $rowAffected =$query->rowCount();
        if ($rowAffected > 0) {
            //set fetch mode
            $query->setFetchMode(PDO::FETCH_OBJ);
            $_SESSION['delete'] = array();
            while ($row = $query->fetch()) {
                $article_id = $row->id;
                $title = $row->title;
                $category = $row->categories;
                $image = $row->pics;
                $content = $row->content;

                array_push($_SESSION['delete'], $this->title);
                echo " <form action=\"includes/classes/edit.php\" method=\"post\" enctype=\"multipart/form-data\">                
                <div class=\"form-group\">
                    <input type=\"file\" name=\"image\" class=\"form-control\" required>
                </div>
                <div class=\"form-group\">
                    category: <input type=\"text\" name=\"categories\" value=\"$category\"  class=\"form-control\" required autocomplete=\"off\">
                </div>
                <div class=\"form-group\">
                    title: <input type=\"text\" name=\"title\"  value=\"$title\" class=\"form-control\" required autocomplete=\"off\">
                </div>
                <div class=\"form-group\">
                    content: <textarea type=\"text\" name=\"content\" rows=\"10\"   class=\"form-control\" required autocomplete=\"off\">$content</textarea>
                </div>
                <div class=\"form-group\">
                    <input type=\"hidden\" name=\"articleId\" value=\"$article_id\" class=\"form-control\">
                </div>
                <input type=\"submit\" value=\"updateArticle\" name=\"updateArticle\" class=\"btn btn-primary\">
            </form>";
            }
        }
    }

    public static function image_check($image){
        $file = $image;
        $file_name = $file['name'];
        $file_type = explode('.',$file_name);
        $file_type = strtolower(end($file_type));
        $error = $file['error'];
        $fileTmpName = $file['tmp_name'];

        //give image a new unique name
        $fileNewName = uniqid('',true).'.'.$file_type;
        $extention_allowed = array('jpeg', "jpg");
        // check if the image type is allowed
        if(in_array($file_type, $extention_allowed)){
            //check if there is any error
            if ($error === 0) {
                #move image to new folder
                $fileDestination = "../../upload/".basename($fileNewName);
                //move image to new destination
                move_uploaded_file($fileTmpName, $fileDestination);
                return $image = $fileNewName;
            }

        }
    }

    public function updateArticle($user_id, $image, $category, $title, $content, $articleId){
        $id  = $user_id;
        $image = $image;
        $title = $title;
        $category = $category;
        $content = $content;
        $articleId = $articleId;
        global $pdo;
        $image = edit::image_check($image);
        $query = $pdo->prepare("UPDATE articles set title = :title, content = :content, pics = :pics, categories = :category WHERE user_id = :userId AND id = :articleId");
        $query->execute(array('title' =>$title, 'content' => $content, 'pics' => $image,'category' => $category, 'userId' =>$id, 'articleId' => $articleId)); 
    }
}

if (isset($_POST['updateArticle'])) {
    $edit = new edit();
    $edit->updateArticle($_SESSION['id'], $_FILES['image'], $_POST['categories'], $_POST['title'], $_POST['content'], $_POST['articleId']);
}

if(isset($_POST['update'])){
    $edit = new edit();
    $edit->edit_detail($_POST['name'], $_POST['username'], $_POST['password']);
    header("location: ../../profile_page.php");
}

?>