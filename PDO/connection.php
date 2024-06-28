<?php
  $db_name = "efm_prepare";
  $dsn = "mysql:host=localhost;dbname=EFM_prepare";
  $user = "root";
  $password = "";
  $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
  try{
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "connected successfly";
  }catch(PDOException $e){
    echo $e->getMessage();
  }
