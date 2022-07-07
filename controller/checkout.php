<?php

require './model/ManageRayons.php';
require './model/ManagePanier.php';
require './model/ManageUsers.php';
$ray= new ManageRayons();
$products= new ManagePanier();
$user = new ManageUsers;
$liste_rayon = $ray->getRayonsNav();
if(empty($_SESSION["username"])){
   header("location: index.php?page=login&from=checkout");
   exit;
}

require './view/checkout_view.php';
