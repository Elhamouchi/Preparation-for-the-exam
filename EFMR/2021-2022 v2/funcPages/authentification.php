<?php
session_start();
  include_once "../inc/functions/validation.php";
  include_once "../inc/functions/db.php";
  include_once "../inc/functions/flash.php";
  include_once "../inc/config/conf-flash.php";
  
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["email"], $_POST["password"] )){
      $email = trim($_POST["email"]);
      $password = trim($_POST["password"]);

      if(!is_a_valid_email($email)){
        create_flash_message("auth", "- Invalid Email.", FLASH_ERROR);
        header("location: ../viewPages/login.php");
      }

      if(!is_a_valid_password($password)){
        create_flash_message("auth", "- Invalid password.", FLASH_ERROR);
        header("location: ../viewPages/login.php");
      }
    }else{
      create_flash_message("auth", "- Veuillez saisir un login et un mot de passe.", FLASH_ERROR);
      header("location: ../viewPages/login.php");
    }

    authentification($email, $password);
  }
?>