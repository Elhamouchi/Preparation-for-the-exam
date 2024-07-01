<?php
session_start();
  include_once "../inc/functions/validation.php";
  include_once "../inc/functions/db.php";
  include_once "../inc/functions/flash.php";
  include_once "../inc/config/conf-flash.php";
  include_once "../inc/functions/user-session.php";
  
  if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["email"], $_POST["password"] )){
      $login = trim($_POST["email"]);
      $password = trim($_POST["password"]);

      if(!is_a_valid_email($login)){
        create_flash_message("auth", "- Invalid Email.", FLASH_ERROR);
        header("location: ../viewPages/login.php");
        exit;
      }

      if(!is_a_valid_password($password)){
        create_flash_message("auth", "- Invalid password.", FLASH_ERROR);
        header("location: ../viewPages/login.php");
        exit;
      }
    }else{
      create_flash_message("auth", "- Veuillez saisir un login et un mot de passe.", FLASH_ERROR);
      header("location: ../viewPages/login.php");
      exit;
    }

    $authen = authentification($login, $password);

    if($authen){
      create_user_session($login, $password, $authen->nom, $authen->prenom);
      header("location: ../viewPages/accueil.php");
    }else{
      create_flash_message("auth", "- le login ou le mot de passe est incorrect.", FLASH_ERROR);
      header("location: ../viewPages/login.php");
    }
    exit;

  }
?>