<?php
require_once './DBClasses/autoload.php';

if(isset($_POST))
{
    switch ($_POST['action'])
    {
      case 'select':
          $myvar= new ShopCart();
          $myvar->SelectShopCartByUserId($_POST['user_id']);
        break;
      case 'insert':
          $ss= new ShopCart();
          $ss->ShopCartInsert($_POST['user_id'],$_POST['product_id'],$_POST['quantity']);
          break;
      case 'update':
          $ss= new ShopCart();
          $ss->UpdateShopCart($_POST['user_id'],$_POST['product_id']);
            break;
      case 'delete':
          $ss= new ShopCart();
          $ss->deleteShopCart($_POST['user_id'],$_POST['product_id']);
            break;
      default:
        # code...
        break;
    }
}

           ?>
