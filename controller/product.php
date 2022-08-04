<?php
$content='';
require './model/ManageRayons.php';
require './model/ManageProducts.php';

$ray= new ManageRayons();
$products= new ManageProducts();

$id=$_GET['id'];

$liste_rayon = $ray->getRayonsNav();
$info_product= $products->getOneProduct($id);
$photos_product=$products->getPhotosOfProduct($id);

require './view/product_view.php';
