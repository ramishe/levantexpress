<?php
function countFiles($chemin)
{
   $directory = $chemin;
$images = glob($directory . "/*.jpg");
return $images;
}
$fichiers=countFiles('public/images/slideshow');
$content='<div class="diaporama">';
foreach($fichiers as $fichier){
    $content.='<div class="item"><img src='.$fichier.' alt=""></div>';
}
$content.= '</div>
            <div class="container_general_info">
                      <div class="general_info1">
                              <div class="icon_general_info1">
                                <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
                              </div>  
                              <div class="title_text_general_info1">
                                 <h4 class="porto-sicon-title">ASSISTANCE EN LIGNE 24/7</h4>
                                 <p> Nhésitez pas à nous contacter à tout mome.</p>
                              </div> 
                      </div>
                      <div class="general_info1">
                              <div class="icon_general_info1">
                                <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
                              </div>  
                              <div class="title_text_general_info1">
                                 <h4 class="porto-sicon-title">ASSISTANCE EN LIGNE 24/7</h4>
                                 <p> Nhésitez pas à nous contacter à tout mome.</p>
                              </div> 
                      </div>
                      <div class="general_info1">
                              <div class="icon_general_info1">
                                <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
                              </div>  
                              <div class="title_text_general_info1">
                                 <h4 class="porto-sicon-title">ASSISTANCE EN LIGNE 24/7</h4>
                                 <p> Nhésitez pas à nous contacter à tout mome.</p>
                              </div> 
                      </div>
            </div>';
       
require 'template.php';
?>
