<?php 
require 'model/ManageRayons.php';
$rayon = new ManageRayons();
$liste_rayon = $rayon->getRayonsNav();
require './view/home_view.php';