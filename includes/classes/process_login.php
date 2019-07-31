<?php
session_start();
include "connection.php";
class login{
    private $id;
    private $username;
    private $password;

    public function login_verify($username, $password){
        $this->username = $username;
        $this->password  = $password;

        global $pdo;
        $query = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $array = array("username" => $this->username);
        //execute query
        $query->execute($array);
        $rowAffected = $query->rowCount();
        if ($rowAffected > 0) {
             //set fetch mode to object
            $query->setFetchMode(PDO::FETCH_OBJ);
            while ($row = $query->fetch()) {
                # code...
                if (password_verify($this->password, $row->password)) {
                    # code...
                    $_SESSION['id'] = $row->id;
                    $this->id =  $_SESSION['id'];
                    $pdo->exec("UPDATE users SET status = 1 WHERE id = $this->id");
                    // $query->exec();
                    header("location: ../../profile_page.php");
                }
            }
        }else{
            $_SESSION['error'] = "username not recognized";
            header("location: ../../login.php");
        }

        if ($rowAffected > 0 && $_SESSION == null) {
            # code...
            $_SESSION['error'] = "incorrect login details";
            header("location: ../../login.php");
        }

    }
    
    public function logout($id){
        $this->id = $id;
        global $pdo;
        $query = $pdo->exec("UPDATE users SET status = 0 WHERE id = $this->id");
        session_destroy();
        header("location: ../../login.php");
    }
}
//login handle
if(isset($_POST['login'])){
    session_unset();
    $login = new login();
    $login->login_verify($_POST['username'], $_POST['password']);
}

//logout handle
if(isset($_GET['logout'])){
    $logout = new login();
    $logout->logout($_SESSION['id']);
}
?>