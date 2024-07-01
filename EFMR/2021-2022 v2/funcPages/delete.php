<?php
include_once "../inc/functions/db.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){

    if(isset($_GET["refProd"])){
        $ref  = $_GET["refProd"];
        if(preg_match("/^[0-9]+$/", $ref)){
            deleteProduct($ref);
        }
    }
}

header("location: ../viewPages/accueil.php")

?>