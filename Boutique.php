<?php
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">ESSAT Boutique</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active"> <a class="nav-link" href="#">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Promotions</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Ventes Flash</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Déstockages</a> </li>
                </ul>

                <a href="monpanier.php" class="btn btn-info  " type="submit">Mon Panier(<?=getSizeOfPanier()?>) </a>

            </div>
        </div>
    </nav>


    <div class="container">


        <div class="row" style="margin-top: 20px;">



            <div class="col-3">

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Tous les Produits
                    </a>
                    <?php
                    $cats = getAllCategorie();
                    foreach ($cats as $key => $value) {


                    ?>
                        <a href="boutique.php?cat=<?=$value["id"]?>" class="list-group-item list-group-item-action ">
                            <?= $value["description"] ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>


            </div>


            <div class="col-9">

                <div class="row">
                    <?php
                    $prods=getAllProduits();
if(isset($_GET["cat"])){
    $prods=getAllProduitsByCatId($_GET["cat"]);

}
foreach ($prods as $keys=>$value){


                    ?>
                    <div class="col-4">
                        <div class="card bg-light" style="width: 18rem;">
                            <img src="images/<?=$value["id"]?>.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$value["description"]?></h5>
                                <a href="addPanier.php?id=<?=$value["id"]?>" class="card-link btn btn-primary">Acheter</a>
                                <a href="#" class="card-link btn btn-danger"><?=$value["prix"]?></a>
                            </div>
                        </div>
                    </div>
<?php
}
?>
                </div>


            </div>

        </div>

    </div>


</body>

</html>