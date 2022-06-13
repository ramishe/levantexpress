<?php
$content='';
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();

require './model/ManageProducts.php';
$allproducts= new ManageProducts();
$info_allproducts= $allproducts->getAllProducts();
require './view/allproducts_view.php';
