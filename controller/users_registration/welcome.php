<?php
require 'model/ManageRayons.php';
$rayon = new ManageRayons();
$liste_rayon = $rayon->getRayonsNav();

require './model/ManageUsers.php';
$user = new ManageUsers;

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?page=login");
    exit;
}

$message_alert='';


if(isset($_POST['submit']) && $_POST['submit'] = 'submit'){
    if($_POST['first_name'] != '' && $_POST['last_name'] !='' && $_POST['mail'] != '' && $_POST['telephone'] != ''&& $_POST['shipping_address'] != ''&& $_POST['city'] != ''&& $_POST['country'] != ''&& $_POST['code_postal'] != ''&& $_POST['home_address'] != ''){
        $user->updateInfoDeCompte($_SESSION["id"],$_POST['first_name'],$_POST['last_name'],$_POST['birth_date'],$_POST['mail'],intval($_POST['telephone']),$_POST['shipping_address'],$_POST['home_address'],$_POST['country'],$_POST['city'],$_POST['code_postal']);  
    } else $message_alert='<p class="rouge">Veuillez remplir toutes les champs</p>';
}


if(isset($_GET['action'])) {
    switch($_GET['action']){
        case'mescommandes':
          $orders_user = $user->getNumeroDeOrder($_SESSION["id"]);
          $ord = $orders_user->fetchAll(PDO::FETCH_ASSOC);
          break;
          
        case'mescommandes_view':
          $order = $_GET['order']??null;
          if(isset($order)) {
              $orders_detail = $user->getOrderDetail($order);
          } else {
             $_GET['action'] = 'mescommandes';
          }
          break;
          
          
        case'mesinfos':
             $user_infos = $user->getInfosOfUser($_SESSION["id"]);
             $u = $user_infos->fetch(PDO::FETCH_ASSOC);
             break;
             
        case'mesaddresses':


             break;
             
        case'messouhaits':
             
             break;
        
        default:
    }
  
}
        
require'./view/user_view.php';
