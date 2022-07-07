<?php
$content='';
require './model/ManageRayons.php';
require './model/ManagePanier.php';
$ray= new ManageRayons();
$allproducts= new ManagePanier();
$liste_rayon = $ray->getRayonsNav();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart"])) {
				foreach($_SESSION["cart"] as $k => $v) {
					if($_GET["code"] == $k) {
						$_SESSION['number_articles']-=1;
						unset($_SESSION["cart"][$k]);	
					}
					if(empty($_SESSION["cart"])) unset($_SESSION["cart"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart"]);
			$_SESSION['number_articles']=0;
			unset($_SESSION['noms_produits']);
			break;	
	}
}
require './view/panier_view.php';

