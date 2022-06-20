<?php


require './model/ManageAdmin.php';
require './model/ManageRayons.php';
require './model/ManageCategory.php';
require './model/ManageProducts.php';


$admin= new ManageAdmin();
$ray= new ManageRayons();
$cat= new ManageCategories();
$prod = new ManageProducts();

// Gestion des submit
var_dump($_GET);
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'newproduit' :
           
            $form_infos='';
            break;
        case 'ajouterphotosproduit' :
              //$form_infos='';
            break;
            
            
    }       
}

if(isset($_POST['submit'])) {
    
    switch($_POST['submit']) {
        case 'Ajouter le produit' :
            $admin->addNewProduct($_POST, $_FILES);
            break;
        case 'Ajoutez les photos' :
            var_dump($_POST);
            $id = intval($_POST['product_id']);
            
            $category_id = intval($_POST['category_id']);
            $admin->addNewPhotos($id,$category_id,$_FILES);
            break;
        
    }
    
}

$info_Rayon= $ray->getRayonsList();


require'./view/admin/welcome_view.php';