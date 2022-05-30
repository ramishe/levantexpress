<?php
//je recupere ma class parent
//je crée ma nouvelle class 
//je cree une method pour recupere la liste de comentaires

require_once'Manage.php';
class ManageComment extends Manage {
public function getCommentList($id){
    $data=['id'=>intval($id)];
   $query=("SELECT mail,author,comment,photo_id FROM Comment WHERE photo_id=:id");
   return $this->getQuery($query,$data);
}
public function setComment(int $id,string $nom,string $email,string $message):void{
        
        $data=[
            'comment'=>$message,
            'author'=>$nom,
            'mail'=>$email,
            'photo_id'=>$id
        ];
        $query="INSERT INTO Comment (comment,author,mail,valid,photo_id) VALUES ( :comment, :author, :mail,0,:photo_id)";
   
    
    $this->getQuery($query,$data);
    
    
}
}