<?php 
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
$info_Rayon= $ray->getRayonsList();
require './view/rayons_list.php';
