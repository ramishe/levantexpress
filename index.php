<?php
if(!isset($content)) $content='';
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
    case 'login' :
        require './regisration/login.php';
        break;
    case 'welcome' :
        require './regisration/welcome.php';
        break;
    case 'logout' :
        require './regisration/logout.php';
        break;
    case 'signup' :
        require './regisration/register.php';
        break;
    case 'reset' :
        require './regisration/reset-password.php';
        break;
    case 'registeration_admin' :
        require './ajax/registeration.php';
        break;
        
    default:
        require './controller/home.php';
       
}