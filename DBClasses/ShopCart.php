<?php
require_once 'autoload.php';

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

    public function SelectShopCartByUserId($user_id,$paied)
    {
        $conn=connection::conn();
        $query = "select shop_cart.user_id,shop_cart.product_id, product.product_name,product.price, shop_cart.quantity,buy_at,paied from shop_cart INNER JOIN product on product.product_id=shop_cart.product_id where shop_cart.user_id=? and shop_cart.paied=?";
        $stmt = $conn->prepare($query);
        if(!$stmt){
          echo "<br>".$conn->error."<br>";
          exit;
        }
        $stmt->bind_param('ii',$user_id,$paied);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($uUserId,$pProdId,$pName,$pPrice,$pQuantity,$pBuyAt ,$pPaied);
        $arr[]=null;
        $i=0;
        while ($stmt->fetch()) {
          $arr[$i]=new ShopCart($uUserId,$pProdId,$pName,$pPrice,$pQuantity,$pBuyAt ,$pPaied);
          $i++;
        }
        $stmt->close();
        $conn->close();
        return $arr;
    }
    public function ShopCartInsert($user_id=null, $product_id=null,$quantity=null)
    {
        $conn=connection::conn();
        $query = "call shop_cart_insert(?,?,?)";
        $stmt = $conn->prepare($query);
        if(!$stmt){
          echo "<br>".$conn->error."<br>";
          exit;
        }
        $stmt->bind_param('iii',$user_id, $product_id,$quantity);
        $stmt->execute();
        if($stmt->affected_rows>0){
      	echo "shop_cart inserted successfully";
      	}else{
      		echo "shop_cart not inserted";
      	}
        $stmt->close();
        $conn->close();
    }
    public function UpdateShopCart($user_id, $product_id)
    {
        $conn=connection::conn();
        $query = "update shop_cart set buy_at=CURRENT_DATE,paied=1 where user_id=? and product_id=? and paied=0";
        $stmt = $conn->prepare($query);
        if(!$stmt){
          echo "<br>".$conn->error."<br>";
          exit;
        }
        $stmt->bind_param('ii',$user_id,$product_id);
        $stmt->execute();
        if($stmt->affected_rows>0){
      	echo "shop_cart updated successfully";
      	}else{
      		echo "shop_cart not updated";
      	}
        $stmt->close();
        $conn->close();
    }
    public function deleteShopCart($user_id,$product_id)
    {
        $conn=connection::conn();
        $query = "delete from shop_cart where user_id=? and product_id=? and paied=0";
        $stmt = $conn->prepare($query);
        if(!$stmt){
          echo "<br>".$conn->error."<br>";
          exit;
        }
        $stmt->bind_param('ii',$user_id,$product_id);
        $stmt->execute();
        if($stmt->affected_rows>0){
        echo "shop_cart Delete successfully";
        }else{
          echo "shop_cart Delete Not Success!";
        }
        $stmt->close();
        $conn->close();
    }

}

 ?>
