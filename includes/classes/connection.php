<?php
  try{
      $pdo = new PDO("mysql:host=localhost;dbname=cms","root","");    
      //set error mode
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage() ." on line ". $e->getLine();
      // file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
  }
    
?>