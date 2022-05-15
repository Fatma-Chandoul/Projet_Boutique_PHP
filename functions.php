<?php
function getConnexion(){
return mysqli_connect("localhost","root","","boutique707");
}
function getAllProduits(){
    $cnx=getConnexion();
    $req=mysqli_query($cnx,"select * from produit");
    $tab=[];
    while($rst=mysqli_fetch_array($req)){
        $tab[]=$rst;
    }
    return $tab;
}

function getAllCategorie(){
    $cnx=getConnexion();
    $req=mysqli_query($cnx,"select * from categorie");
    $tab=[];
    while($rst=mysqli_fetch_array($req)){
        $tab[]=$rst;
    }
    return $tab;
}

function getAllProduitsByCatId($id){
    $cnx=getConnexion();
    $req=mysqli_query($cnx,"select * from produit where cat_id={$id}");
    $tab=[];
    while($rst=mysqli_fetch_array($req)){
        $tab[]=$rst;
    }
    return $tab;
}

function getSession(){
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION["panier"])){
        $_SESSION["panier"]=array();
    }
}

function addProdToPanier($id){
getSession();
if(isset($_SESSION["panier"][$id])){
    $_SESSION["panier"][$id]++;
}else{
    $_SESSION["panier"][$id]=1;

}
}

function deleteFromPanier($id){
    getSession();
    unset($_SESSION["panier"][$id]);
}
function getPanier(){
    return $_SESSION["panier"];
}

function getDetailPanier(){
    getSession();
    $pan=getPanier();
    $keys=array_keys(($pan));
    if(empty($keys)){
        return array();
    }else{
        $ch=implode(",",$keys);
        $cnx=getConnexion();
        $req=mysqli_query($cnx,"select * from produit where id in ({$ch})");
        $tab=[]
     ;
     while($rst=mysqli_fetch_array($req))   {
         $tab[]=$rst;
     }
     return $tab;
    }
}
function getSizeOfPanier(){
    getSession();
    return sizeof(getPanier());
}