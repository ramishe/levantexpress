<?php
if(!isset($content)) $content='';
session_start();
$page='';
$page=isset($_GET['page'])?$_GET['page']:'';

switch($page){
    case'about': 
         require './controller/about.php';
        break;
        
    case'panier': 
         require './controller/panier.php';
        break;
        
    case'checkout': 
         require './controller/checkout.php';
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
         
    case'product':
          require './controller/product.php';
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
        require './controller/admin/login.php';
        break;
    case 'welcome_admin' :
        require './controller/admin/welcome.php';
        break;
    case 'logout_admin' :
        require './controller/admin/logout.php';
        break;
        
    case 'wishlist' :
        require './ajax/ajax_wish_list.php';
        break;
        
    case 'users' :
        require './controller/users.php';
        break;
        
    case 'login' :
        require './controller/users_registration/login.php';
        break;
        
    case 'welcome' :
        require './controller/users_registration/welcome.php';
        break;
        
    case 'logout' :
        require './controller/users_registration/logout.php';
        break;
        
    case 'signup' :
        require './controller/users_registration/register.php';
        break;
        
    case 'reset' :
        require './controller/users_registration/reset-password.php';
        break;
        
    case 'registeration_admin' :
        require './ajax/registeration.php';
        break;
        
    default:
        require './controller/home.php';
       
}