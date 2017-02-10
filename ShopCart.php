<?php
require 'config.php';

class ShopCart{

    public $user_id;
    public $product_id;
    public $product_name;
    public $product_price;
    public $buy_at;
    public $quantity;
    public $paied;

    public function __construct($user_id=null,$product_id=null,$product_name=null, $product_price=null,$quantity=null,$buy_at=null,$paied=null){

        $this->user_id=$user_id;
        $this->product_id=$product_id;
        $this->product_name=$product_name;
        $this->product_price=$product_price;
        $this->buy_at=$buy_at;
        $this->quantity=$quantity;
        $this->paied=$paied;
    }

    public function __clone(){
        $this->user_id=$user_id;
        $this->product_id=$product_id;
        $this->product_name=$product_name;
        $this->product_price=$product_price;
        $this->buy_at=$buy_at;
        $this->quantity=$quantity;
        $this->paied=$paied;
    }
    public function SelectShopCartByUserId($email)
    {
        global $db;
        $query = "select user_id,product_id, product.product_name,product.price,quantity,buy_at,paied from shop_cart inner join product on product.product_id=shop_cart.product_id  where user_id=?";
        $stmt = $db->prepare($query);
        if(!$stmt){
          echo "<br>".$db->error."<br>";
          exit;
        }
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($uUserId,$pProdId,$pName,$pPrice,$pQuantity,$pBuyAt ,$pPaied);
        $stmt->fetch();
        $shop_cart=new ShopCart($uUserId,$pProdId,$pName,$pPrice,$pQuantity,$pBuyAt ,$pPaied);
        return $shop_cart;
    }
    public function ShopCartInsert($user_id=null, $product_id=null,$quantity=null,$buy_at=null,$paied=null)
    {
        global $db;
        $query = "insert into shop_cart values(?,?,?,?,?)";
        //echo "<br><pre>".var_dump($query). "</pre>";
        $stmt = $db->prepare($query);
        if(!$stmt){
          echo "<br>".$db->error."<br>";
          exit;
        }
        //echo "<br><pre>".var_dump($stmt). "</pre>";
        $stmt->bind_param('iiidb',$user_id, $product_id,$quantity,$buy_at,$paied);
        //echo "<br><pre>".var_dump($stmt). "</pre>";
        $stmt->execute();
        //echo "<br><pre>".var_dump($stmt). "</pre>";
        if($stmt->affected_rows>0){
      	echo "shop_cart inserted successfully";
      	}else{
      		echo "shop_cart not inserted";
      	}
    }
    public function UpdateShopCart($user_id, $product_id,$quantity,$buy_at,$paied)
    {
        global $db;
        $query = "update shop_cart set quantity=?,buy_at=?,paied=? where user_id=? and product=? and paied=0";
        $stmt = $db->prepare($query);
        if(!$stmt){
          echo "<br>".$db->error."<br>";
          exit;
        }
        $stmt->bind_param('idbii',$quantity,$buy_at,$paied,$user_id,$product_id);
        $stmt->execute();
        if($stmt->affected_rows>0){
      	echo "shop_cart updated successfully";
      	}else{
      		echo "shop_cart not updated";
      	}
    }
    public function deleteShopCart($user_id,$product_id)
    {
        global $db;
        $query = "delete from shop_cart where user_id=? and product_id=? and paied=0";
        $stmt = $db->prepare($query);
        if(!$stmt){
          echo "<br>".$db->error."<br>";
          exit;
        }
        $stmt->bind_param('ii',$user_id,$product_id);
        $stmt->execute();
        if($stmt->affected_rows>0){
        echo "shop_cart Delete successfully";
        }else{
          echo "shop_cart Delete Not Success!";
        }
    }

}

 ?>
