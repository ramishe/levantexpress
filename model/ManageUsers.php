<?php

require_once'Manage.php';
class ManageUsers extends Manage {
    
     public function getShippingAddress($id):object{
         $data = [
              'id'=>$id];
         $query = "SELECT shipping_address FROM users WHERE id=:id";
        return $this->getQuery($query, $data) ;
     }
     public function getInfosOfUser($id):object{
         $data = [
              'id'=>$id];
          $query = "SELECT username,first_name,last_name,birth_date,mail,telephone,shipping_address ,home_address,country,city,code_postal FROM users WHERE id=:id";
        return $this->getQuery($query, $data) ;
     }
     
      public function updateInfoDeCompte($id,$first_name,$last_name,$birth_date,$email,$telephone,$shipping_address,$home_address,$country,$city,$code_postal):void {
          $data = [
              'id'=>$id,
              'first_name' =>$first_name,
              'last_name'=>$last_name,
              'birth_date'=>$birth_date,
              'email'=>$email,
              'telephone'=>$telephone,
              'shipping_address'=>$shipping_address,
              'home_address'=>$home_address,
              'country'=>$country,
              'city'=>$city,
              'code_postal'=>$code_postal];
          $query = "UPDATE users SET first_name=:first_name,last_name=:last_name, birth_date=:birth_date, mail=:email, telephone=:telephone, shipping_address=:shipping_address, home_address=:home_address, country=:country, city=:city, code_postal=:code_postal WHERE id=:id";
          
          $this->getQuery($query, $data) ;
    }
     
    public function enregistrerInfosDeLaCommande($user_id,$product_id,$quantity,$amount,$provider,$status):void {
          $data = [
                   'user_id'=> $user_id];
          $query = "INSERT INTO orders SET user_id:=user_id ";
          $this->getQuery($query, $data) ;
          
          $query1 = "SELECT id FROM orders WHERE user_id:=user_id";
          $orde =  $this->getQuery($query1, $data) ;
          $order_id = $orde->fetch();
          var_dump($order_id);
          
          $data2 = ['order_id' => $order_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity];
          $query2 = "INSERT INTO orders_items SET order_id:=order_id,product_id:=product_id,quantity:=quantity";
           $this->getQuery($query2, $data2) ;
           
            $data3 = ['order_id' => $order_id,
                      'amount' => $amount,
                      'provider' => $provider,
                      'status' => $status ];
           $query3 = "INSERT INTO payment_orders SET order_id:=order_id,amount:=amount,provider:=provider,status:=status";
            $data4 = ['order_id' => $order_id];
            $query4 = "SELECT id FROM payment_orders WHERE order_id:=order_id";
            $payment =  $this->getQuery($query4, $data4) ;
            $payment_id = $orde->fetch();
            
            $date5 = ['payment_id' => $payment_id];
            $query5 = "INSERT INTO orders SET payment_id:=payment_id";
            $this->getQuery($date5, $query5) ;
            
    }  
}
/*
public function verifierCompte($username,$psd):object{
    
        return $this->getQuery("SELECT username,psd FROM users WHERE username='".$username."' AND psd='".$psd."'");
     }

     public function createCompte($username,$psd,$first_name,$last_name,$birth_date,$email,$telephone,$shipping_address,$home_address,$country,$city,$code_postal):object {
         return $this->getQuery("INSERT INTO users SET username='$username',psd='$psd',first_name='$first_name',last_name='$last_name',birth_date='$birth_date',mail='$email',telephone='$telephone',shipping_address='$shipping_address',home_address='$home_address',country='$country',city='$city',code_postal='$code_postal'") ;
    }
    public function completeInfoDeCompte($first_name,$last_name,$birth_date,$email,$telephone,$shipping_address,$home_address,$country,$city,$code_postal):void {
         $data = [
              'first_name' =>$first_name,
              'last_name'=>$last_name,
              'birth_date'=>$birth_date,
              'email'=>$email,
              'telephone'=>$telephone,
              'shipping_address'=>$shipping_address,
              'home_address'=>$home_address,
              'country'=>$country,
              'city'=>$city,
              'code_postal'=>$code_postal];
        
          $query = "INSERT INTO users SET first_name=:first_name, last_name=:last_name, birth_date=:birth_date, mail=:email, telephone=:telephone, shipping_address=:shipping_address, home_address=:home_address, country=:country, city=:city, code_postal=:code_postal";
          $this->getQuery($query, $data) ;
    }
        public function crypterPassword($plaintext_password){
         $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
          return $hash;
     }
     public function decrypterPassword($plaintext_password,$hash){
          $verify = password_verify($plaintext_password, $hash);
          if ($verify) {
              return $verify;
          }
          else {
              echo 'Incorrect Password!';
         }
     }
*/