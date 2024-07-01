<?php
require_once "../inc/functions/validation.php";
require_once "../inc/functions/flash.php";


session_start();



if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["label"], $_POST["price"], $_POST["date"], $_FILES["file"], $_POST["cate"])){
        foreach($_POST as $key => $val){
            $$key = $val;
        }

        if(!is_a_valid_label($label)){
            flash("apload", "- Invalid label.", FLASH_ERROR);
            header("location: ../viewPages/ajouterProduit.php");
            exit;
        }

        if(!is_a_valid_prix($price)){
            flash("apload", "- Invalid Price.", FLASH_ERROR);
            header("location: ../viewPages/ajouterProduit.php");
            exit;
        }

        if(!is_a_valid_date($date)){
            flash("apload", "- Invalid date.", FLASH_ERROR);
            header("location: ../viewPages/ajouterProduit.php");
            exit;
        }

        if(!is_a_valid_categorie($cate)){
            flash("apload", "- Invalid categorie.", FLASH_ERROR);
            header("location: ../viewPages/ajouterProduit.php");
            exit;
        }

        $file = $_FILES["file"];
        $result = is_a_valid_file($file);
        if($result === true){
            $f_type = pathinfo($file["name"])["extension"];
            $image_name = $label .".". $f_type;
            $is_uploaded = move_uploaded_file($file["tmp_name"], "../data/product-images/" . $image_name);
            if($is_uploaded){
                addProduct($label, $price, $date, $image_name, $cate);
                header("location: ../viewPages/accueil.php");
            }
        }else{
            flash("apload", $result, FLASH_ERROR);
            header("location: ../viewPages/ajouterProduit.php");
            exit;
        }
    }else{
        header("location: ../viewPages/ajouterProduit.php");
    }
}
