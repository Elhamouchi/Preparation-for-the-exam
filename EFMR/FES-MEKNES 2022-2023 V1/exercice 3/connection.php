<?php

  $dsn = "mysql:host=localhost;dbname=entre_formation";
  $user = "root";
  $pass = "";
  try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
  }catch(PDOException $e){
    echo $e->getMessage();
  }

  