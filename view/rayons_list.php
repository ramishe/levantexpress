<?php

$content='<div class="container_rayons">';
while($r=$info_Rayon->fetch(PDO::FETCH_ASSOC)){
       $content.='<div class="rayon">
                    
                    <div class="photo_rayon">
                      <a href="index.php?page=categories&name='.$r['name'].'&id='.$r['id'].'"><img src="./public/images/rayons/'.$r['photo_section'].'.jpg"></a>
                      <a href="index.php?page=categories&name='.$r['name'].'&id='.$r['id'].'"> <div class="layer_on_photo"><h3>'.$r['name'].'</h3>
                    </div></a>
                    </div>

                  </div>';
}
$content.='</div>';
require 'template.php';
