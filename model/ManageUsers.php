<?php
require_once'Manage.php';
class ManageUsers extends Manage {

    public function getShippingAddress($id):object {
        $data = [
        'id'=>$id];
        $query = "SELECT shipping_address FROM users WHERE id=:id";
        return $this->getQuery($query, $data) ;
    }
    public function getInfosOfUser($id):object {
        $data = [
        'id'=>$id];
        $query = "SELECT username,first_name,last_name,birth_date,mail,telephone,shipping_address ,home_address,country,city,code_postal FROM users WHERE id=:id";
        return $this->getQuery($query, $data) ;
    }

    public function getWishlist(int $user_id):array {
        $data = [ 'user_id' => $user_id ];
        $query = "SELECT product_id FROM wishlist WHERE user_id=:user_id GROUP BY product_id";
        
        $result = $this->getQuery($query, $data);
        $wl[] = null;
        while($r = $result->fetch(PDO::FETCH_ASSOC)) {
            $wl[] = $r['product_id'];
        }
        return $wl;
    }
    
    public function addWishlist(int $prod_id, int $user_id):void {
        $data = [ 'user_id' => $user_id, 'prod_id' => $prod_id ];
        $query = "INSERT INTO wishlist SET user_id=:user_id, product_id=:prod_id";
        $this->getQuery($query, $data);
    }
    
    public function removeWishlist(int $prod_id, int $user_id):void {
        $data = [ 'user_id' => $user_id, 'prod_id' => $prod_id ];
        $query = "DELETE FROM wishlist WHERE user_id=:user_id AND product_id=:prod_id";
        $this->getQuery($query, $data);
        foreach($_SESSION['wishlist'] as $k) {
            if($k==$prod_id){
                unset($_SESSION['wishlist'][$k]);
            }
        }
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
    
    public function enregisterPaymentDeUnOrder(int $id_order,$amount,string $provider) {
        $data3 = ['order_id' => $id_order,
                  'amount' => $amount,
                  'provider' => $provider];
        $query3 = "INSERT INTO payment_orders SET order_id=:order_id, amount=:amount, provider=:provider";
        return $this->setQuery($query3,$data3) ;
    }
    
    public function metrreIdPaymentDansOrder(int $id_payment,int $id_order) :void{
        $date5 = ['payment_id' => $id_payment,
                  'id_order' => $id_order];
        $query5 = "UPDATE orders SET payment_id=:payment_id WHERE id=:id_order";
        $this->getQuery($query5,$date5) ;
    }
    
    public function getNumeroDeOrder(int $id){
        $data = ['number_user' => $id];
        $query = "SELECT orders.id, orders.payment_id, orders.created_at, payment_orders.amount FROM orders JOIN payment_orders ON orders.payment_id = payment_orders.id WHERE user_id=:number_user ORDER BY orders.id DESC ";
        return $this->getQuery($query,$data);
    }
    
    public function getProductsDeOrders(int $id) {
        $data = ['number_order' => $id];
        $query = "SELECT orders_items.quantity,product.* FROM orders_items JOIN product ON orders_items.product_id = product.id WHERE order_id=:number_order";
        return $this->getQuery($query,$data);
    }
    
    public function getOrderDetail(int $id):array { 
        $data = ['order_id' => $id];
        $query = "SELECT orders.id, orders.payment_id, orders.created_at, payment_orders.amount FROM orders JOIN payment_orders ON orders.payment_id = payment_orders.id WHERE orders.id=:order_id ";
        $order = $this->getQuery($query,$data)->fetch(PDO::FETCH_ASSOC);
        $order['productlist'] = $this->getProductsDeOrders($id)->fetchAll(PDO::FETCH_ASSOC);
        return $order;
    }
    
    public function getWishlistOfUser(int $user_id){
        $data = [ 'user_id' => $user_id ];
        $query = "SELECT product.* FROM product JOIN wishlist on wishlist.product_id = product.id WHERE wishlist.user_id=:user_id";
        return $this->getQuery($query,$data);
    }


}
