
<?php
session_start();
include_once "../inc/functions/user-session.php";
include_once "../inc/functions/db.php";
include_once "../inc/templetes/header.php";
include_once  "../inc/templetes/navbar.php" ;

check_session();

$message =(int)date('h') > 12? "bonsiore": "bonjour";
$message .= " "  . $_SESSION["user"]["nom"];

$products = getProducts();
?> 
<div class="container">
    <h1 class="text-center"><?=$message?></h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Reference</th>
        <th scope="col">Libelle</th>
        <th scope="col">Prix Unitaire</th>
        <th scope="col">date Achat</th>
        <th scope="col">photo Produit</th>
        <th scope="col">categorie</th>
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $prod):?>
        <tr>
        <td><?=$prod->REFERENCE?></td>
        <td><?=$prod->libelle?></td>
        <td><?=$prod->prixUnitaire?></td>
        <td><?=$prod->dateAchat?></td>
        <td ><img src="../data/product-images/<?=$prod->photoProduit?>" alt="img"></td>
        <td><?=$prod->categorie?></td>
        <td>
            <a class="btn btn-info" href="modifierProduit.php?refProd=<?=$prod->REFERENCE;?>"> <i class="fa fa-edit"></i> </a>
            <a class="btn btn-danger" href="../funcPages/delete.php?refProd=<?=$prod->REFERENCE;?>"> <i class="fa fa-close"></i> </a>
        </td>
        </tr>
    <?php endforeach;?>
        
    </tbody>
    </table>
</div>


<?php require_once "../inc/templetes/footer.php"?>