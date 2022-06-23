<?php

$content='';
require './model/ManageRayons.php';
require './model/ManageProducts.php';
require './model/ManageUsers.php';

$ray= new ManageRayons();
$usr= new ManageUsers();
$liste_rayon = $ray->getRayonsNav();
if(isset($_SESSION['id'])) {
	$products_wishlist= $usr->getWishlistOfUser($_SESSION['id']);

}
require './view/wishlist_view.php';
