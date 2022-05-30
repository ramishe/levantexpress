<?php

$content='';
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();

require './model/ManageProducts.php';
$products= new ManageProducts();
$id=$_GET['id'];
$info_products= $products->getProduitsDeCategory($id);
require './view/products_view.php';
