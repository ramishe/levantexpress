<?php 
class Manage{
    protected function db_connect(){
      $base='ramisheikhelsouk_levantexpress';
      $pwd='91bcb42e879e6e380c0920d0fdaac8b2';
      $login='ramisheikhelsouk';
      $sever='db.3wa.io';
    try {
    $db = new PDO('mysql:host='.$sever.';port=3306;dbname='.$base.';charset=utf8', $login, $pwd);    
    }
    catch (PDOException $e) {
    echo '<h3>Site en maintenance...</h3>';
    echo $e->getMessage();
    exit;
    }
return $db;


}

    protected function getQuery($query,$data=[]){
        $db= $this->db_connect();
        $stmt = $db->prepare($query);
        $stmt->execute($data);
        return $stmt;
    }
     protected function crypterPassword($plaintext_password){
         $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
          return $hash;
     }
     protected function decrypterPassword($plaintext_password,$hash){
          $verify = password_verify($plaintext_password, $hash);
          if ($verify) {
              return $verify;
          }
          else {
              echo 'Incorrect Password!';
         }
          
     }
     
    
}