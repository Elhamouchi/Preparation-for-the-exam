<?php
require_once "../inc/functions/validation.php";
require_once "../inc/functions/flash.php";


session_start();




if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["refProd"], $_POST["label"], $_POST["price"], $_POST["date"], $_POST["cate"])){
        foreach($_POST as $key => $val){
            $$key = $val;
        }
        if(!is_a_valid_label($label)){
            flash("apload", "- Invalid label.", FLASH_ERROR);
            header("location: ../viewPages/modifierProduit.php");
            exit;
        }
        
        
        if(!is_a_valid_prix($price)){
            flash("apload", "- Invalid Price.", FLASH_ERROR);
            header("location: ../viewPages/modifierProduit.php");
            exit;
        }

        if(!is_a_valid_date($date)){
            flash("apload", "- Invalid date.", FLASH_ERROR);
            header("location: ../viewPages/modifierProduit.php");
            exit;
        }

        if(!is_a_valid_categorie($cate)){
            flash("apload", "- Invalid categorie.", FLASH_ERROR);
            header("location: ../viewPages/modifierProduit.php");
            exit;
        }

        if(!preg_match("/^[0-9]*$/", $refProd)){
            header("location: modifierProduit.php");
        }

        $r = editProduct($label, $price, $date, $cate, $refProd);
        if($r){
            header("location: ../viewPages/accueil.php");
        }
    }
}
