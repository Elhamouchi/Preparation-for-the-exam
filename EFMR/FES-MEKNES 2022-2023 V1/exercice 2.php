<?php

class Compte{
  private $login, $mot_passe, $etat;

  function __construct(string $login,  string $mot_passe, bool $etat=false){
    $this->login = $login;
    $this->mot_passe = $mot_passe;
    $this->etat = $etat;
  }


  function setLogin($value){
    if(preg_match("[a-zA-z]{6,}", $value)){
      echo "valid";
    }else{
      echo "invalid";
    }
  }

  function estBloque(){
    return $this->etat;
  }

  function bloquerCompte(){
    if(!$this->etat){
      $this->etat = true;
    }
  }

  static function Connecter(string $login,  string $mot_passe){
    try {
      $dsn = "mysql:host=localhost;dbname=gestionComptes";
      $pdo = new PDO($dsn, "root", "", [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
      if($pdo){
        echo "connected";
      }
    }catch(PDOException $e){
      echo $e->getMessage();
    }

    $sql = "SELECT * FROM Compte c WHERE c.login = :email and c.mot_passe = :mot";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":email", $login);
    $stmt->bindValue(":mot", $mot_passe);

    $stmt->execute();

    if($stmt->rowCount() > 0){
      $cmpt = $stmt->fetch(PDO::FETCH_OBJ);
      var_dump($cmpt->etat);
      
      if($cmpt->etat === "1"){
        session_start();
        $_SESSION["login"] = $login;
        return true;
      }
    }

    return false;
  }

}


var_dump(Compte::Connecter("abdellah", "1asq"));