<?php

$content='';
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();

require './model/ManageProducts.php';
$products= new ManageProducts();
$info_products= $products->getAllProductsEnPromotion();
require './view/promotion_view.php';
