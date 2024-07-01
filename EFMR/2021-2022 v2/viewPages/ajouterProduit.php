<?php 
session_start();
include_once "../inc/functions/user-session.php";
include_once "../inc/functions/db.php";
include "../inc/functions/flash.php";


check_session();

include "../inc/templetes/header.php"; 
include_once  "../inc/templetes/navbar.php" ;

?>

<pre>
    <?php
        print_r($_SESSION)
    ?>
</pre>
    <div class="container my-5">
        <?php flash("apload")  ?>
        <form action="../funcPages/add.php" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="libelle">Libelle</label>
                    <input type="text" class="form-control" id="libelle"  name="label">
                </div>
                <div class="form-group col-md-6">
                <label for="price">Prix Unitaire</label>
                <input type="number" class="form-control" id="price"  name="price">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="date">Date Achat</label>
                <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="form-group col-md-6">
                <label for="file">Photo Produit</label>
                <input type="file" class="form-control" id="file"  name="file">
                </div>
            </div>
            <div class="form-group">
                <label for="categorie">categorie</label>
                <select class="form-control"  name="cate" id="categorie">
                    <?php
                    $cate = getCategoriesWithID(); 
                    foreach($cate as $idCate=>$cate):
                        $val = $cate[0]["cate"]
                    ?>
                    <option value="<?=$idCate?>"><?=$val?></option>
                    <?php endforeach;?>
                </select>
            </div>
            
            <input type="submit" value="Ajouter" class="btn btn-primary my-2">
        </form>
    </div>