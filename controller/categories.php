<?php 
$content='';
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
require './model/ManageCategory.php';
$cat= new ManageCategories();
$id=$_GET['id'];
$info_category= $cat->getCategory($id);
require './view/category_view.php';
