<?php

require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
if(empty($_SESSION["username"])){
   header("location: index.php?page=login&from=checkout");
   exit;
}
require './model/ManagePanier.php';
$products= new ManagePanier();
require './model/ManageUsers.php';
$user = new ManageUsers;


require './view/checkout_view.php';
