<?php


require './model/ManageAdmin.php';
require './model/ManageRayons.php';
require './model/ManageCategory.php';


$admin= new ManageAdmin();
$ray= new ManageRayons();
$cat= new ManageCategories();

// Gestion des submit
var_dump($_POST);
if(isset($_POST['submit'])) {
    
    switch($_POST['submit']) {
        case 'Ajouter le produit' :
            $admin->addNewProduct($_POST, $_FILES);
            break;
        
        
        
        
    }
    
}

$info_Rayon= $ray->getRayonsList();


require'./view/admin/welcome_view.php';