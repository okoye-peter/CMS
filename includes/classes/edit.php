<?php
// session_start();
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

    public function fectchArticleToEdit(){
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
        }
    }
}

if(isset($_POST['update'])){
    $edit = new edit();
    $edit->edit_detail($_POST['name'], $_POST['username'], $_POST['password']);
    header("location: ../../profile_page.php");
}

?>

<script>
 alert("working fine");
</script>
