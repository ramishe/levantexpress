<?php

session_start();
require_once'../model/ManagePanier.php';
$req=new ManagePanier();
if(!isset($_SESSION['number_articles'])) $_SESSION['number_articles'] =0;
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
$content_cart = '';
if(isset($_POST['prod_id'])){
    if(!isset($_SESSION['cart'][intval($_POST['prod_id'])])) $_SESSION['cart'][intval($_POST['prod_id'])] =0 ;
     $_SESSION['cart'][intval($_POST['prod_id'])] +=1;
     $_SESSION['number_articles']=count($_SESSION['cart']);
     if(isset($_SESSION['cart'])) {
       foreach($_SESSION['cart'] as $prod_id => $quantity) {
       // $_SESSION['quntity']+=$quantity;
        $info_product = $req->addProductToPanier($prod_id);
        $r = $info_product->fetch(PDO::FETCH_ASSOC);
        $content_cart .= '<div class="cart_item">
                           <div class="items_info">
                             <div class="image_panier">
                               <img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'.png">
                             </div>
                             <div class="info_panier">'.$r['name'].'<br>prix:'.$r['price'].'€ <br>promotion:'.$r['discount'].'<br>quantité:'.$quantity.'
                             </div>
                          </div>
                        </div>
                  ';
    }
    $content_cart .='<a href="index.php?page=panier" class="normal_btn">Valider mes achats</a>';
   echo $content_cart; 
   }
}
/* for($i =1; $i <= count($_SESSION['cart']); ++$i){
       $_SESSION['a']=intval($_SESSION['cart'][$i]);
       $_SESSION['number']+=$_SESSION['a'];
      }
      if($_SESSION['number']==0){
          $_SESSION['number_articles_in_basket']='';
      } else  $_SESSION['number_articles_in_basket']=$_SESSION['number'];   
    
      if($_SESSION['cart'][$r['id']]==$r['id']) {
            $_SESSION['number_articles']+=$_POST['number_articles'];
           
        } 
        */
      
      
      