<?php
$content='';
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();

require './model/ManageProducts.php';
$products= new ManageProducts();
$id=$_GET['id'];
$info_product= $products->getOneProduct($id);
$photos_product=$products->getPhotosOfProduct($id);
require './view/product_view.php';
