<?php
require_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/bootstrap4/css/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">ESSAT Boutique</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">  <a class="nav-link" href="#">Home</a>     </li>
                <li class="nav-item">   <a class="nav-link" href="#">Promotions</a>   </li>
                <li class="nav-item">   <a class="nav-link" href="#">Ventes Flash</a>   </li>
                <li class="nav-item">   <a class="nav-link" href="#">Déstockages</a>   </li>
            </ul>

            <button class="btn btn-info  " type="submit">Se Connecter </button>

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
                <a href="#" class="list-group-item list-group-item-action">
                    PC-Protable
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    PC-Bureau
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Tablette
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    Phone
                </a>
            </div>


        </div>


        <div class="col-9">

            <div class="card text-white ">
                <div class="card-header  bg-info ">Mon panier </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                        <tr> <th>#</th>
                            <th>D&eacute;signation de vos articles</th>
                            <th width="15%">P.UT</th>
                            <th>Quantit&eacute;</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a=0;
                            $prods=getDetailPanier();
                            foreach($prods as $key=>$value){

                                $a++;
                            ?>
                        <tr>
                            <th scope="row">
                                <?=$a
                              

                               ?>
                            </th>
                            <td>
                                <img src="images/<?=$value["id"]?>.jpg" width="10%"> <?=$value["description"]?>
                            </td>
                            <td> <?=$value["prix"]?></td>
                            <td><?=$_SESSION["panier"][$value["id"]]?></td>
                            <td></td>
                            <td><a class="btn btn-danger " href="del.php?id=<?=$value["id"]?>">Suppimer </a></td>
                        </tr>
                        <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>




        </div>

    </div>

</div>


</body>
</html>