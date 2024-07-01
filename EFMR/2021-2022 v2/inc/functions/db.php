<?php

use LDAP\Result;

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
 *  - if longi and password exist return true
 *  - else return false
 * @param string $login
 * @param string $password 
 * 
 * @return bool | object
 */


function authentification(string $login, string $password): bool | object{
  $pdo = connection();
  
  $sql = "SELECT * from compteproprietaire WHERE loginProp = :email and motPasse = :pass";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue("email", $login);
  $stmt->bindValue("pass", $password);
  $stmt->execute();

  if($stmt->rowCount()>0){
    $userInfo = $stmt->fetch(PDO::FETCH_OBJ);
    if($userInfo->loginProp === $login && $userInfo->motPasse === $password){
      return $userInfo;
    }
  }
  return false;
  exit;
}

/**
 * select gategoroes from data base with id [id => [ind=>["column_name"=>"categorie"]]]
 * @param void
 * @return array $categories
 */

function getCategoriesWithID():array{
  $pdo = connection();
  $sql = "SELECT idCategorie, denomination AS 'cate' FROM categorie";

  $stmt = $pdo->query($sql);
  $categories = $stmt->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);

  return $categories;
}

/**
 * select only gategoroes name from data base  [cate, cate ...]
 * @param void
 * @return array $categories array of categories
 */

function getCategories(){
  $pdo = connection();
  $sql = "SELECT idCategorie FROM categorie";

  $stmt = $pdo->query($sql);

  $categories = [];
  while($cate = $stmt->fetchColumn()){
    $categories[] = $cate;
  }

  return $categories;
}

/**
 * get list of product form database
 * 
 * @return array $products list of objects
 * 
 */

function getProducts():array{
  $pdo = connection();
  $sql = "SELECT REFERENCE, libelle, prixUnitaire, dateAchat, photoProduit, denomination AS 'categorie' FROM produit INNER JOIN categorie USING(idCategorie) ORDER BY libelle;";
  $stmt = $pdo->query($sql);
  $products = $stmt->fetchAll(PDO::FETCH_OBJ);
  return $products;
}


function deleteProduct(int $reference){
  $sql ="DELETE FROM produit WHERE REFERENCE = :ref";

  $pdo = connection();
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":ref", $reference);
  $result = $stmt->execute();

  return $result;
}

function addProduct($label, $price, $date, $image_name, $cate){

    $sql = 'INSERT INTO produit(libelle, prixUnitaire, dateAchat,  photoProduit, idCategorie) VALUES(?, ?, ?, ?, ?)';
    $pdo = connection();

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$label, $price, $date, $image_name, $cate]);
}

function getProductByRef($reference){
  $sql = "SELECT * FROM produit WHERE REFERENCE = :ref";

  $pdo = connection();

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue("ref", $reference);
  $stmt->execute();

  $product = $stmt->fetch(PDO::FETCH_OBJ);

  return $product;
}


function editProduct($label, $price, $date, $idcate, $refProd){
  $sql = "UPDATE produit SET libelle = ?, prixUnitaire = ?, dateAchat = ?, idCategorie = ? WHERE REFERENCE = ?";
  $pdo = connection();

  $stmt = $pdo->prepare($sql);


  $result = $stmt->execute([$label, $price, $date, $idcate, $refProd]);
  return $result;
}
?>