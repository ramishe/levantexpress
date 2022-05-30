<?php
$content='<div class="container_category">';
while($r=$info_category->fetch(PDO::FETCH_ASSOC)){
       $content.='<div class="category">
                    <div class="photo_category">
                      <a href="index.php?page=products&name='.$r['name'].'&id='.$r['id'].'"><img src="./public/images/categories/'.$r['photo_category'].'.jpg"></a>
                      <a href="index.php?page=products&name='.$r['name'].'&id='.$r['id'].'"> <div class="layer_on_photo"><h3>'.$r['name'].'</h3><p>'.$r['description'].'</p> 
                    </div></a>
                    </div>

                  </div>';
}
$content.='</div>';

require 'template.php';
