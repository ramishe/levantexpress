<?php

session_start();
$page='';
$page=isset($_GET['page'])?$_GET['page']:'';
/*if(isset($_GET['page'])){
$page=$_GET['page']; 
}*/
switch($page){
    case'about': 
         require './controller/about.php';
        break;
        case'panier': 
         require './controller/panier.php';
        break;
    case'contact':
        
        require './controller/contact.php';
        break;
        case'rayons':
         
          require './controller/rayons.php';
         break;
         case'categories':
         
          require './controller/categories.php';
         break;
    case'products':
         
          require './controller/products.php';
         break;
    case'allproducts':
         
          require './controller/allproducts.php';
         break;     
    case'product_view':
         
        require './controller/product_view.php';
        break;
        
    case 'promotion' :
        require './controller/promotion.php';
        break;
    
    case 'admin' :
        require './controller/admin.php';
        break;
    case 'users' :
        require './controller/users.php';
        break;
        
    default:
        require './controller/home.php';
       
}