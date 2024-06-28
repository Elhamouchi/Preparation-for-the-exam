<?php
  session_start();
  require_once __DIR__ . "/inc/flash.php";
  require_once __DIR__ . "/inc/functions.php";

  echo "<pre>";
  $file = $_FILES["file"];
  print_r($file);
  echo $file["size"] . "<br>";
  echo filesize($file["tmp_name"]) . "<br>";
  $info = finfo_open(FILEINFO_MIME_TYPE);
  var_dump($info);

  $mime_type = finfo_file($info, $file['tmp_name']);
  var_dump($mime_type);

  echo pathinfo($file['name'])["extension"];
  echo "</pre>";




?>