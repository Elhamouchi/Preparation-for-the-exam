<?php
include "../inc/config/conf-db.php";
/**
 * connect to database
 * 
 * @return pdo | raise error
 */

function connection(): PDO | error{

  try{
    $pdo = new PDO(DSN, USER, PASSWORD, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    return $pdo;
  }catch(PDOException $e){
    create_flash_message("auth", "connection Error: " . $e->getMessage(), FLASH_ERROR);
    header("location: ../viewPages/login.php");
  }

}

/** check if the login and password exist in data base
 *  - if exist save the user info in session and redirect to accueil page
 *  - else redirect to login page with erorr
 * @param string $login
 * @param string $password 
 * 
 * @return bool 
 */


function authentification(string $login, string $password){
  $pdo = connection();
  
  $sql = "SELECT * from compteproprietaire WHERE loginProp = :email and motPasse = :pass";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue("email", $login);
  $stmt->bindValue("pass", $password);
  $stmt->execute();

  if($stmt->rowCount()>0){
    $userInfo = $stmt->fetch(PDO::FETCH_OBJ);
    if($userInfo->loginProp === $login && $userInfo->motPasse === $password){
      session_start();
      $_SESSION["user"] = $userInfo;
      header("location: ../viewPages/acceil.php");
    }
    
  }

  create_flash_message("auth", "- le login ou le mot de passe est incorrect.", FLASH_ERROR);
  header("location: ../viewPages/login.php");
}
?>