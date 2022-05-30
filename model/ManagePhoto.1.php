<?php

require_once'Manage.php';
class ManagePhoto extends Manage {
public function getPhotoList($id){
   // require './connection/connection.inc.php';
  // $db=$this->db_connect();
   // $query ="SELECT id,nom,legend FROM Photo WHERE gallery_id='".$id."'";
  //  $result = $db->query($query);
    
  //  return $result;
  return $this->getQuery("SELECT id,nom,legend FROM Photo WHERE gallery_id='".$id."'");

}
public function getPhotoInfos($id) {
    return $this->getQuery("SELECT nom,legend,gallery_id FROM Photo WHERE id='".$id."'");
    
}
}