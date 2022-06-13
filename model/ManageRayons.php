<?php

require_once'Manage.php';

class ManageRayons extends Manage {
    
    public function getRayonsList():object{
        $data = [];
        $query = "SELECT id,name,photo_section FROM section"; 
        return $this->getQuery($query,$data);
    }
    
    public function getRayonsNav():string {
        $liste = $this->getRayonsList();
        $liste_rayon = '';
        if(isset($liste)) {
            $liste_rayon = '<ul class="sub_menu">';
            while($r = $liste->fetch(PDO::FETCH_ASSOC)) {
                $liste_rayon .= '<li>'.$r['name'].'</li>';
            }
            $liste_rayon .='</ul>';
        }
        return $liste_rayon;
    }
}


