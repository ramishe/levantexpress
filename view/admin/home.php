<?php
 $content='';
   
    
//require './view/template.php';
ob_start();
?>
<ul>
    <li><a href="index.php?page=admin&action=rayons">Gerer les rayons</a></li>
    <li><a href="index.php?page=admin&action=categories">Gerer les categories</a></li>
    <li><a href="index.php?page=admin&action=produncts">Gerer les produits</a></li>
     <a href="index.php?page=admin&dec">Deconnexion</a>
</ul>
<?php
$content=ob_get_clean();
