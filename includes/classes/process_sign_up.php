<?php
include "connection.php";
class process_sign_up{
    private $name;
    private $gender;
    private $username;
    private $password;

    public function sign_up($name, $gender, $username, $password){
        $this->name = $name;
        $this->gender = $gender;
        $this->username = $username;
        $this->password = $password;
        $this->password = password_hash($password,PASSWORD_BCRYPT);

        global $pdo;
        $query = $pdo->prepare("INSERT INTO users(name,username,password,gender) VALUES(?,?,?,?)");

        $array = array($this->name, $this->username, $this->password, $this->gender);
        $query->execute($array);
    }
}

if (isset($_POST['sign_up'])) {
    # code...
    $sign_up = new process_sign_up();
    $sign_up->sign_up($_POST['name'], $_POST['gender'], $_POST['username'], $_POST['password']);
    header("location: ../../login.php");
}

?>