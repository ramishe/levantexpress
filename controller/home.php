<?php 
require 'model/ManageRayons.php';
$rayon = new ManageRayons();
$liste_rayon = $rayon->getRayonsNav();

function countFiles($chemin)
{
    $directory = $chemin;
    $images = glob($directory . "/*.jpg");
    return $images;
}
require './view/home_view.php';