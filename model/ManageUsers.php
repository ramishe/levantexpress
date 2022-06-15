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
              'id'=>intval($id),
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
    public function enregisterOrder($id){
        $data = ['user_id'=> intval($id)];
          $query = "INSERT INTO orders SET user_id=:user_id ";
         return $this->setQuery($query, $data) ;
    } 
    public function enregisterItemsDeUnOrder($id_order,$product_id,$quantity){
        $data2 = ['order_id' => intval($id_order),
                    'product_id' => intval($product_id),
                    'quantity' => $quantity];
        $query2 = "INSERT INTO orders_items SET order_id = :order_id, product_id = :product_id, quantity = :quantity";
           $this->getQuery($query2, $data2) ;
    } 
    
    public function enregisterPaymentDeUnOrder($id_order,$amount,$provider){
        $data3 = ['order_id' => $id_order,
                      'amount' => $amount,
                      'provider' => $provider];
                      
        $query3 = "INSERT INTO payment_orders SET order_id=:order_id, amount=:amount, provider=:provider";
          return $this->setQuery($query3,$data3) ;
    }
    
    public function metrreIdPaymentDansOrder($id_payment,$id_order){
         $date5 = ['payment_id' => $id_payment,
                   'id_order' => $id_order];
            $query5 = "UPDATE orders SET payment_id=:payment_id WHERE id=:id_order";
            $this->getQuery($query5,$date5) ;
    }
   
}
