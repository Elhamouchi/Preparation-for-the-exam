<?php

session_start();


include_once "../inc/functions/user-session.php";
include_once "../inc/functions/db.php";
include "../inc/functions/flash.php";


check_session();

include "../inc/templetes/header.php";
include_once  "../inc/templetes/navbar.php" ; 
$refProd = $_GET["refProd"];
if(!preg_match("/^[0-9]*$/", $refProd)){
    header("location: accueil.php");
}
$prd = getProductByRef($refProd);
?>
<!-- 
<pre>
    <?php
    //     print_r($_SESSION);
    //     print_r($prd);
    // ?>
</pre> -->
    <div class="container my-5">
        <?php flash("apload")  ?>
        <form action="../funcPages/edit.php" method="post">
            <input type="hidden" name="refProd" value="<?=$refProd?>">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" id="libelle"  name="label" value="<?=$prd->libelle?>">
                </div>
                <div class="form-group col-md-6">
                <label for="price">Prix Unitaire</label>
                <input type="number" class="form-control" id="price"  name="price" value="<?=$prd->prixUnitaire?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                <label for="date">Date Achat</label>
                <input type="date" class="form-control" id="date" name="date" value="<?=$prd->dateAchat?>">
                </div>
                
            </div>
            <div class="form-group">
                <label for="categorie">categorie</label>
                <select class="form-control"  name="cate" id="categorie">
                    <?php
                    $cate = getCategoriesWithID(); 
                    foreach($cate as $idCate=>$cate):
                        $val = $cate[0]["cate"];
                        if($idCate == $prd->idCategorie){
                    ?>
                    <option value="<?=$idCate?>" selected><?=$val?></option>
                    <?php } else{ ?>
                        <option value="<?=$idCate?>" ><?=$val?></option>
                    <?php }endforeach;?>
                </select>
            </div>
            
            <input type="submit" value="edit" class="btn btn-primary my-2">
        </form>
    </div>





